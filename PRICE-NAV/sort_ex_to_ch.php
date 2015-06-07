<?php
// ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- -----
// Create connection to MySQL
$connect = new mysqli($server_name, $user_name, $password, $database_name);
// Check connection
if($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error . "<br>");
}
// Query for select
if(isset($_POST['sel'])) {
    $i = 0;
    foreach($_POST['sel'] as $val) {
        $sqll = "Firm = '" . $val ."'";
        if($i>1) {
            $sqll .= "AND Firm = '" . $val ."'";
        }
        $i++;
    }
    $sql = "SELECT id, Firm, Goods, Price FROM goods_price WHERE {$sqll} ORDER BY Price DESC";
} else {
    $sql = "SELECT id, Firm, Goods, Price FROM goods_price ORDER BY Price DESC";    
}
$result = $connect->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    echo "<br>|" . str_pad('id',3, "-") . "|" . str_pad('Firm',10, "-", STR_PAD_BOTH) . "|" . str_pad('Goods',15, "-", STR_PAD_BOTH) . "|" . str_pad('Price',10, "-",STR_PAD_BOTH) . "|" . "<br>";
    while($row = $result->fetch_assoc()) {
        echo "|" . str_pad($row["id"], 3, "-") . "|" . str_pad($row["Firm"], 10, "-", STR_PAD_BOTH) . "|" . str_pad($row["Goods"], 15, "-",STR_PAD_BOTH) . "|" . str_pad($row["Price"], 10, "-",STR_PAD_BOTH) . "|" . "<br>";
    }
} else {
    echo "0 results";
}
// ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- -----