<?php
// config/Database.php
use Illuminate\Database\Capsule\Manager as Capsule;

class Database
{
    private static $capsule = null;

    private function __construct() {}  // Prevent instantiation

    public static function getConnection()
    {
        if (self::$capsule === null) {
            $capsule = new Capsule;
            $capsule->addConnection([
                'driver'    => 'mysql',
                'host'      => 'localhost',
                'database'  => 'unescodb',
                'username'  => 'root',
                'password'  => '1532910',
                'charset'   => 'utf8mb4',
                'collation' => 'utf8mb4_general_ci',
                'prefix'    => '',
            ]);
            $capsule->setAsGlobal();
            $capsule->bootEloquent();
            self::$capsule = $capsule;
        }

        return self::$capsule;
    }
}
