<?php
    require_once "db_conn.php";                                   ///embed PHP code from another file            
    $error = ""; 

    if ($_SERVER['REQUEST_METHOD'] == "POST"){                      //check for the post request which occure after user submit form
        $first_name = trim($_POST["firstName"]);                    //get first name
        $last_name = trim($_POST["lastName"]);                      //get last name
        $email = trim($_POST["email"]);                             //get email
        $password = trim($_POST['password']);                       //get password
        $confirm_password = trim($_POST['confirm_password']);       //get conform password
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);//hashing the entered password with PASSWORD_BCRYPT hashing method.... we can also use PASSWORD_DEFAULT which Use the bcrypt algorithm (default as of PHP 5.5.0);
        if(!empty(trim($_POST["email"])) && !empty(trim($_POST["password"])) && !empty(trim($_POST["confirm_password"]))){      //checking if any of the field is empty
            //lets check email is valid or not
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                //lets check if the entered email is already exist in batabase or not
                $sql = "SELECT email FROM users WHERE email = '{$email}'";
                $query = mysqli_query($conn, $sql);
                if(!(mysqli_num_rows($query)>0)){  //when email is not matched
                    // check if password && conform password is same
                    if($password == $confirm_password){
                        //create user in database with hashed password
                        $sql = "INSERT INTO users (first_name, last_name, email, password) VALUES ('{$first_name}','{$last_name}', '{$email}', '{$hashed_password}')";
                        $query = mysqli_query($conn,$sql);
                        if($query){//if data is inserted
                            // redired to login.php if every things goes good
                            header("location: login.php");
                        }else{
                            $error = "Something went Wronh!! Contact Admin";
                        }

                    }else{
                        $error = "Password & Conform Password does not matched";
                    }
                }else{
                    $error = "Email is already registred";
                }
            }else{
                $error = "Email is not valid";
            }
        }else{
            $error = "All input fields are required";
        }
    }
    mysqli_close($conn);   // closing mysqli connection
///REQUEST_METHOD Which request method was used to access the page; e.g. 'GET', 'HEAD', 'POST', 'PUT'.
///trim() => remove whitespaces & other chars from beginning & the end
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>SignUp</title>
    <link rel="stylesheet" href="register.css">
    <script src="https://kit.fontawesome.com/e5f4960269.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="form_wrapper">
      <section id="signup_form">
        <header>Register Form</header>
        <form action="<?php $_PHP_SELF ?>" method="post">
          <div class="name-details">
              <div class="field first_name">
                  <label for="firstName">First Name</label>
                  <input type="text" id="firstName" name="firstName" placeholder="First Name">
              </div>
              <div class="field last_name">
                  <label for="lastName">Last Name</label>
                  <input type="text" id="lastName" name="lastName" placeholder="Last Name">
              </div>
          </div>
          <div class="field email">
            <label for="email">Email Address</label>
            <input type="text" id="email" name="email" placeholder="Enter your email Address">
          </div>
          <div class="field password">
              <label for="password">Password</label>
              <input type="password" id="password" name="password" placeholder="Enter new Password">
              
          </div> 
          <div class="field confirm_password">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
            
          </div>
          <div class="field button_submit">
            <input type="submit" value="Register">
          </div>
        </form>
        <div class="link">Already signed up? <a href="login.php">Login now</a></div>
        <?php 
            if(!empty($error)){ 
                echo "<div class='error-txt'> $error </div>";
            }
        ?>
      </section>
    </div>
    <script src="js/eye_show_hide.js"></script>
  </body>
</html>

