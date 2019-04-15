<?php
session_start();

$message="";
if($_SERVER['REQUEST_METHOD']=="POST") {

    require("./shared/dbConnect.php");

    $username = check($_POST['username']);
    $password = check($_POST['password']);
    for($i=6;$i<=12;$i++){
        $sql = "SELECT * FROM class_".$i." WHERE mobile='$username' OR email='$username'";
        $result = mysqli_query($con,$sql);
        $num = mysqli_num_rows($result);
        if($num == 0) {
            $message = "Mobile number is not registered";     // Mobile number doesn't exists
        }else {
            $row = mysqli_fetch_array($result);
            $pass = $row['password'];
            if($pass !== $password) {
                $message = "Incorrect Password";             // Incorrect Password
            }else {
                $_SESSION['mobile'] = $row['mobile'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['class'] = "class_".$i;
                header('location:aboutUs.php');
                die();
            }
        }
    }
}
function check($data) {
    $data = trim($data);                // Trim spaces 
    $data = stripslashes($data);        // Remove slashes
    $data = htmlspecialchars($data);    // Convert special chars to html entities
    return $data;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login :: QuizWizz</title>
    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    
    <?php include("./shared/headScripts.php");?>

    <!-- //Meta Tags -->

    <?php include("./shared/styleSheet.php");?>

    <?php include("./shared/webFonts.php");?>
</head>

<body>
    <div class="bg-page py-5">
        <div class="col-md-6 offset-md-3">
            <!-- main-heading -->
            <h2 class="main-title-w3layouts mb-2 text-center text-white">Login</h2>
            <!--// main-heading -->
            <div class="form-body-w3-agile text-center w-lg-50 w-sm-75 w-100 mx-auto mt-5">
                <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                    <div class="form-group">
                        <label class="text-danger"><?php echo $message;?></label>
                    </div>
                    <div class="form-group">
                        <label>Mobile Number / Email</label>
                        <input type="text" class="form-control" placeholder="Enter mobile number / Email" name="username" required="" />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Enter Password" id="password" name="password" required="" />
                    </div>
                    <div class="d-sm-flex justify-content-between">
                        <div class="form-check col-md-6 text-sm-left text-center">
                            <input type="checkbox" class="form-check-input" id="showPassword" value="off" onChange="toggleInput()"/>
                            <label class="form-check-label" for="showPassword">Show password</label>
                        </div>
                        <div class="forgot col-md-6 text-sm-right text-center">
                            <a href="forgot.php">forgot password?</a>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success error-w3l-btn mt-sm-5 mt-3 px-4" name="login">Login</button>
                </form>
                <p class="paragraph-agileits-w3layouts mt-4">Don't have an account
                    <a href="register.php">Create an account</a>
                </p>
                <h1 class="paragraph-agileits-w3layouts mt-2">
                    <a href="index.php">Back to Home</a>
                </h1>
            </div>

            <?php include("./shared/copyright.php");?>
        </div>
    </div>


    <!-- Scripts -->
   <?php include("./shared/scripts.php");?>
   <script>
       function toggleInput() {
            var showPassword = document.querySelector('#showPassword');
            var password = document.querySelector('#password');
            if(showPassword.value == "off") {
                showPassword.value = "on";
                password.setAttribute("type","text");
            }else {
                showPassword.value = "off";
                password.setAttribute("type","password");
            }
       }
    </script>

</body>

</html>