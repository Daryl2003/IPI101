<?php
include 'db_conn.php';

// this will secure the program from vurnabilities
function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function getToken($token,$conn){
    $sql = "SELECT * FROM user WHERE Verify_token = '$token'";
    $result = mysqli_query($conn, $sql);
    $selectrow = mysqli_fetch_assoc($result);
    $verify_token = $selectrow['Verify_token'];

    if($verify_token !== $token){
        echo '<script>alert("Youre not allowed here")</script>'; 
        header("Refresh:9; url=verify-email.php");
    }
}

$token = validate($_GET['token']);

getToken($token,$conn);
if(isset($_POST['verify'])){
    //To get the token from url and check
    if(isset($_GET['token'])){

        $activation_code = $_GET['token'];
        $otp = $_POST['otp'];

        $sql = "SELECT * FROM user WHERE verify_token = '$activation_code'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
            $rowSelect = mysqli_fetch_assoc($result);

            $rowOtp = $rowSelect['otp'];
            $token = $rowSelect['Verify_token'];

            if($rowOtp !== $otp){
                echo '<script>alert("Please provide correct OTP!")</script>';
            } else {
                $sqlUpdate = "UPDATE user SET active = 'true' WHERE otp = '$otp' 
                AND verify_token = '$activation_code'";

                $result = mysqli_query($conn, $sqlUpdate);
                
                if($result){
                    echo '<script>alert("Your account successfuly activated")</script>'; 
                    header("Refresh:2; url=index.php");
                }
                else{
                    echo '<script>alert("Opss... Your account is already activated")</script>'; 
                }
            }
        } else {
            echo '<script>alert("Invalid token")</script>'; 
            header("Refresh:2; url=index.php");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="styles/stylesheet.css">
</head>
<body>
    <h2>Otp Verify</h2><br>
    <form action="" method="post">
        OTP <input type="text" name="otp"><br>
        <button type="submit" name="verify">Verify</button>
    </form>
</body>
</html>
