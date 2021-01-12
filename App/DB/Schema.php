<?php


namespace App\DB;


use App\Factories\FileFactory;
use Helpers\FileWorker;
use Helpers\QueryCreator;

class Schema
{
    private \PDO $connection;
    private FileWorker $fileWorker;
    private QueryCreator $creator;

    private string $dumpDir;

    public function __construct(QueryCreator $creator)
    {
        $this->creator = $creator;
        $this->creator->setDumpPath(dirname(__DIR__,2).'/Database/dump/');
        $this->connection = Connection::get();
        $this->fileWorker = FileFactory::getWorker();
    }

    public function up() : void
    {
        $createQueries = $this->creator->formCreateTableQueries();

        foreach ($createQueries as $v){
           $statement = $this->connection->query($v);
           $statement->execute();
        }

        $this->addCouple();
    }

    public function down() : void
    {
        $this->connection->query('drop table `products`')->execute();
        $this->connection->query('drop table `blog`')->execute();
    }

    public function fill() : void
    {
      $insertData = $this->creator->formInsertData();

      foreach ($insertData as $datum){
          $statement = $this->connection->prepare($datum['query']);
          foreach ($datum['data'] as $row) {
              $statement->execute(array_values($row));
          }
      }
    }

    public function setReady() : void
    {
        $this->up();
        $this->fill();
    }

    public function setDumpDir(string $dumpDir) : void
    {
        $this->dumpDir = $dumpDir;
    }

    public function getDumpDir() : string
    {
        return $this->dumpDir;
    }

    private function addCouple() : void
    {
        $this->connection->query('alter table `blog` add primary key(href)')->execute();
        $this->connection->query('alter table `products` add unique href_un (href)')->execute();
        $this->connection->query('alter table `products` add foreign key (name) references blog(product) on delete cascade ');
    }


}