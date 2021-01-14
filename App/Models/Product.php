<?php


namespace App\Models;


class Product extends Model
{
    protected string $tableName = 'products';

    protected string $primaryKey = 'href';

    public static function hasOneBlog(string $name)
    {
           return (new static())->hasBlog($name);
    }

    private function hasBlog(string $name)
    {
        $query = "select *  from `blog` inner join $this->tableName on blog.product = $this->tableName.name where $this->tableName.name = ?";
        $statement = $this->connection->prepare($query);
        $statement->execute([$name]);
        $columns = $statement->fetchAll(\PDO::FETCH_ASSOC)[0];

        $blog = new Blog();
        foreach (array_keys($columns) as $columnName){
            $blog->$columnName = $columns[$columnName];
        }
        return $blog;
    }
}