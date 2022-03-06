<?php
class DB
{
    static $db;

    public static function Connect()
    {

        try {
            self::$db = new PDO("mysql:host=localhost;dbname=oop", 'root', '');
            // set the PDO error mode to exception
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "DB Connection successfull!";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public static function CreateDB($param = '')
    {

        try {
            self::$db->exec("CREATE DATABASE " . $param);
            echo "Database created successfully <br>";
        } catch (PDOException $e) {

            //...
        }
        //...


    }

    public static function Select($param = '')
    {
        $sql = 'SELECT * FROM  ' . $param . '  ';

        return self::$db->query($sql)->fetchAll();
    }



    public static function Insert($table = '', $params = [])
    {
        $keys = '';
        $values = [];

        foreach ($params as $key => $item) {
            $keys .= $key . ' = ? , ';
            array_push($values, $item);
        }

        $keys = trim($keys, ' , ');

        echo 'Successfully added <br>';
        return self::$db->prepare('INSERT INTO ' . $table . ' SET ' . $keys . ' ')
            ->execute(
                $values
            );
    }
}
