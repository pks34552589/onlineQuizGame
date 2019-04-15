<?php
session_start();
if(!isset($_SESSION['mobile'])) {
    header('location:login.php');                  // User is not authenticated
}
// include DBConnect
require("./shared/dbConnect.php");

// Variables
$mobile = $_SESSION['mobile'];
$class = $_SESSION['class'];
$disabled = 0;

// Setting charset 
mysqli_query($con,"SET NAMES 'utf8'");

// Disabled Option
$sql = "SELECT * FROM ".$class."_results WHERE mobile='$mobile'";
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_array($res);
if($row['l1_score'] != -1) $disabled=1;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Level 1 Rules :: QuizWizz</title>
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
    <div class="wrapper" id="wrapper">
        
        <?php include("./shared/sidenav.php");?>

        <!-- Page Content Holder -->
        <div id="content">
            
            <?php include("./shared/topNav.php");?>

            <div class="container-fluid">
            <?php if($disabled == 1) { ?>
                <div class="row">
                    <!-- Stats -->
                    <div class="outer-w3-agile col-xl">
                        <span class="ml-5 paragraph-agileits-w3layouts" style="color:green;"><i class="fa fa-check"></i><span>
                        <span class="ml-5 paragraph-agileits-w3layouts" style="color:green;">Result will be declared soon. You will be notified via message or email when results are declared.</span>
                    </div>
                </div>
            <?php } ?>
                <div class="row mt-3">
                    <!-- Stats -->
                    <div class="outer-w3-agile col-xl">
                        <div class="col-md-10 offset-md-1">
                            <h4 class="main-title-w3layouts mb-2">QUIZ RULES:</h4>
                            <h6 class="main-title-w3layouts mb-2 mt-3">Level 1: TESTING TIMES</h6>
                            
                            <ol class="paragraph-agileits-w3layouts" style="list-style-type:disc;">
                                <li>This level will consists of 15 questions testing your briskness to think and answer.</li>
                                <li>All questions are multiple choice type.</li>
                                <li>5 minutes are allotted to attempt the level. So sit tight before attempting.
                                </li>
                                <li>After 5 minutes test will be submitted automatically. 
                                </li>
                                <li>Test once submitted cannot be attempted again.</li>
                                <li>Maximum marks allotted against each question are clearly mentioned.</li>
                                <li>After Level 1 your marks will be declared.</li>
                                <li>Qualified students will be notified via message and email to attempt the next level.</li>
                            </ol>
                        </div>
                        <div class="col-md-10 offset-md-1">
                            <h6 class="main-title-w3layouts mb-2 mt-3"> Not to Do</h6>
                            
                            <ol class="paragraph-agileits-w3layouts" style="list-style-type:disc;">
                                <li>During test you are not allowed to use following functions:
                                    <ol class="paragraph-agileits-w3layouts" style="list-style-type:circle;">
                                        <li>Press Esc key</li>
                                        <li>Open another tab</li>
                                        <li>Switch to another window</li>
                                        <li>Forcefully closing the system</li>
                                        <li>Pressing back button on mobile phones or tablet.</li>
                                    </ol>
                                </li>
                                <strong><span>Note : &nbsp;</span> Using any of these actions will result in submission of your test.</strong>
                            </ol>
                        </div>
                        <div class="col-md-10 offset-md-1">
                            <h6 class="main-title-w3layouts mb-2 mt-3">PRECAUTIONS
                            
                            <ol class="paragraph-agileits-w3layouts" style="list-style-type:disc;">
                                <li>Internet connection should be of good speed.
                                </li>
                                <li>
                                Make sure that your computer system does not looses internet connectivity while giving
                                the test
                                </li>
                            </ol>
                        </div>
                        <?php if($disabled == 0) {?>
                            <div class="mt-3 col-md-2 offset-md-10">
                                <a href="level1_start.php" class="btn btn-success error-w3l-btn mt-sm-5 mt-3 px-4">Start test</a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            
            <?php include("./shared/copyright.php");?>
        </div>
    </div>

   <!-- Scripts -->
   <?php include("./shared/scripts.php");?>

</body>

<script src="./js/levels.js"">
</script>
<script src="./ajax.js"></script>

</html>