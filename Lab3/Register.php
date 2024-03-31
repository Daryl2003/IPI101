<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>
<body style="background: lightblue;">
    <div class="container mt-5"  style="max-width: 50rem; ">
        <form method="post"  class="p-2 rounded bg-light shadow" action="register_code.php">
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
                <div class="form-group mb-3">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="firstname" placeholder="First name" pattern="[A-zA-Z\s]*$" required />
                        </div>
                        
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="middlename" placeholder="Middle name" pattern="[A-zA-Z\s]*$"  />
                        </div>
                    </div>
                </div>
                <!-- Last Name Field -->
                <div class="form-group mb-3">
                    <input type="text" name="lastname" class="form-control" placeholder="Lastname" pattern="[A-zA-Z\s]*$" required />
                </div>         

                <div class="form-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email Address"required>
                </div>
                <!-- Email, Status, and Active Fields -->
                <div class="form-group mb-3">
                    <input type="text" name="status" class="form-control" placeholder="Status"required>
                </div>

                <!-- Username and Password Fields -->
                <div class="form-group">
                    <div class="row g-2">
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="username" placeholder="Username" required>
                        </div>
                        <div class="col-md-6">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value="" id="termsCheckbox" required>
                        <label class="form-check-label" for="termsCheckbox"> I agree to the <a href="#">Terms and Conditions</a>
                    </label>
                </div>
                <!-- Login Link and Submit Button -->
                <div class="form-group">
                    Already have an account?<a href="loginform.php">Log in here</a>
                </div>
                <input type="submit" class="btn btn-success" name="submit" value="Submit">
                </div>
        </form>
    </div>
 
