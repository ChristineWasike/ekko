<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/signup.css">
    <title>Ekko - Sign Up</title>
</head>

<body>
    <div class="container">
        <!-- Creating the login page -->
        <div class="row row-body">
            <div class="col-md-6 mx-auto">
                <div id="first">
                    <div class="signup-form">
                        <div class="col-md-12 text-center">
                            <div class="logo">
                                <h1 id="signup-text">SignUp</h1>
                            </div>
                        </div>
                        <form action="" method="post" name="login">
                            <div class="form-group">
                                <label for="firstName">First Name</label>
                                <input type="text" name="firstname" class="form-control" id="firstname" aria-describedby="firstName" placeholder="Enter first name">
                            </div>

                            <div class="form-group">
                                <label for="lastName">Last Name</label>
                                <input type="text" name="laststname" class="form-control" id="lastname" aria-describedby="lastName" placeholder="Enter last name">
                            </div>

                            <div class="form-group">
                                <label for="emailAddress">Email Address</label>
                                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password" aria-describedby="passwordHelp" placeholder="Enter Password">
                            </div>

                            <div class="form-group">
                                <label for="confirm_password">Confirm Password</label>
                                <input type="password" name="confirm_password" class="form-control" id="confirm_password" aria-describedby="passwordHelp" placeholder="Confirm Password">
                            </div>

                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-block my-btn btn-primary txt-tfm"> Sign Up</button>
                            </div>
                        </form>
                        <div class="create-account mb-3 text-center">
                            <p id="account_p">Already have an account?</p>
                            <p id="signin_link"><a href="login.php">Login</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include("functions.php")
    ?>
</body>

</html>