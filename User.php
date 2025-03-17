<?php

class User {
    public static function register($email, $password) {
        $_SESSION['user'] = [
            'email' => $email,
            'password' => $password // Insecure: just for demo
        ];
    }

    public static function login($email, $password) {
        // Dummy auth: allows one hardcoded user
        if ($email === 'demo@demo.com' && $password === 'secret') {
            $_SESSION['user'] = ['email' => $email];
            return true;
        }
        return false;
    }

    public static function isAuthenticated() {
        return isset($_SESSION['user']);
    }

    public static function logout() {
        unset($_SESSION['user']);
    }
}
