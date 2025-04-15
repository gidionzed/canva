<?php
// Aktifkan pelaporan kesalahan untuk debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Izinkan cross-origin requests dari domain Anda
header("Access-Control-Allow-Origin: https://domain-anda.com");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

// Folder dan file log
$logDir = './logs/'; // Folder untuk log
$logFile = $logDir . 'visitors_log.txt';

// Buat folder logs jika belum ada
if (!file_exists($logDir)) {
    mkdir($logDir, 0777, true);
}

// Dapatkan data JSON dari permintaan POST
$jsonData = file_get_contents('php://input');
$data = json_decode($jsonData, true);

// Validasi data
if (!$data) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Invalid data format']);
    exit;
}

// Tambahkan IP address pengunjung
$data['ip_address'] = $_SERVER['REMOTE_ADDR'];

// Tambahkan waktu server
$data['server_timestamp'] = date('Y-m-d H:i:s');

// Simpan data ke file log
try {
    // Format data sebagai JSON
    $logEntry = json_encode($data) . "\n";
    
    // Coba tulis ke file log
    $success = file_put_contents($logFile, $logEntry, FILE_APPEND);
    
    // Kirim respons
    if ($success === false) {
        http_response_code(500);
        echo json_encode(['status' => 'error', 'message' => 'Failed to write log']);
    } else {
        http_response_code(200);
        echo json_encode(['status' => 'success', 'message' => 'Tracking data saved']);
    }
} catch (Exception $e) {
    // Tangkap kesalahan jika ada
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    
    // Log kesalahan
    $errorLogFile = $logDir . 'error_log.txt';
    file_put_contents($errorLogFile, date('Y-m-d H:i:s') . " - Error: " . $e->getMessage() . "\n", FILE_APPEND);
}
?>