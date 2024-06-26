<?php
session_start();
include "db_conn.php";

if (isset($_POST['username']) && isset($_POST['password'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $username = validate($_POST['username']);
    $pass = validate($_POST['password']);

    if (empty($username)) {
        header("Location: loginform.php?error=User Name is required");
        exit();
    } elseif (empty($pass)) {
        header("Location: loginform.php?error=Password is required");
        exit();
    } else {
        $sql = "SELECT * FROM user WHERE username='$username' AND password='$pass'";
        $result = mysqli_query($conn, $sql);
       
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['username'] == $username && $row['password'] == $pass) {
                echo "Logged in!";
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $row['username'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                header("Location: homepage.php");
                exit();
            } else {
                header("Location: loginform.php?error=Incorrect User name or password");
                exit();
            }
        } else {
            header("Location: loginform.php?error=Incorrect User name or password");
            exit();
        }
    }
} else {
    header("Location: loginform.php");
    echo "error";
    exit();
}

?>
