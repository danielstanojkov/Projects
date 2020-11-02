<?php 

namespace Millionaire;

class DB {
    private static $pdo = null;

    public static function connect(){
        if(is_null(self::$pdo)){
            require_once 'config/constants.php';
            $dsn = "mysql:host=".HOST.";dbname=" . DBNAME;
            try {
                self::$pdo = new \PDO($dsn, USER, PASSWORD);
                self::$pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
            } catch (\PDOException $ex) {
                throw $ex;
            }
        }
    }

    public static function insert($object){
        self::connect();

        $table = $object->getTable();
        $columns = implode(', ', $object->getColumns());

        $placeholders = [];
        foreach($object->getColumns() as $column){
            array_push($placeholders, '?');
        }
        $placeholders = implode(', ', $placeholders);

        $sql = "INSERT INTO $table($columns) VALUES($placeholders);";
        $stmt = self::$pdo->prepare($sql);
        return $stmt->execute($object->getData());
    }

    public static function deleteById($tableName, $id){
        self::connect();
        $sql = "DELETE FROM $tableName WHERE id = ?";
        $stmt = self::$pdo->prepare($sql);
        return $stmt->execute([$id]);
    }

    public static function findById($tableName, $id){
        self::connect();
        $sql = "SELECT * FROM $tableName WHERE id = ?";
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public static function updateUserById($data){
        self::connect();
        $sql = "UPDATE `admins` SET `username` = :username, `email` = :email, `password` = :password WHERE `admins`.`id` = :id";
        if(empty($data['password'])){
            $sql = "UPDATE `admins` SET `username` = :username, `email` = :email WHERE `admins`.`id` = :id";
            unset($data['password']);
        }
        $stmt = self::$pdo->prepare($sql);
        return $stmt->execute($data);
    }

    public static function updateQuestionById($data){
        self::connect();
        $sql = "UPDATE `questions` SET `question` = :question, `level` = :level, `answer1` = :answer1, `answer2` = :answer2, `answer3` = :answer3, `answer4` = :answer4, `correct` = :correct  WHERE `questions`.`id` = :id";
        $stmt = self::$pdo->prepare($sql);
        return $stmt->execute($data);
    }

    public static function selectQuestionsByLevel($level){
        self::connect();
        $sql = "SELECT * FROM questions WHERE level = :level ORDER BY RAND() LIMIT 5";
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute(['level' => $level]);
        return $stmt->fetchAll();
    }

    public static function findAll($tableName){
        self::connect();
        $sql = "SELECT * FROM $tableName;";
        $stmt = self::$pdo->query($sql);
        return $stmt->fetchAll();
    }

    public static function Auth($username, $password){
        self::connect();
        $sql = 'SELECT * FROM admins WHERE (username = :username OR email = :email) AND password = :password';
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute(['username' => $username, 'email' => $username, 'password' => $password]);
        if($stmt->rowCount()) {
            $_SESSION['auth'] = true;
            $_SESSION['username'] = $username;
            Redirect::To('dashboard.php');
        } return false;
    }

    public static function checkIfAuth(){
       if(isset($_SESSION['auth']) && $_SESSION['auth'] == true){
           return true;
       } 
    }
}