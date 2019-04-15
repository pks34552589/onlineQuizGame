<?php
session_start();
if(!isset($_SESSION['mobile'])) {
    header('location:login.php');                  // User is not authenticated
}

// include DBConnect
require("./shared/dbConnect.php");

// Variables
$mobile = $_SESSION['mobile'];
$disabled = 0;
$class = $_SESSION['class'];

// Completed previous levels
$sql = "SELECT * FROM records WHERE mobile='$mobile'";
$result = mysqli_query($con,$sql);
$num = mysqli_num_rows($result);
if($num < 0) header('location:index.php');

// Retrieving questions of level 2
$sql = "SELECT * FROM class2_".$class;
$result = mysqli_query($con,$sql);
$num = mysqli_num_rows($result);

//  Test Submit
if($_SERVER['REQUEST_METHOD']=="POST") {
    $str = "";
    for($x=1;$x<=$num;$x++) {
        $answer = $_POST['answer'.$x];
        $str .= ",";
        $str .= "'";
        $str .= $answer;
        $str .= "'";
    }
    $sql = "INSERT INTO level2 VALUES('$mobile'".$str.")";
    $result = mysqli_query($con,$sql);
    $sql = "UPDATE records SET level2=-1 WHERE mobile='$mobile'";
    $result = mysqli_query($con,$sql);
}

// Disabled Option
$sql = "SELECT * from records WHERE mobile='$mobile'";
$res = mysqli_query($con,$sql);
$num = mysqli_num_rows($res);
if($num > 0) {
    $row = mysqli_fetch_array($res);
    if($row['level2']!=NULL) $disabled = 1;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Level 2 Rules :: QuizWizz</title>
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
            <?php if($disabled==1) { ?>
                <div class="row">
                    <!-- Stats -->
                    <div class="outer-w3-agile col-xl">
                        <span class="ml-5"><i class="fa fa-check"></i><span>
                        <span class="ml-5"> You Completed the level 2 , You rank will be displayed soon .</span>
                    </div>
                </div>
            <?php } ?>
                <div class="row mt-3">
                    <!-- Stats -->
                    <div class="outer-w3-agile col-xl">
                        <div class="ml-5 col-md-10 offfset-md-1">
                            <h4 class="main-title-w3layouts mb-2">Rules</h4>
                            <ul class="paragraph-agileits-w3layouts">
                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                <li>
                                <li>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                                when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                </li>
                                <li>It has survived not only five centuries, but also the leap into electronic typesetting, 
                                remaining essentially unchanged. 
                                </li>
                                <li>
                                It was popularised in the 1960s with the release of Letraset sheets containing 
                                Lorem Ipsum passages, and more recently with desktop publishing software 
                                like Aldus PageMaker including versions of Lorem Ipsum.
                                </li>
                            </ul>
                        </div>
                        <?php if($disabled == 0) {?>
                            <div class="mt-3 col-md-2 offset-md-10">
                                <button type="submit" class="btn btn-success error-w3l-btn mt-sm-5 mt-3 px-4" onclick="openFullscreen()">Start test</button>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            
            <?php include("./shared/copyright.php");?>

        </div>
    </div>
    <div id="test">
            <div class="outer-w3-agile col-md-8 offset-md-2" id="test-center">
            <span class="col-md-4 offset-md-8 mb-1"><h4 id="showtime"></h4></span>
                <form id="testform" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                <?php 
                   $num = mysqli_num_rows($result);
                    while($row = mysqli_fetch_array($result)) {
                ?>
                    <div class="form-group">
                        <h4 class="mt-3"><span class="mr-1"><?php echo $row['sno'] ?> ) </span><?php echo $row['question'];?> </h4>
                        <div class="form-group">
                            <label for="comment">Answer:</label>
                            <textarea class="form-control" rows="5" id="comment" name="answer<?php echo $row['sno'];?>"></textarea>
                        </div>
                    </div>
                <?php } ?>
                <button type="submit" class="btn btn-success error-w3l-btn mt-sm-5 mt-3 px-4" name="submittest">Submit</button>

                </form>
            <div>
        </div>
    </div>

   <!-- Scripts -->
   <?php include("./shared/scripts.php");?>

</body>
<script src="./js/levels.js"">
</script>

</html>