<?php

include 'partials/header.php';
include 'models/enrollment.php';

$enrollment_manager = new Enrollment();
$enrollment_manager->register(new ConfirmEnrollment());
$enrollment_manager->register(new NotifyLearner());
$enrollment_manager->register(new NotifySystem());

if(isset($_POST)){
    $db = Database::getConnection()->getInstance();
}
?>



<?php

?>