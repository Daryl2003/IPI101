<?php
    include 'db_conn.php';
    use PHPMailer\PHPMailer\PHPMailer;
    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';

    if(isset($_POST['submit'])){
        
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        
        function sendmail_verify($First_name, $Email, $Verify_token, $otp){
            $mail = new PHPMailer(true);

            $mail->STMPdebug = 3;
            $mail->isSMTP();                                          
            $mail->Host       = 'smtp.gmail.com';                    
            $mail->SMTPAuth   = true;                                   
            $mail->Username   = 'daryl.suniega@gmail.com';                     
            $mail->Password   = 'elae lnmr krvm quaa';                               
            $mail->SMTPSecure = 'ssl';
            $mail->Port       = 465;                                    

            //Recipients
            $mail->setFrom('daryl.suniega@gmail.com');
            $mail->addAddress($Email);    

            //Content  
            $mail->isHTML(true);                               
            $mail->Subject = 'Email Verification for logging in';
            $mail->Body    = "
            <h2>Hi $First_name! We are thrilled to officially welcome you to our community!</h2><br>
            <h3>Use this OTP to very your account: <b>$otp</b></h3>
            <h4>
                Verify your email address with the 
                link given below.
            </h4>
            <br><br>
            <a href='http://localhost/Lab3/verify-email.php?token=$Verify_token'>Click Here</a>";

            $mail->send();
        }
            //initializing variables and sanitizing them using validate function
            $First_name      = validate($_POST['firstname']);
            $Middle_name     = validate($_POST['middlename']);
            $Last_name       = validate($_POST['lastname']);
            $Email           = validate($_POST['email']);
            $Status          = validate($_POST['status']);
            $username        = validate($_POST['username']);
            $password        = validate($_POST['password']);
            $otp             = substr(str_shuffle("0123456789"), 0, 5);          
            $Verify_token    = md5(rand());


            //veryfying if the email and username input is unique
            $vfy_email = mysqli_query($conn, "SELECT Email FROM user WHERE Email = '$Email'");
            $vfy_uname = mysqli_query($conn, "SELECT Username FROM user WHERE username = '$username'");

            if(mysqli_num_rows($vfy_email) !=0) {
                header("Location: Register.php?error=Email is already used!");
            } else if(mysqli_num_rows($vfy_uname) !=0) {
                header("Location: Register.php?error=User name is already used!"); 
            } else {
                $sql = "INSERT INTO user (First_name, Middle_name, Lastname, Email, Status, username, password, Verify_token, otp)
                VALUES ('$First_name', '$Middle_name','$Last_name', '$Email', '$Status', '$username', '$password', '$Verify_token', '$otp')";
                $result = mysqli_query($conn, $sql);

                if($result){
                    sendmail_verify($First_name, $Email, $Verify_token, $otp);
                    header("Location: Register.php?success=You've successfully created account!"."We've Email please verify your email address");
                }
            }
    }
?>