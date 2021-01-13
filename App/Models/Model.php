<?php


namespace App\Models;


use App\DB\Connection;

abstract class Model
{
    protected array $columns;
    protected string $tableName = '';

    protected string $primaryKey = 'id';

    protected \PDO $connection;

    protected const NAME = '@tableName@';
    protected const STRUCTURE = '@structure@';
    protected const VALUES = '@values@';

    protected const INSERT_QUERY = 'insert into `'.self::NAME.'` ( '.self::STRUCTURE.' ) values( '.self::VALUES.')';
    protected const SELECT_QUERY = 'select '.self::VALUES.' from '. self::NAME;


    public function __construct()
    {
        if($this->tableName === ''){
            $this->setTableName();
        }
        $this->connection = Connection::get();
    }

    public function __set($name,$value)
    {
        if (is_scalar($value) || $value === null){
            $this->columns[$name] = $value;
        }
    }
    public function __get($name)
    {
        if(isset($this->columns[$name])){
            return $this->columns[$name];
        }else{
            return null;
        }
    }

    public function find(string $value)
    {
        $query = str_replace(static::NAME,$this->tableName,static::SELECT_QUERY);
        $query = str_replace(static::VALUES,'*',$query);
        $query .= " where $this->primaryKey = ?";
        $statement = $this->connection->prepare($query);
        $statement->execute([$value]);
        $this->columns = $statement->fetchAll(\PDO::FETCH_ASSOC)[0];
    }

    public function toArray() : array
    {
        return $this->columns;
    }

    /**
     * @param string $value
     * @return static
     */
    public static function findByKey(string $value) : Model
    {
        $model = new static();
        $model->find($value);
        return $model;
    }

    /**
     * @return static
     */
    public static function getInstance()
    {
        return new static();
    }

    protected function setTableName() : void
    {
        $lastSlashPos = strrpos(static::class,'\\');
        $this->tableName = substr(strtolower(static::class),$lastSlashPos+1,strlen(static::class));
    }

    public function save()
    {
        $query = str_replace(static::NAME,$this->tableName,static::INSERT_QUERY);

        $placeHolders = str_repeat('?,',count($this->columns));

        $query = str_replace(static::VALUES,$placeHolders,$query);

        $structure = implode(',',array_keys($this->columns));
        $structure = substr($structure,0,strlen($structure)-1);
        $query = str_replace(static::STRUCTURE,$structure,$query);

        $this->connection->prepare($query)->execute(array_values($this->columns));
    }

    private function getRows(array $columns,?array $where = null,?string $orderBy = null,?int $limit = null,?int $offset = null) : array
    {
        $columns = implode(',',$columns);

        $query = str_replace(static::NAME,$this->tableName,static::SELECT_QUERY);
        $query = str_replace(static::VALUES,$columns,$query);

        if($where !== null){
            foreach ($where as $column => $value)
            $query .= ' where '.$column .' = '. $value;
        }
        if ($orderBy !== null){
            $query .= ' order by '. $orderBy;
        }
        if ($limit !== null){
            $query .= ' limit '. "$limit";
        }
        if ($offset !== null){
            $query .= ' offset '."`$offset`";
        }

       $queryResult = $this->connection->query($query);
       $queryResult->execute();
       return $queryResult->fetchAll(\PDO::FETCH_ASSOC);
    }
}