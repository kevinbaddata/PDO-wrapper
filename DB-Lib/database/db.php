<?php
class DB
{
    static $db;

    public static function Connect()
    {
        try {
            self::$db = new PDO("mysql:host=localhost;dbname=chat", 'root', '');
            // set the PDO error mode to exception
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public static function CreateDB($param = '')
    {

        try {
            self::$db->exec("CREATE DATABASE " . $param);
         
        } catch (PDOException $e) {

            echo "Error creating database: " . $e->getMessage();
        }
        

    }

    public static function Select($param = "")
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

     
        return self::$db->prepare('INSERT INTO ' . $table . ' SET ' . $keys . ' ')
            ->execute(
                $values
            );
    }

    public static function Delete($param = "")
    {
        // sql to delete a record
        $sql = "DELETE FROM " . $param;

        // use exec() because no results are returned
        self::$db->exec($sql);
        
    }


    public static function Truncate($param = "")
    {
        // Truncate
        self::$db->exec("TRUNCATE TABLE " . $param);
      
    }

    public static function DropTable($param = '') {
        self::$db->exec("DROP TABLE " . $param);
    }
}

