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

        <!-- <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" name="lastname" required>

        <label for="firstname">First Name:</label>
        <input type="text" id="first" name="firstname" required>

        <label for="middlename">Middle Name:</label>
        <input type="text" id="middlename" name="middlename" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="status">Status:</label>
        <input type="text" id="status" name="status" required>

        <input type="radio" id="active" name="active" value="Active">
        <label for="active">Active</label><br>
        
        <input type="radio" id="active" name="active" value="Active">
        <label for="active">Not Active</label><br>

        <button value="Submit" name="submit">Submit</button> -->

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
