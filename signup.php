<?php
session_start();

$message="";
if(isset($_POST['register'])) {

    include("./shared/dbConnect.php");

    $name = check($_POST['name']);
    $mobile = check($_POST['mobile']);
    $email = check($_POST['email']);
    $school = check($_POST['school']);
    $class = check($_POST['class']);
    $state = check($_POST['state']);
    $city = check($_POST['city']); 
    if(isset($_POST['agree'])) {
        $agree = true;
    }else {
        $agree = false;
    }

    $nameOk = preg_match("/^[a-zA-Z]*$/",$name) ? true : false;
    $mobileOk = strlen($mobile) == 10 ? true : false;
    $emailOk = filter_var($email,FILTER_VALIDATE_EMAIL) ? true : false;
    if(!$nameOk) {
        $message = "Name should only contain characters";
    }else if(!$mobileOk) {
        $message = "Mobile number must contain 10 digits";
    }else if(!$emailOk) {
        $message = "Invalid email format";
    }if(!$agree) {
        $message = "You must agree to our terms and policy";
    }else {
        $sql = "SELECT * FROM users WHERE mobile='$mobile' AND email='$email'";
        $result = mysqli_query($con,$sql);
        $num = mysqli_num_rows($result);
        if($num > 0) {
            $message = "User Already Exists";
        }else {
            $sql = "INSERT INTO users(name,mobile,email,school,class,state,city) VALUES('$name','$mobile','$email','$school',$class,'$state','$city')";
            $result = mysqli_query($con,$sql);
            $_SESSION['mobile'] = $mobile;
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $name;
            $_SESSION['class'] = $class;
            header('location:setPassword.php');
            die();
        }
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
            <h2 class="main-title-w3layouts mb-2 text-center text-white">Register</h2>
            <!--// main-heading -->
            <div class="form-body-w3-agile text-center w-lg-50 w-sm-75 w-100 mx-auto mt-5">
                <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                    <div class="form-group">
                        <label class="text-danger"><?php echo $message;?></label>
                    </div>
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" class="form-control" placeholder="Enter full name" name="name" required="" />
                    </div>
                    <div class="form-group">
                        <label>Mobile Number</label>
                        <input type="tel" class="form-control" placeholder="Enter mobile number" name="mobile" required="" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="Enter email" name="email" required="" />
                    </div>
                    <div class="form-group">
                        <label>School Name</label>
                        <input type="text" class="form-control" placeholder="Enter school name" name="school" required="" />
                    </div>
                    <div class="form-group">
                        <label>Class</label>
                        <select class="custom-select" name="class" style="text-align-last:center;">
                            <option value="6" selected>Class 6</option>
                            <option value="7">Class 7</option>
                            <option value="8">Class 8</option>
                            <option value="9">Class 9</option>
                            <option value="10">Class 10</option>
                            <option value="11">Class 11</option>
                            <option value="12">Class 12</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" placeholder="Enter city" name="city" required="" />
                    </div>
                    <div class="form-group">
                        <label>State</label>
                        <input type="text" class="form-control" placeholder="Enter State" name="state" required="" />
                    </div>
                    <div class="form-check text-center">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="agree"/>
                        <label class="form-check-label" for="exampleCheck1">Agree the terms and policy</label>
                    </div>
                    <button type="submit" class="btn btn-success error-w3l-btn mt-sm-5 mt-3 px-4" name="register">Submit</button>
                </form>
                <p class="paragraph-agileits-w3layouts mt-3">Already have account?
                    <a href="login.php">Login</a>
                </p>
                <h1 class="paragraph-agileits-w3layouts mt-2">
                    <a href="index.php">Back to Home</a>
                </h1>
            </div>

            <?php include("./shared/copyright.php");?>

        </div>
    </div>

    <?php include("./shared/scripts.php");?>

</body>

</html>