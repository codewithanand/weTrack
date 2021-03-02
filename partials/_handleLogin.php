<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        include "_dbConnect.php";

        $email = $_POST['loginEmail'];
        $pass = $_POST['loginPassword'];
        
        $sql = "SELECT * FROM register WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);

        if($num == 1){
          while($row = mysqli_fetch_assoc($result)){
            if(password_verify($pass , $row['password'])){
              session_start();
              $_SESSION['loggedin'] = true;
              $_SESSION['username'] = $email;
              // echo $_SESSION['loggedin'];
              header("location: /home-regulance/index.php?loginsuccess=true");
            }
            else{
              echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error!</strong> Invalid password.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            }
          }  
        }
        else{
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error!</strong> Invalid email address.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }
    }
?>