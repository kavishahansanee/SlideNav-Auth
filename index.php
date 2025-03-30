<?php
session_start();
include("config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css"/>
    <title>Sign in & Sign up Form</title>
</head>
<body>
<div class="container">
    <div class="forms-container">
        <div class="signin-signup">

            <!-- Login process -->
            <?php
            if (isset($_POST['login'])) {
                $email = mysqli_real_escape_string($con, $_POST['email']);
                $password_1 = mysqli_real_escape_string($con, $_POST['password_1']);

                $result = mysqli_query($con, "SELECT * FROM users WHERE Email='$email'") or die("Select Error");
                $row = mysqli_fetch_assoc($result);

                if (is_array($row) && !empty($row)) {
                    // Verify the entered password with the stored hashed password
                    if (password_verify($password_1, $row['Password'])) {
                        $_SESSION['valid'] = $row['Email'];
                        $_SESSION['username'] = $row['Username'];
                        $_SESSION['age'] = $row['Age'];
                        $_SESSION['id'] = $row['Id'];
                        /*CREATE TABLE users(
                             Id int PRIMARY KEY AUTO_INCREMENT,
                             Username varchar(200),
                             Email varchar(200),
                             Age int,
                             Password varchar(200)
                         ); 
                         ALTER TABLE users
                         ADD COLUMN image VARCHAR(100) NOT NULL;

                        ALTER TABLE users
                        ADD COLUMN Pregnant ENUM('yes', 'no') NOT NULL,
                        ADD COLUMN Agree TINYINT(1) NOT NULL;

                         */
                    } else {
                        echo "<div class='message'>
                              <p>Wrong Username or Password</p>
                            </div> <br>";
                        echo "<a href='index.php'><button class='btn'>Go Back</button>";
                    }
                } else {
                    echo "<div class='message'>
                          <p>Wrong Username or Password</p>
                        </div> <br>";
                    echo "<a href='index.php'><button class='btn'>Go Back</button>";
                }

                if (isset($_SESSION['valid'])) {
                    header("Location: profile.php");
                }
            } elseif (isset($_POST['register'])) {
                // Registration process
                $username = $_POST['username'];
                $email = $_POST['email'];
                $age = $_POST['age'];
                $password_1 = password_hash($_POST['password_1'], PASSWORD_BCRYPT); // Hash the password using Bcrypt
                $password_2 = $_POST['password_2'];
                $pregnant = $_POST['pregnant'];
                $agree = isset($_POST['agree']) ? 1 : 0;

                // Verifying the unique email
                $verify_query = mysqli_query($con, "SELECT Email FROM users WHERE Email='$email'");

                if (mysqli_num_rows($verify_query) != 0) {
                    echo "<div class='message'>
                              <p>This email is used, Try another One Please!</p>
                          </div>";
                          echo "<a href='index.php'><button class='btn'>Go Back</button>";

                } elseif (!password_verify($password_2, $password_1)) {
                    echo "<div class='message'>
                             <p>The two passwords do not match</p> 
                          </div> <br>";
                    echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
                } else {
                    mysqli_query($con, "INSERT INTO users(Username,Email,Age,Password,Pregnant,Agree) VALUES('$username','$email','$age','$password_1','$pregnant','$agree')") or die("Error Occurred");

                    echo "<div class='message'>
                              <p>Registration successfully!</p>
                          </div> <br>";
                    echo "<a href='index.php'><button class='btn'>Login Now</button>";
                }
            } else {
                ?>
                <!-- Login form -->
                <form action="" class="sign-in-form" method="post">
                    <h2 class="title">Sign in</h2>

                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="text" name="email" id="email" placeholder="Email" autocomplete="off" required>
                    </div>

                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password_1" id="password_1" placeholder="Password" autocomplete="off"
                               required>
                    </div>

                    <label for="forgotpassword"><a href="forgot-password.php">Forgot Password?</a></label>

                    <input type="submit" class="btn solid" name="login" value="Login" required/>
                    <div class="links">
                      Don't have an account? <a href="#sign-up-btn" id="sign-up-link">Sign Up Now</a>
                    </div>
                </form>

            
                <!-- Registration form -->
                <form action="index.php" class="sign-up-form" method="post">
                    <h2 class="title">Sign up</h2>

                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="username" id="username" placeholder="Username" autocomplete="off"
                               required>
                    </div>

                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="text" name="email" id="email" placeholder="Email" autocomplete="off" required>
                    </div>

                    <div class="input-field">
                        <i class="far fa-calendar"></i>
                        <input type="text" name="age" id="age" placeholder="Age" autocomplete="off" required>
                    </div>

                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password_1" id="password_1" placeholder="Password"
                               autocomplete="off" required>
                    </div>

                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password_2" id="password_2" placeholder="Confirm Password"
                               autocomplete="off" required>
                    </div>

                    <div class="input-field">
    <i class="fas fa-question"></i>
    <label for="pregnant" id="pregnantLabel">Are You Pregnant? 
        <select name="pregnant" id="pregnant" required>
            <option value="" disabled selected hidden>select here</option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select>
    </label>
</div><br>

                    
                    
                    <label for="agree" id="agreeLabel"><input type="checkbox" name="agree" id="agree" required style="width:30px">   I agree to PrenatalRelief processing my health information <br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; to provide me with the services.</label>
                 

                    <input type="submit" class="btn" name="register" value="Sign up" required/>
                      <div class="links">
                         Already a member? <a href="#sign-in-btn" id="sign-in-link">Sign In</a>
                      </div>
                </form>
                <?php
            }
            ?>
          </div>
        </div>

        <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
              ex ratione. Aliquid!
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="images/Pregnancy.png" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
              laboriosam ad deleniti.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="images/ladysetting.png" class="image" alt="" />
        </div>
      </div>
    
      <script src="js/app.js"></script>
  </body>
</html>