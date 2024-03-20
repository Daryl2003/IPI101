<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>
<body class="bg-info">
<div class="container"> 
    <div class="row justify-content-center">
        <!-- Registration Form -->
        <form autocomplete="on" class="Register row g-3 " action="register_code.php" method="post">
            <h2>REGISTRATION</h2>
                <p>Create your account here.</p>
                <!-- Display error or success messages -->
                <?php if (isset($_GET['error'])) { ?>
                    <div class="p bg-danger text-white p-1 rounded mb-4 text-center" style="width: 95%;">
                        <?php echo $_GET['error']; ?></p>
                    </div>
                <?php } ?>
                <?php if (isset($_GET['success'])) { ?>
                    <div class="p bg-success text-white p-1 rounded mb-4 text-center" style="width: 95%;">
                    <?php echo $_GET['success']; ?></p>
                    </div>
                <?php } ?>
                <!-- First Name and Middle Name Fields -->   
                <div class="form-group">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="firstname" placeholder="First name" pattern="[A-zA-Z\s]*$" required />
                        </div>
                        
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="middlename" placeholder="Middle name" pattern="[A-zA-Z\s]*$" required />
                        </div>
                    </div>
                </div>
                <!-- Last Name Field -->
                <div class="form-group">
                    <input type="text" name="lastname" class="form-control" placeholder="Lastname" pattern="[A-zA-Z\s]*$" required />
                </div>         

                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email Address">
                </div>
                <!-- Email, Status, and Active Fields -->
                <div class="form-group">
                    <input type="text" name="status" class="form-control" placeholder="Status">
                </div>

                <!-- Username and Password Fields -->
                <div class="form-group">
                    <div class="row g-2">
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="username" placeholder="Username">
                        </div>
                        <div class="col-md-6">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                    </div>
                </div>
                <!-- Login Link and Submit Button -->
                <div class="form-group">
                    Already have an account?<a href="loginform.php">Log in here</a>
                </div>
                <input type="submit" class="btn btn-success" name="submit" value="Submit">
                </div>
        </form>
    </div>
 
