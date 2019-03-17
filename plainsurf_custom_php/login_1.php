<?php

session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "form";



//first step
$conn = new mysqli($servername, $username, $password, $dbname);
//second step
if ($conn->connect_error) {
    die("connection failed" . $conn->connect_error);
} else {
    echo "connection successfully";
}


if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

//third step
    $query = "SELECT username,password FROM login WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_num_rows($result);
    if ($row == 1) {
        echo"login successful";
        $_SESSION['username'] = '$username';
        $cookie_name = "username";
        $cookie_value = "$username";
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
        header("location:/contact_list.php", 301);
    } else {
        echo"login failed";
        header("location:/index.php", 301);
    }
}
?>