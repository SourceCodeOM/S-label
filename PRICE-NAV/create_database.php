<?php
// ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- -----
// Create connection to MySQL
$connect = new mysqli($server_name, $user_name, $password);
// Check connection
if($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
    echo "<br>";
}
// Delete the database created earlier
$sql = "DROP DATABASE {$database_name}";
$connect->query($sql);
// Create database
$sql =  "CREATE DATABASE {$database_name}";
// Check created
if($connect->query($sql) === TRUE) {
    echo "Database {$database_name} created succesfully!<br>";
} else {
    echo "Error creating database {$database_name}: " . $connect->error . "<br>";
}
// Close connection to MySQL
$connect->close();
// ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- -----