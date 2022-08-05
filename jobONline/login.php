<?php 
session_start();
if(isset($_SESSION['username'])){
   header('location: index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="./assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/main.css">
</head>
<body>
    <!-- loader -->
    <div id="loader">
          <img src="./assets/img/loader.gif" id="loader-image">
    </div>

    <div class="login-form container">
        <div class="container d-flex justify-content-center align-items-center">
            <form id="login" class="p-4">
                <div class="mb-3">
                    <h4>Welcome back</h4>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="<?="example@email.com"?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary w-100" name="login" value="Login">Login</button>
            </form>
        </div>
    </div>
    <!-- externel js -->
    <script src="./assets/js/jquery-3.6.0.min.js"></script>
    <script src="./assets/bootstrap-5.0.2-dist/js/bootstrap.js"></script>
    <script src="./assets/js/jquery.validate.js"></script>
    <script src="./assets/js/main.js"></script>
    
    <script>
        $(document).ready(function(){
                $("#login").validate({
                    rules
                    : {
                        email : {
                            required : true,
                            email : true,
                        },
                        password : {
                            required : true,
                            minlength : 8,
                        }
                    },
                    messages: {
                        email : { 
                            required : "Please enter email.",
                            email : "please enter you email correctly."
                        },
                        password: {
                            required : "Please enter password.",
                            minlength : "Password must contain atleast 8 characters."
                        }
                    },
                    errorClass : "text-danger",
                });     
        });
    </script>
    <?php
        include('env.php');
        $login = isset($_POST['login']) ? $_POST['login'] : "";
        
        if(!$login == ""){
            $username = isset($_POST['email']) ? $_POST['email'] : "";
            $password = isset($_POST['password']) ? $_POST['password'] : "";
            
            $query = "SELECT * FROM admins where user_name = '$username' AND password = '$password'";
            $select = mysqli_query($db_connect,$query);
            $rows = mysqli_num_rows($select);
            
            
            if(mysqli_num_rows($rows) == 1){
                // $_SESSION['username'] = $username;
                header('location:./login.php');
            }
            
        }
    ?>
</body>
</html>