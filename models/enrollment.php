<?php

interface EnrollmentObserver{

    public function update(): void;

}

class ConfirmEnrollment{

    public function update(): void{
        echo "Enrollment Confirmed";
    }

}

class NotifyLearner{

    public function update(): void{
        echo "Learner Notified";
    }

}

class NotifySystem{

    public function update(): void{
        echo "System Notified";
    }

}

class Enrollment{
    private array $observers=[];

    public function register(Observer $observer){
        $this->observers[] = $observer;
    }

    public function unregister(Observer $observer){
        $this->observers = array_filter($this->observers, fn($obs) => $observer !== $obs);
    }

    public function notify(Observer $observer){
        $observer->update();
    }
}