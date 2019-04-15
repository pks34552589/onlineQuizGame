
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
    <div class="wrapper">
        
       <?php include("./shared/sidenav.php");?>

        <!-- Page Content Holder -->
        <div id="content">
            
            <?php include("./shared/topNav.php");?>

            <!-- main-heading -->
            <h2 class="main-title-w3layouts mb-2 text-center">404 Error Page</h2>
            <!--// main-heading -->

            <!-- Error Page Content -->
            <section class="error-page-content">

                <!-- Error Page Info -->
                <div class="outer-w3-agile mt-3">
                    <div class="container py-xl-5 py-4">
                        <div class="row justify-content-center">
                            <div class="errorleft d-xl-flex align-items-center col-xl-4">
                                <h4 class="error-title-agileits">404</h4>
                            </div>
                            <div class="error-right col-xl-8">
                                <span class="error-subtext-w3l">
                                    <i class="fas fa-exclamation-circle text-warning mr-3"></i>Oops you have encountered an error</span>
                                <p class="error-text"> It appears the page you are looking for doesn't exist. Sorry about that.</p>
                                <a class="btn btn-primary error-w3l-btn px-4" href="index.html" role="button">Go to home page</a>
                            </div>
                        </div>
                        <p class="error-text text-center mt-xl-5 mt-4">Would you like to try a search?</p>
                        <form action="#" method="post" class="form-inline error-search-form  w-xl-50 w-md-75 w-100 mx-auto">
                            <input class="form-control" type="search" placeholder="Search" aria-label="Search" required="" />
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>
                </div>
                <!--// Error Page Info -->

            </section>

            <!--// Error Page Content -->

            <?php include("./shared/copyright.php");?>
        </div>
    </div>


    <?php include("./shared/scripts.php");?>
</body>

</html>