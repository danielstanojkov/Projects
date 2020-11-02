<?php 

namespace Millionaire;

class Question implements Saveable {
    public static $tableName = 'questions';
    public static $tableColumns = ['question', 'level', 'answer1', 'answer2', 'answer3', 'answer4', 'correct'];

    public $question;
    public $level;
    public $answer1;
    public $answer2;
    public $answer3;
    public $answer4;
    public $correct;

    public function __construct(array $data){
        foreach($data as $key => $value){
            if (property_exists($this, $key)) {
                $this->$key = $data[$key]; 
            }
        }
    }

    public function getData(){
        return [
            $this->question,
            $this->level,
            $this->answer1,
            $this->answer2,
            $this->answer3,
            $this->answer4,
            $this->correct
        ];
    }

    public function getTable(){
        return self::$tableName;
    }

    public function getColumns(){
        return self::$tableColumns;
    }
}