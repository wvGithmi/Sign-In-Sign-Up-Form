<?php

    session_start();

    if(isset($_SESSION['userlogin'])){
        header("Location: index.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" type="text/css" href="css/mystyle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
    
    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card">
                <div class="d-flex justify-content-center form_container">
                    <form>
                        <h1>Welcome Back!</h1>
                        <h2>Sign In</h2>
                        <hr class="mb-4">

                        <div class="input-group mb-3">
                            <label for="exampleInputUsername1">Username</label>
                            <input type="text" name="username" class="form-control input_user" id="username" required>
                        </div>

                        <div class="input-group mb-3">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control input_pass" id="password" required>
                        </div>
                       
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="rememberme" class="custom-control-input" id="customControlInline">
                                <label class="custom-control-label" for="customControlInline">Remember me</label>
                            </div>
                        </div>
                    
                        <div class="d-flex justify-content-center mt-3 button_container">
                            <button type="button" name="button" id="login" class="btn login_btn">Login</button>
                        </div>
                    
                        <div class="mt-4">
                            <div class="d-flex justify-content-center mt-3 link1">
                                Don't have an account? <a href="registration.php" class="ml-2">Sign Up</a>
                            </div>
                            <div class="d-flex justify-content-center link2">
                                <a href="#">Forgot your password?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>

    <script>
        $(function() {
            $('#login').click(function(e){

                var valid = this.form.checkValidity();

                if(valid){
                    var username = $('#username').val();
                    var password = $('#password').val();
                }
                
                e.preventDefault();

                $.ajax({
                    type:'POST',
                    url: 'jslogin.php',
                    data: {username: username, password: password},
                    success: function(data){
                        if($.trim(data) === "1"){
                            setTimeout(' window.location.href = "index.php"', 2000);
                        }
                    },
                    error: function(data){
                        alert('There were errors while doing the operation.');
                    }
                });
            });
        });
    </script>

</body>
</html>