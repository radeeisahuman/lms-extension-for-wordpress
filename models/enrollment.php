<?php

interface EnrollmentObserver{

    public function update(PDO $db): void;

}

class ConfirmEnrollment implements EnrollmentObserver{

    public function update(PDO $db): void{
        echo "Enrollment Confirmed";
    }

}

class NotifyLearner implements EnrollmentObserver{

    public function update(PDO $db): void{
        echo "Learner Notified";
    }

}

class NotifySystem implements EnrollmentObserver{

    public function update(PDO $db): void{
        echo "System Notified";
    }

}

class Enrollment{
    private array $observers=[];

    public function register(EnrollmentObserver $observer){
        $this->observers[] = $observer;
    }

    public function unregister(EnrollmentObserver $observer){
        $this->observers = array_filter($this->observers, fn($obs) => $observer !== $obs);
    }

    public function notify(EnrollmentObserver $observer){
        $observer->update();
    }
}