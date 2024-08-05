
<?php
	$host = "127.0.0.1";
	$username = "root";
	$password = "aporose";
	$db_name = "online_booking_bus_system";


$conn = new mysqli($host, $username, $password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>