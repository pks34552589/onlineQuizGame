<?php

// include DBConnect
include("./shared/dbConnect.php");

// Variables
$mobile = $_SESSION['mobile'];
$class = $_SESSION['class'];
$level2_disabled = 0;
$level3_disabled = 0;

// COmpleted previous levels

$sql = "SELECT * from ".$class."_results WHERE mobile='$mobile'";
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_array($res);
$current_level = $row['current_level'];
if($current_level == 1){
    $level2_disabled = 1;
    $level3_disabled = 1;
}else if($current_level == 2){
    $level3_disabled = 1;
}

?>

<!-- Sidebar Holder -->
<nav id="sidebar">
    <div class="sidebar-header">
        <h1>
            <a href="index.php">Quriosity</a>
        </h1>
        <span>Q</span>
    </div>
    <div class="profile-bg"></div>
    <ul class="list-unstyled components">
        <li class="active">
            <a href="aboutUs.php">
                <i class="far fa-map"></i>
                About Us
            </a>
        </li>
        <li>
            <a href="index.php">
                <i class="fas fa-th-large"></i>
                Dashboard
            </a>
        </li>
        <li>
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">
                <i class="fas fa-laptop"></i>
                Levels
                <i class="fas fa-angle-down fa-pull-right"></i>
            </a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="level1.php">Level 1</a>
                </li>
                <?php if($level2_disabled == 0) { ?>
                    <li>
                        <a href="#">Level 2</a>
                    </li>
                <?php } ?>
                <?php if($level3_disabled == 0) { ?>
                    <li>
                        <a href="#">Level 3</a>
                    </li>
                <?php } ?>
            </ul>
        </li>
        <li>
            <a href="contactUs.php">
                <i class="far fa-envelope"></i>
                Contact Us
            </a>
        </li>
    </ul>
</nav>