<?php
namespace App\DB;
use Helpers\Traits\Singleton;

class Connection
{
    use Singleton;

    private const CONFIG_KEY = 'database';

    private static $pdo;

    public static function get() : \PDO
    {
        if(self::$pdo === null){
            self::$pdo = new \PDO(self::formPDOstring(),
                                    config(self::CONFIG_KEY.'.user'),
                                    config(self::CONFIG_KEY.'.password')
                                    );
        }
        return self::$pdo;
    }

    private static function formPDOstring() : string
    {
        $dbConfigs = config(self::CONFIG_KEY);

        $pdoString =$dbConfigs['driver'].':host='.$dbConfigs['host'].';';
        $pdoString .= 'dbname='.$dbConfigs['db_name'];

        return $pdoString;
    }
}