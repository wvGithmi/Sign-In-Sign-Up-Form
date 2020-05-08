<?php
    require_once('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>

    <link rel="stylesheet" type="text/css" href="css/mystyle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>

    <div>
        <?php
            
        ?>
    </div>

    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card">
                <div class="d-flex justify-content-center form_container">
                    <form action="registration.php" method="post">
                        <h1>Hello Friend!</h1>
                        <h2>Sign Up</h2>
                        <hr class="mb-4">

                        <div class="input-group mb-3">
                            <label for="name">Name</label>
                            <input type="text" class="form-control input_user" name="name" id="name" required>
                        </div>
                       
                        <div class="input-group mb-3">
                            <label for="username">Username</label>
                            <input type="text" class="form-control input_user" name="username" id="username" required>
                        </div>

                        <div class="input-group mb-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control input_user" name="password" id="password" required>
                        </div>

                        <div class="input-group mb-3">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control input_user" name="email" id="email" aria-describedby="emailHelp" required>
                        </div>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>

                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                        </div>
            
                        <div class="d-flex justify-content-center mt-3 button_container">
                            <button type="submit" name="create" class="btn reg_btn" id="register">Sign Up</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script type="text/javascript">
        $(function(){
            $('#register').click(function(e){

                var valid = this.form.checkValidity();

                if(valid){

                    var name = $('#name').val();
                    var username = $('#username').val();
                    var password = $('#password').val();
                    var email = $('#email').val();

                    e.preventDefault();

                    $.ajax({
                        type: 'POST',
                        url: 'process.php',
                        data: {name: name, username: username, password: password, email: email},
                        success: function(data){
                            Swal.fire({
                                'title' : 'Successful!',
                                'text' : data,
                                'type' : 'success'
                            })
                        },
                        error: function(data){
                            Swal.fire({
                                'title' : 'Error!',
                                'text' : 'There were errors while saving the data.',
                                'type' : 'error'
                            })
                        }
                    });
 
                }else{
                   
                }

            });
        });
    </script>

</body>
</html>