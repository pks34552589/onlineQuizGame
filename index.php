<?php
session_start();
if(!isset($_SESSION['mobile'])) {
    header('location:login.php');                  // User is not authenticated
}
// include dbConnect
require("./shared/dbConnect.php");
// Variables
$mobile=$_SESSION['mobile'];
$class=$_SESSION['class'];

// Retrieve Score
$sql="SELECT * FROM ".$class."_results WHERE mobile='$mobile'";
$result=mysqli_query($con,$sql);
$num=mysqli_num_rows($result);
if($num>0) {
    $row=mysqli_fetch_array($result);
    $score1=$row['l1_score'];
    $score2=$row['l2_score'];
    $score3=$row['l3_score'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard :: Weblibox</title>
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
                    <!-- Stats -->
                    <div class="outer-w3-agile col-xl">
                        <div class="stat-grid p-3 d-flex align-items-center justify-content-between bg-secondary">
                            <div class="s-l">
                                <h5>Level 1</h5>
                                <p class="paragraph-agileits-w3layouts text-white">5 min</p>
                            </div>
                            <div class="s-r">
                                <h6><?php if($score1==-1) echo "TBA";
                                else echo $score1."/20"; ?>
                                </h6>
                            </div>
                        </div>
                        <div class="stat-grid p-3 mt-3 d-flex align-items-center justify-content-between bg-secondary">
                            <div class="s-l">
                                <h5>Level 2</h5>
                                <p class="paragraph-agileits-w3layouts text-white">20 min</p>
                            </div>
                            <div class="s-r">
                                <h6><?php if($score2==-1) echo "TBA";
                                else echo $score2."/30"; ?>
                                </h6>
                            </div>
                        </div>
                        <div class="stat-grid p-3 mt-3 d-flex align-items-center justify-content-between bg-secondary">
                            <div class="s-l">
                                <h5>Level 3</h5>
                                <p class="paragraph-agileits-w3layouts text-white">30 min</p>
                            </div>
                            <div class="s-r">
                                <h6><?php if($score3==-1) echo "TBA";
                                else echo $score3; ?>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <!--// Stats -->
                    <!-- Pie-chart -->
                    <div class="outer-w3-agile col-xl ml-xl-3 mt-xl-0 mt-3">
                        <h4 class="tittle-w3-agileits mb-4 mt-5">Rank</h4>
                        <br>
                        <h1 class="tittle-w3-agileits mb-4 text-center">T.B.A.</h1>
                    </div>
                    <!--// Pie-chart -->
                </div>
            </div>
            
            <?php include("./shared/copyright.php");?>

        </div>
    </div>

   <!-- Scripts -->
   <?php include("./shared/scripts.php");?>

</body>

</html>