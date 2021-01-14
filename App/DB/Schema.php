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
            $this->connection->query($v);
        }

        $this->addIndexes();
        $this->addCouple();
    }

    public function down() : void
    {
        $this->connection->query('drop table `blog`');
        $this->connection->query('drop table `products`');

    }

    public function fill() : void
    {
      $insertData = $this->creator->formInsertData();

      $insertData = array_reverse($insertData);
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
        $this->connection->query('alter table `blog` add primary key(href)');
        $this->connection->query('alter table `blog` add foreign key (product) references products(name) on delete cascade ');
    }

    private function addIndexes() : void
    {
        $this->connection->query('create index name on products(name)');
        $this->connection->query('create index views on blog(views) ');
        $this->connection->query('create index time_create on blog(time_create) ');
        $this->connection->query('create index product on blog(product) ');
    }


}