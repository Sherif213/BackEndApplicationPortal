<?php
// config/Database.php
use Illuminate\Database\Capsule\Manager as Capsule;
use Dotenv\Dotenv;

class Database
{
    private static $capsule = null;

    private function __construct() {}  // Prevent instantiation

    public static function getConnection()
    {
        if (self::$capsule === null) {
            // Load .env variables
            $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
            $dotenv->load();

            // Initialize Capsule with environment variables
            $capsule = new Capsule;
            $capsule->addConnection([
                'driver'    => $_ENV['DB_DRIVER'],
                'host'      => $_ENV['DB_HOST'],
                'database'  => $_ENV['DB_DATABASE'],
                'username'  => $_ENV['DB_USERNAME'],
                'password'  => $_ENV['DB_PASSWORD'],
                'charset'   => $_ENV['DB_CHARSET'],
                'collation' => $_ENV['DB_COLLATION'],
                'prefix'    => $_ENV['DB_PREFIX'],
            ]);
            $capsule->setAsGlobal();
            $capsule->bootEloquent();
            self::$capsule = $capsule;
        }

        return self::$capsule;
    }
}
