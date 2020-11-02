<?php 

namespace Millionaire;

class Admin implements Saveable {
    public static $tableName = 'admins';
    public static $tableColumns = ['username', 'email', 'password'];

    public $username;
    public $email;
    public $password;

    public function __construct(array $data){
        foreach($data as $key => $value){
            if (property_exists($this, $key)) {
                if($key == 'password'){
                    $this->$key = md5($data[$key]);
                    continue;  
                }
                $this->$key = $data[$key];
            }
        }
    }

    public function getData(){
        return [
            $this->username,
            $this->email,
            $this->password
        ];
    }

    public function getTable(){
        return self::$tableName;
    }

    public function getColumns(){
        return self::$tableColumns;
    }
}