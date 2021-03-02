<?php 
    
    include "_loginModal.php";
    include "_signupModal.php";
    include "_handleLogin.php";
    include "_handleSignup.php";

    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
        $loggedin = true;
    }
    else{
        $loggedin = false;
    }
?>
 <?php   echo '
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">weTrack</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>'; ?>
          <?php          if(!$loggedin){
                        echo '<li class="nav-item">
                                <a class="nav-link" href="form.php">New Issue</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="dashboard.php">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="partials/_logout.php">Logout</a>
                            </li>';
                    } ?>
             <?php       echo '    
                    </ul>
                    <form class="d-flex">
                        '; ?>
             <?php           if($loggedin === false){
                            echo '<button type="button" class="btn btn-outline-success ml-2" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>';
                        }
                        else{
                            echo '<button type="button" class="btn btn-outline-secondary ml-2" href="_logout.php">Logout</button>';
                        }
                        echo '<button type="button" class="btn btn-outline-success mx-2" data-bs-toggle="modal" data-bs-target="#signupModal">SignUp</button>
                    </form>
                </div>
            </div>
        </nav>
    '; 
?>