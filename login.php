<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
    <title>Ekko - Login</title>
</head>

<body>
    <div class="container">
        <!-- Creating the login page -->
        <div class="row row-body">
            <div class="col-md-6 mx-auto">
                <div id="first">
                    <div class="login-form">
                        <div class="col-md-12 text-center">
                            <div class="logo">
                                <h1>Welcome to Ekko</h1>
                                <p>Kindly login here</p>
                                <h2 id="login-text">Login</h2>
                            </div>
                        </div>
                        <form action="includes/login_validation.php" method="post" name="login">
                            <div class="form-group">
                                <label for="userName">User Name</label>
                                <input type="text" name="username" class="form-control" id="text" aria-describedby="emailHelp" placeholder="Enter username">
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password" aria-describedby="passwordHelp" placeholder="Enter Password">
                            </div>

                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-block my-btn btn-primary txt-tfm"> Sign In</button>
                            </div>
                        </form>
                    </div>

                    <div class="create-account mb-3 text-center">
                        <p id="account_p">Dont have an account yet? </p>
                        <p id="create-link"><a href="signup.php">Create an account</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>