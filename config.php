<?php
$host = 'bqwjaag7rjkedswy9wnf-mysql.services.clever-cloud.com';
$dbname = 'bqwjaag7rjkedswy9wnf';
$username = 'uyc3n9lfgi4kcvuz';
$password = 'hsGk6WyHGxH4ppP7UuiG';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
