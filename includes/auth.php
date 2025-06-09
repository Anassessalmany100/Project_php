<?php
session_start();

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function getUserRole() {
    return $_SESSION['user_role'] ?? 'member';
}

function requireAuth() {
    if (!isLoggedIn()) {
        header('Location: login.php');
        exit();
    }
}

function requireRole($roles) {
    requireAuth();
    if (!in_array(getUserRole(), $roles)) {
        header('Location: unauthorized.php');
        exit();
    }
}

// Mock user data - in production, this would come from database
function getCurrentUser() {
    return [
        'id' => $_SESSION['user_id'] ?? '1',
        'name' => $_SESSION['user_name'] ?? 'John Doe',
        'email' => $_SESSION['user_email'] ?? 'john@example.com',
        'role' => getUserRole(),
        'avatar' => 'https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&cs=tinysrgb&w=150'
    ];
}

// Set mock session for demo
if (!isset($_SESSION['user_id'])) {
    $_SESSION['user_id'] = '1';
    $_SESSION['user_name'] = 'John Doe';
    $_SESSION['user_email'] = 'john@example.com';
    $_SESSION['user_role'] = 'admin';
}
?>