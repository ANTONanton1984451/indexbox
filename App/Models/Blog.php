<?php


namespace App\Models;


class Blog extends Model
{
    protected string $primaryKey = 'href';

    public function updateBody(string $string)
    {
        $statement = $this->connection->prepare("update $this->tableName set body = ? where $this->primaryKey = ?");
        $statement->execute([$string,$this->columns[$this->primaryKey]]);

    }


}