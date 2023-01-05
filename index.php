<?php
include('cdn.html');
require('config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="text-center">
            <div class="mt-5" style="width: 100%;">
                <div class="card-header">
                    <h3 class="text-center mb-3">Login</h3>
                </div>
                <form action="" class="">
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" class="form-control" name="passwd" id="pswd" placeholder="Password">
                    </div>
                    <br>
                    <a href="home.php" class="btn btn-success form-control">Login</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>