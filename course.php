<?php 
class course{
    private $name;
    private $age;
    private $course;

    public function __construct($name, $age, $course){
        $this->name = $name;
        $this->age = $age;
        $this->course = $course;

    }
    public function getName(){
        return $this ->name;
    }
    public function getAge(){
        return $this ->age;
    }
    public function getCourse(){
        return $this ->course;
    }
}