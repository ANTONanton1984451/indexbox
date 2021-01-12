<?php

namespace Helpers;

use App\Factories\FileFactory;

class QueryCreator
{
    private string $dumpPath;

    private const NAME = '@tableName@';
    private const STRUCTURE = '@structure@';
    private const VALUES = '@values@';

    private const CREATE_TABLE = 'create table `'.self::NAME.'` ('.self::STRUCTURE.')';
    private const INSERT_VALUES = 'insert into `'.self::NAME.'` ( '.self::STRUCTURE.' ) values( '.self::VALUES.')';


    private FileWorker $fileWorker;


    public function __construct()
    {
        $this->fileWorker = FileFactory::getWorker();
    }

    /**
     * @return array
     */
    public function formCreateTableQueries() : array
    {
        $tableQueries = [];
        $tableNames = $this->getTableNames();

        foreach ($tableNames as $tableName){
            $tableStructure = $this->getTableStructure($tableName);
            $queryString = str_replace(self::NAME,$tableName,self::CREATE_TABLE);
            $queryString = str_replace(self::STRUCTURE,$tableStructure,$queryString);
            $tableQueries[] = $queryString;
        }
        return $tableQueries;
    }

    /**
     * @return array
     */
    public function formInsertData() : array
    {
        $tableNames = $this->getTableNames();
        $insertQueries = [];

        for ($i=0;$i < count($tableNames); $i++){
            $insertQuery = self::INSERT_VALUES;
            $dump = $this->getDumpContent($tableNames[$i]);

            $insertQuery = str_replace(self::NAME,$tableNames[$i],$insertQuery);

            $valuesPlaceholders = str_repeat('?,',count($dump['columns']));
            $valuesPlaceholders = substr($valuesPlaceholders,0,strlen($valuesPlaceholders)-1);
            $insertQuery = str_replace(self::VALUES,$valuesPlaceholders,$insertQuery);

            $structure = implode(',',array_keys($dump['columns']));
            $insertQuery = str_replace(self::STRUCTURE,$structure,$insertQuery);

            $insertQueries[$i]['query'] = $insertQuery;
            $insertQueries[$i]['data'] = $dump['data'];
        }

        return $insertQueries;
    }

    public function setDumpPath(string $path)
    {
        $this->dumpPath = $path;
    }

    private function getDumpContent(string $tableName):array
    {
        return $this->fileWorker->getFileContent($this->dumpPath.$tableName.'.json');
    }

    private function getTableNames() : array
    {
        $tableNames = [];

        $fileNames = $this->fileWorker->getFileObserve($this->dumpPath);

        for ($i = 2; $i < count($fileNames); $i++) {
            $tableNames[] = str_replace('.json', '', $fileNames[$i]);
        }
        return $tableNames;
    }

    private function getTableStructure(string $tableName) : string
    {
        $dumpContent = $this->getDumpContent($tableName);
        $structure = '';
        foreach ($dumpContent['columns'] as $column => $character){
            $structure.= '`'.$column.'` '.$character.',';
        }
        $structure = substr($structure,0,strlen($structure)-1);
        return  $structure;
    }

}