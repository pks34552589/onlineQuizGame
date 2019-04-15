<!-- top-bar -->
<nav class="navbar navbar-default mb-xl-5 mb-4">
    <div class="container-fluid">

        <div class="navbar-header">
            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        <ul class="top-icons-agileits-w3layouts float-right">
            
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="far fa-user"></i>
                </a>
                <div class="dropdown-menu drop-3">
                    <div class="profile d-flex mr-o">
                        <div class="profile-l align-self-center">
                            <img src="images/profile.jpg" class="img-fluid mb-3" alt="Responsive image">
                        </div>
                        <div class="profile-r align-self-center">
                            <h3 class="sub-title-w3-agileits"><?php echo $_SESSION['name'];?></h3>
                            <a href="mailto:rishikesh@gmail.com"><?php echo $_SESSION['email'];?></a>
                        </div>
                    </div>
                    <a href="index.php" class="dropdown-item mt-3">
                        <h4>
                            <i class="far fa-user mr-3"></i>My Profile</h4>
                    </a>
                    <a href="contactUs.php" class="dropdown-item mt-3">
                        <h4>
                            <i class="far fa-question-circle mr-3"></i>Faq</h4>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
<!--// top-bar -->