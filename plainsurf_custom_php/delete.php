<?php


//first step
$conn = new mysqli('localhost', 'root', '', 'form');

//second step
if ($conn->connect_error) {
    die("connection failed" . $conn->connect_error);
}
echo "connected successfully";
    $sql = "DELETE FROM contact WHERE id= '$_GET[id]'";
    
    if(mysqli_query($conn,$sql)){
        header("refresh:1;url=contact_list.php");
    }
    echo 'Deleted successfully.';

?>