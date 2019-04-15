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

$sql = "SELECT * FROM ".$class."_results WHERE mobile='$mobile'";
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_array($res);
if($row['l1_score']!=-1){
    header('location:index.php');
}

// Setting charset 
mysqli_query($con,"SET NAMES 'utf8'");

// Retrieving Questions on level 1
$sql = "SELECT * FROM ".$class."_questions";
$result = mysqli_query($con,$sql);
$num = mysqli_num_rows($result);

// Test Submit
if($_SERVER['REQUEST_METHOD'] == "POST") {
    $score=0;
    $answers = array();
    for($x=1;$x<=$num;$x++) {
        $ans = "";
        $answers[$x]="";
        if(!empty($_POST['customCheck'.$x])) {
            foreach($_POST['customCheck'.$x] as $check) {
                $ans .= $check.",";
            }
            $answers[$x] = $ans;
        }
    }
    $x=1;
    while($row = mysqli_fetch_array($result)) {
        if($answers[$x] === $row['correct_options']) {
            $score = $score + $row['marks'];
        }
        $x++;
    }
    $sql = "UPDATE ".$class."_results SET current_level=2,l1_score=$score WHERE mobile='$mobile'";
    $result = mysqli_query($con,$sql);
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Level 1 :: QuizWizz</title>
    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    
    <?php include("./shared/headScripts.php");?>

    <!-- //Meta Tags -->

    <?php include("./shared/styleSheet.php");?>

    <?php include("./shared/webFonts.php");?>
</head>
<body>
     <div id="test">
        <div class="outer-w3-agile col-md-8 offset-md-2" id="test-center">
        <span class="col-md-4 offset-md-8 mt-3 fixed-top"><h4 id="showtime"></h4></span>
        <form id="testform" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
        <?php 
            while($row = mysqli_fetch_array($result)) {
        ?>
            <div class="form-group">
                <h5 class="mt-3" style="display:inline-block;width:70%;"><span class="mr-1"><?php echo $row['sno'] ?> ) </span><?php echo $row['question'];?> </h5>
                <span class="" style="display:ineline-block;margin-left:10%;">Marks <?php echo $row['marks'];?></span>
                <div class="custom-control custom-checkbox mt-3">
                    <input type="checkbox" class="custom-control-input" id="customCheck1<?php echo $row['sno'];?>" name="customCheck<?php echo $row['sno'];?>[]" value="a">
                    <label class="custom-control-label" for="customCheck1<?php echo $row['sno'];?>"><?php echo $row['A']?></label>
                </div>
                <div class="custom-control custom-checkbox mt-3">
                    <input type="checkbox" class="custom-control-input" id="customCheck2<?php echo $row['sno'];?>" name="customCheck<?php echo $row['sno'];?>[]" value="b">
                    <label class="custom-control-label" for="customCheck2<?php echo $row['sno'];?>"><?php echo $row['B']?></label>
                </div>
                <div class="custom-control custom-checkbox mt-3">
                    <input type="checkbox" class="custom-control-input" id="customCheck3<?php echo $row['sno'];?>" name="customCheck<?php echo $row['sno'];?>[]" value="c">
                    <label class="custom-control-label" for="customCheck3<?php echo $row['sno'];?>"><?php echo $row['C']?></label>
                </div>
                <div class="custom-control custom-checkbox mt-3">
                    <input type="checkbox" class="custom-control-input" id="customCheck4<?php echo $row['sno'];?>" name="customCheck<?php echo $row['sno'];?>[]" value="d">
                    <label class="custom-control-label" for="customCheck4<?php echo $row['sno'];?>"><?php echo $row['D']?></label>
                </div>
            </div>
            <hr/>
            <?php } ?>
            <button type="submit" class="btn btn-success error-w3l-btn mt-sm-5 mt-3 px-4" name="submittest">Submit</button>

        </form>
        </div>
    </div>
   <!-- Scripts -->
   <?php include("./shared/scripts.php");?>

</body>

<script src="./js/levels.js">
</script>
<script src="./ajax.js"></script>
<script>
     level1Timer(301);
</script>

</html>