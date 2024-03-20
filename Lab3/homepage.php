<?php 
session_start();

if (!isset($_SESSION['loggedin'])){
    header("Location: loginform.php");
    exit();
}
?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <title>Contact Form</title>
    <link rel="stylesheet" href="styles/stylesheet.css">
</head>
<body>

<div class="container">
    <form action="" method="POST">
        <h2>Welcome, corndog!</h2>

        <button value="Logout" name="Logout">Logout</button>
    
        </form>
    </div>
</body>
</html>
<?php 

if (isset($_POST['Logout'])){
    session_start();
    session_destroy();
    header("Location: loginform.php");
    exit();
}
?>
