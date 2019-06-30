<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phploginapp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM users";
$result = $conn->query($sql);
$output = '';

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
        echo "id: " . $row["id"]. " | Name : " . $row["name"]. "| email : " . $row["email"]. "<br>";
    }

    foreach($result as $k)
    {
        $output .='<table>aaa'. $k["id"].'</table>';
    }
    echo $output;
} else {
    echo "0 results";
}
$conn->close();
?>