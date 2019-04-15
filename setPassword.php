<?php
session_start();
if(!isset($_SESSION['mobile'])) {
    header('location:login.php');                  // User is not authenticated
}
$message="";
if($_SERVER['REQUEST_METHOD']=="POST") {

    require("./shared/dbConnect.php");

    $password = check($_POST['password']);
    $confPassword = check($_POST['confPassword']);
    $mobile = $_SESSION['mobile'];
    $class = $_SESSION['class'];

    $passwordOk = strlen($password) === strlen($_POST['password']) ? true:false;
    $passwordLenOk = strlen($password) >= 8 ? true:false;
    if(!$passwordOk) {
        $message = "Password must not contain spaces, slashes and tabs";
    }else if(!$passwordLenOk) {
        $message = "Password must contain atleast 8 characters";           // Password length atleast 8 chars
    }else if($password !== $confPassword) {
        $message = "Password doesn't match";
    }else {
        $sql = "UPDATE ".$class." SET password='$password' WHERE mobile='$mobile'";
        $result = mysqli_query($con,$sql);
        header('location:aboutUs.php');
        die();
    }
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
            <h2 class="main-title-w3layouts mb-2 text-center text-white">Set Password</h2>
            <!--// main-heading -->
            <div class="form-body-w3-agile text-center w-lg-50 w-sm-75 w-100 mx-auto mt-5">
                <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                    <div class="form-group">
                        <label class="text-danger"><?php echo $message;?></label>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Enter a Password" name="password" id="password" required="" />
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" placeholder="Enter Password again" name="confPassword" required="" />
                    </div>
                    <div class="form-check col-md-6 text-sm-left text-center">
                        <input type="checkbox" class="form-check-input" id="showPassword" value="off" onChange="toggleInput()"/>
                        <label class="form-check-label" for="showPassword">Show password</label>
                    </div>
                    <button type="submit" class="btn btn-success error-w3l-btn mt-sm-5 mt-3 px-4" name="setPassword">Register</button>
                </form>
            </div>

            <?php include("./shared/copyright.php");?>

        </div>
    </div>

    <?php include("./shared/scripts.php");?>

</body>
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
</html>