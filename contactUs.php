<?php
session_start();
if(!isset($_SESSION['mobile'])) {
    header('location:login.php');                  // User is not authenticated
}
// include dbConnect
require("./shared/dbConnect.php");

// Variables
$mobile = $_SESSION['mobile'];
$message = "";

if($_SERVER['REQUEST_METHOD']=="POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    date_default_timezone_set("Asia/Kolkata");
    $date = date("Y-m-d h:i:s");
    
    $sql = "INSERT INTO contact VALUES('$mobile','$email','$name','$subject','$message','$date')";
    $result = mysqli_query($con,$sql);
    $message = "Your query has been sent successfully . We will contact you with your query.";
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
    <title>Contact us :: Weblibox</title>
    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    
    <?php include("./shared/headScripts.php");?>

    <!-- //Meta Tags -->

    <?php include("./shared/styleSheet.php");?>

    <?php include("./shared/webFonts.php");?>
</head>

<body>
    <div class="se-pre-con"></div>
    <div class="wrapper">
        
        <?php include("./shared/sidenav.php");?>

        <!-- Page Content Holder -->
        <div id="content">
            
            <?php include("./shared/topNav.php");?>

            <div class="container-fluid">
                <div class="row">
                    <!-- Content -->
                    <div class="outer-w3-agile col-xl">
                    <p class="paragraph-agileits-w3layouts" style="color:green;"><?php echo $message;?></p>
                    <div class="col-md-5">
                        <div class="form-area">  
                            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                            <br style="clear:both">
                                        <h3 style="margin-bottom: 25px; text-align: center;">Contact Us</h3>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
                                        </div>
                                        <div class="form-group">
                                        <textarea class="form-control" type="textarea" id="message" name="message" placeholder="Message" maxlength="140" rows="7"></textarea>
                                        </div>
                                        <div class="form-group">
                                        <button type="submit" id="submit" name="sendbtn" class="btn btn-primary pull-right">Send</button>
                                        </div>
                                    </form>
                        </div>
                    </div>
                    </div>
                    <!-- /Content -->
                </div>
            </div>
            
            <?php include("./shared/copyright.php");?>
            
        </div>
    </div>

   <!-- Scripts -->
   <?php include("./shared/scripts.php");?>

</body>

</html>