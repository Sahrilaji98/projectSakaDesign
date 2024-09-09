<?php
// Mulai sesi
session_start();

// Hapus semua data sesi
$_SESSION = array();

// Jika menggunakan cookie untuk sesi, hapus cookie sesi
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// Hapus sesi
session_destroy();

// Hapus cookies spesifik jika ada
if (isset($_COOKIE['cookie_name'])) {
    setcookie('cookie_name', '', time() - 3600, '/');
}

// Redirect ke halaman login atau beranda
header('Location: ./');
exit;
