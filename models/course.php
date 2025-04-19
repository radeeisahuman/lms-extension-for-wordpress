<?php

abstract class Course{
    private int $id;
    private string $course_title;
    private int $instructor_id;
    private string $course_duration;
    private int $product_id;

    public function __construct(int $id, string $course_title, int $instructor_id, string $course_duration){
        $this->id = $id;
        $this->course_title = $course_title;
        $this->instructor_id = $instructor_id;
        $this->course_duration = $course_duration;
    }

    public function set_id(int $product_id){
        $this->product_id = $product_id;
    }

    abstract public function add_course(): void;
}

class TextCourse extends Course{
    
    public function add_course(): void{
        echo "Pushed a Text Course to db";
    }

}

class VideoCourse extends Course{

    public function add_course(): void{
        echo "Pushed a Video Course to db";
    }

}

abstract class CourseFactory{
    
    abstract public function CourseFactoryMethod(int $id, string $course_title, int $instructor_id, string $course_duration): Course;
    
    public function CreateCourse(int $id, string $course_title, int $instructor_id, string $course_duration){
        $course = $this-> CourseFactoryMethod($id, $course_title, $instructor_id, $course_duration);
        return $course;
    }

}

class TextCourseFactory extends CourseFactory{
    
    public function CourseFactoryMethod(int $id, string $course_title, int $instructor_id, string $course_duration): Course{
        return new TextCourse($id, $course_title, $instructor_id, $course_duration);
    }

}

class VideoCourseFactory extends CourseFactory{
    
    public function CourseFactoryMethod(int $id, string $course_title, int $instructor_id, string $course_duration): Course{
        return new VideoCourse($id, $course_title, $instructor_id, $course_duration);
    }

}