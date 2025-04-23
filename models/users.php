<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');

class User{
    private int $id;
    private string $display_name;	
    private string $user_login;
    private string $user_nicename;
    private string $user_email;

    public function __construct(int $id, string $display_name, string $user_login, string $user_nicename, string $user_email){
        $this->id = $id;
        $this->display_name = $display_name;
        $this->user_login = $user_login;
        $this->user_nicename = $user_nicename;
        $this->user_email = $user_email;
    }

    public function register_user(PDO $db, string $password){
        $stmt = $db->prepare("INSERT INTO wp_users (ID, display_name, user_login, user_nicename, user_email, user_pass) VALUES (:id, :display_name, :user_login, :user_nicename, :user_email, :user_pass)");

        $stmt->execute([
            ':id' => $this->id,
            ':display_name' => $this->display_name,
            ':user_login' => $this->user_login,
            ':user_nicename' => $this->user_nicename,
            ':user_email' => $this->user_email,
            ':user_pass' => $this->$password
        ]);
    }
}