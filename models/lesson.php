<?php

abstract class Topic{
    private int $id;
    private int $course_id;
    private string $content;
    private string $duration;
    private string $lesson_type;

    public function __construct(int $id, int $course_id, string $content, string $duration, string $lesson_type){
        $this->id = $id;
        $this->course_id = $course_id;
        $this->content = $content;
        $this->duration = $duration;
        $this->lesson_type = $lesson_type;
    }

    abstract public function render_lesson(): void;
}

class Lesson extends Topic{

    public function render_lesson(): void{
        echo "Lesson";
    }

}

class Quiz extends Topic{

    public function render_lesson(): void{
        echo "Quiz";
    }
    
}

class Assignment extends Topic{

    public function render_lesson(): void{
        echo "Assignment";
    }
    
}