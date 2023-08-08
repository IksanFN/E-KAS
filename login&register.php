<?php 
session_start();
include_once 'view/css.php'; 

include_once 'proses_register.php';
include_once 'proses_login.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register</title>
</head>
<body>

<div class="container p-3 my-5">
    <div class="row mx-1">
        <div class="card">
            <div class="card-body">
            <!-- Pills navs -->
            <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab"
                aria-controls="pills-login" aria-selected="true">Login</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="#pills-register" role="tab"
                aria-controls="pills-register" aria-selected="false">Register</a>
            </li>
            </ul>
            <!-- Pills navs -->

            <!-- Pills content -->
            <div class="tab-content">
            <!-- Login -->
            <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                <form action="" method="post">
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="text" id="loginName" class="form-control" name="username"/>
                    <label class="form-label" for="loginName">Username</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input type="password" id="loginPassword" class="form-control" name="password"/>
                    <label class="form-label" for="loginPassword">Password</label>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4" name="login">Login</button>
                </form>
            </div>

            <!-- Register -->
            <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                <form action="" method="post">

                <!-- Username input -->
                <div class="form-outline mb-4">
                    <input type="text" id="registerUsername" class="form-control" name="username"/>
                    <label class="form-label" for="registerUsername">Username</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input type="password" id="registerPassword" class="form-control" name="password"/>
                    <label class="form-label" for="registerPassword">Password</label>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-3" name="register">Register</button>
                </form>
            </div>
            </div>
            <!-- Pills content -->
            </div>
        </div>
    </div>
</div>

    
    <?php include_once 'view/js.php'; ?>
</body>
</html>

