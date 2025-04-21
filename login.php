<?php

include 'partials/header.php';
require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');

if(isset($_POST['username'])){
    $_SESSION['username'] = $_POST['username'];
}

if(isset($_SESSION)){
    if(isset($_SESSION['username'])){
        $stmt = $db->prepare("SELECT ID, user_login, user_pass FROM wp_users WHERE user_login = :username");

        $stmt -> execute([
            ':username' => $_SESSION['username'],
        ]);

        $user = $stmt -> fetch(PDO::FETCH_ASSOC);

        if($user && wp_check_password($_POST['password'], $user['user_pass'], $user['ID'])){
            $_SESSION['ID'] = $user['ID'];
            header('Location: index.php');
            exit();
        } else{
            session_unset();
            session_destroy();
        }
    }
}

?>

<form method="POST" action="login.php">
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br>
    <input type="submit" value="Log In">
</form>

<?php

include 'partials/footer.php';

?>