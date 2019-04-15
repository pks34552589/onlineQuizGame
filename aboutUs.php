<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>About us :: QuizWizz</title>
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
                        <div class="ml-5 col-md-8">
                            <h4 class="main-title-w3layouts mb-2">ABOUT US</h4>
                            <p class="paragraph-agileits-w3layouts">
                            Quriosity is an online competition presented by weblibox, made to test the thinking abilities, 
                            logical competence, creativity and writing skills of a student. It is for the students
                             of class 6th to 12th to showcase their talent and emerge as the next-gen thinkers of
                             our society.
                            </p>
                            <ol class="paragraph-agileits-w3layouts" style="list-style-type:disc;">
                                <li>The competition is online and you can attempt it from anywhere using desktop or mobile phones.</li>
                                <li>Quriosity will be conducted in three levels, each level containing different types of questions.</li>
                                <li>To reach the next level you must qualify the previous level.</li>
                                <li>After qualifying one level, you will be notified via message or e-mail and you will be eligible to attempt the next level.</li>
                                <li>Final results will be announced in either last week of Feb or in the first week of March.</li>
                            </ol>
                        </div>
                        <br/>
                        <!-- <div class="mt-5 col-md-8 offset-md-4">
                            <h4 class="main-title-w3layouts mb-2">Why QuizWizz ?</h4>
                            <p class="paragraph-agileits-w3layouts">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                                when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                It has survived not only five centuries, but also the leap into electronic typesetting, 
                                remaining essentially unchanged. 
                                It was popularised in the 1960s with the release of Letraset sheets containing 
                                Lorem Ipsum passages, and more recently with desktop publishing software 
                                like Aldus PageMaker including versions of Lorem Ipsum.
                            </p>
                        </div>
                        <br/> -->
                        <div class="mt-5 ml-5 col-md-8">
                            <h4 class="main-title-w3layouts mb-2">PRIZES</h4>
                            <ol class="paragraph-agileits-w3layouts" style="list-style-type:disc;">
                                <li>Prizes worth Rs 25,000/-</li>
                                <li>There will be three prizes for the winners in each class from 6th to 12th.</li>
                                <li>Participation certificates will be given to all the participants.</li>
                            </ol>
                        </div>
                        <div class="mt-3 col-md-3 offset-md-9">
                            <a href="level1.php" class="btn btn-success error-w3l-btn mt-sm-5 mt-3 px-4">Go to level 1</a>
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