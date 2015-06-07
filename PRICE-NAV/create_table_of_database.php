<?php
// ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- -----
// Create connection to database
$connect = new mysqli($server_name, $user_name, $password, $database_name);
// Check connection
if($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error . "<br>");
}
// Create table of database
$sql =  "CREATE TABLE goods_price (
                id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                Firm VARCHAR(4) NOT NULL,
                Goods VARCHAR(10) NOT NULL,
                Price INT UNSIGNED NOT NULL
            )";
// Check created
if($connect->query($sql) === TRUE) {
    echo "Table of database {$database_name} created succesfully!<br>";
} else {
    echo "Error creating table of database {$database_name}: " . $connect->error . "<br>";
}
// ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- -----

// ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- -----
$stmt = $connect->prepare("INSERT INTO goods_price (Firm, Goods, Price) VALUES (?,?,?)");
$stmt->bind_param("ssi", $firm, $goods, $price);

// Set parameters and execute
$firm = 'lala';
$goods = 'la_comode';
$price = 999;
$stmt->execute();

$firm = 'lala';
$goods = 'la_stole';
$price = 5532;
$stmt->execute();

$firm = 'fafa';
$goods = 'fa_pototo';
$price = 1322;
$stmt->execute();

$firm = 'lala';
$goods = 'la_shcafe';
$price = 1234;
$stmt->execute();

$firm = 'gaga';
$goods = 'ga_snolqe';
$price = 3255;
$stmt->execute();

$firm = 'fafa';
$goods = 'fa_goroto';
$price = 4321;
$stmt->execute();

$firm = 'gaga';
$goods = 'ga_pronto';
$price = 9643;
$stmt->execute();

$firm = 'fafa';
$goods = 'fa_dodo';
$price = 5211;
$stmt->execute();

$firm = 'gaga';
$goods = 'ga_bolero';
$price = 7492;
$stmt->execute();

echo "New records created successfully!<br>";

$stmt->close();
$connect->close();
// ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- -----
