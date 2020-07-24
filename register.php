<?php 
    session_start();
    include('server.php'); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>Register page</title>

    <link rel="stylesheet" href="style.css">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

</head>

<body>


    <div class="wrapper-login">
        <div class="my-custom-style">
            <form action="register_db.php" id="form-login" method="post">
                <div class="header">
                    <h2>Create an account</h2>
                </div>
               
                <div class="input-group">
                    <p>Username</p><br>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" name="username" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                    </div>



                </div>
                <div class="input-group">
                    <label for="email">Email</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="text" id="email" name="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="input-group">
                    <label for="password1">Password</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                        </div>
                        <input type="password" id="password1" name="password1" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                    </div>

                </div>
                <div class="input-group">
                    <label for="password2">Confirm Password</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                        </div>
                        <input type="password" id="password2" name="password2" class="form-control" placeholder="Confirm Password" aria-label="Confirm Password" aria-describedby="basic-addon1">
                    </div>


                </div>
                <?php include('errors.php'); ?>
                <?php if (isset($_SESSION['error'])) : ?>
                    <div class="error">
                        
                            <?php
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                            ?>
                        
                    </div>
                <?php endif ?>
                <br>
                <div class="input-group">
                    <button type="submit" name="reg_user" class="btn">Register</button>
                </div>
                <br>
                <p>Already a member? <a href="signin.php">Sign in</a></p>
                
            </form>

        </div>

    </div>




</body>

</html>