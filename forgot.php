<?php

// include dbConnect
require("./shared/dbConnect.php");

// Variables
$message="";

// Sending Confirmation link
if($_SERVER['REQUEST_METHOD']=="POST") {
    $email = check($_POST['email']);
    $sql = "SELECT * FROM users WHERE email='$email'";
    $res = mysqli_query($con,$sql);
    $num = mysqli_num_rows($res);
    if($num > 0) {
        // the message
        $msg = "Click on the below link to reset your account password .";

        // use wordwrap() if lines are longer than 70 characters
        $msg = wordwrap($msg,70);

        // send email
        mail($email,"Reset Password",$msg);
        $message = "Confirmation link has been sent to your Email id";
    }else $message = "Email has not been registered";
}
function check($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Quiz Game :: Weblibox</title>
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
            <h2 class="main-title-w3layouts mb-2 text-center text-white">Reset Password</h2>
            <!--// main-heading -->
            <div class="form-body-w3-agile text-center w-lg-50 w-sm-75 w-100 mx-auto mt-5">
                <p class="paragraph-agileits-w3layouts" style="color:#FF6600;"><?php echo $message;?></p>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                    <div class="form-group">
                        <label>Email address</label>
                        <input type="email" class="form-control" placeholder="Enter email" required="" name="email"/>
                    </div>
                    <button type="submit" class="btn btn-success error-w3l-btn mt-3 px-4">Reset Password</button>
                </form>
                <h1 class="paragraph-agileits-w3layouts mt-4">
                    <a href="login.php">Back to Login</a>
                </h1>
            </div>

            <?php include("./shared/copyright.php");?>

        </div>
    </div>


     <!-- Scripts -->
   <?php include("./shared/scripts.php");?>

</body>

</html>