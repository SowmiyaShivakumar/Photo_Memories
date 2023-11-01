<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signin</title>
    <link rel="stylesheet" href="l1.css">
    <script src="https://kit.fontawesome.com/6133dcca2b.js" crossorigin="anonymous"></script>
    <style>
        body{
            background: linear-gradient(rgba(0,0,0,0.2),rgba(0,0,0,0.2)),url(bgimg.png);
            background-position: center;
        background-size: cover;
        }
    </style>
    <script>
        //To check whether both the passwords match
        function checkPassword(form){
            password1 = form.password1.value;
            password2 = form.password2.value;
  
              if(password1=='')
                 alert("Please enter Password");
              else if(password2=='')
                 alert("Please enter confirm password");
              else if(password1!=password2){
                alert("Password doesn't match");
                
              }
              else{
              return true;
             }
            return false;
          }
        
      </script>
      <link rel="stylesheet" href="sweetalert2.min.css">
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
           
    <div class="container">
        <div class="box">
            <h1>Register</h1>
            <form action="">
                <div class="field">
                    <i style="color: rgb(10, 10, 10); margin-right: 5px; " class="fa-regular fa-user fa-bounce"></i>
                    <input type="text" name="" id="" placeholder="Username:">
                </div>
                <div class="field">
                    <i style="color: rgb(19, 19, 19);margin-right: 5px;" class="fa-solid fa-unlock fa-bounce"></i>
                    <input type="password" name="" id="" placeholder="Set Password:">
                </div>
                <div class="field">
                    <i style="color: rgb(12, 12, 12);margin-right: 5px;" class="fa-solid fa-unlock fa-bounce"></i>
                    <input type="password" name="" id="" placeholder="Confirm Password:">
                </div>
                <div class="field">
                    <i style="color: rgb(10, 10, 10);margin-right: 5px;" class="fa-regular fa-envelope fa-bounce"></i>
                    
                    <input type="email" name="" id="" placeholder="MailID:">
                </div>
                <div class="cb">
                    <input type="checkbox" name="" id="">&nbsp;
                    <p>Remember Me</p>
                    <a href="">Forgot Password?</a>
                </div>
                
                <button name="sub"><a href="home.html">Submit</a></button>
                <div class="lastline">
                    <p>Already have an account? <a href="login.html">Login</a></p>
                </div>
               
            </form>
        </div>



        <?php
if(isset($_POST['sub'])){
      $email = $_POST['email'];
      $password1 = $_POST['password1'];
      $query = "Select * from users where Email = '$email' and Password1 = '$password1'";
      $run = mysqli_query($conn,$query);
      if(mysqli_num_rows($run)>0){
            echo "<script>
              Swal.fire({
                  title: 'Already Registered!!',
                  text: 'Kindly Login to continue',
                  icon: 'info',
                  allowOutsideClick:false,
                  confirmButtonText : 'Ok',
                  confirmButtonColor: 'rgb(69, 192, 58)',
                }).then((result) =>
                      {
                     if(result.isConfirmed){
                             window.location.href='index.php';
                      }
                      
                            });
             
            </script>";
            
      }
      else{
      $query1 = mysqli_query($conn, "Insert into users(Email,Password1) values('$email','$password1')");
      if($query1){
            echo"<script>
              
                        Swal.fire({
                              title: 'Welcome to House Box - Thank you for Registering',
                              text: 'Kindly Login to Proceed',
                              icon: 'success',
                              allowOutsideClick:false,
                              confirmButtonText : 'Ok',
                              confirmButtonColor: 'rgb(69, 192, 58)',
                            }).then((result) =>
                            {
                              if(result.isConfirmed){
                                    window.location.href='index.php';
                              }
                        });
            </script>";
                  
      }
      else{
           echo "<script>
           Swal.fire({
            title: 'Oops!!',
            text: 'Something went wrong.Please try again!',
            icon: 'error',
            allowOutsideClick:false,
            confirmButtonText : 'Ok',
            confirmButtonColor: '#3085d6',
          })
           </script>";
       }
}
   }
  
?>
    
</body>
</html>