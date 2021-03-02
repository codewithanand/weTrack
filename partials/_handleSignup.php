<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $err = '';
        include "_dbConnect.php";

        $uname = $_POST['uname'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $dob = $_POST['dob'];
        $email = $_POST['signupEmail'];
        $pass = $_POST['signupPassword'];
        $cpass = $_POST['signupCPassword'];

        $exists = "SELECT * FROM register WHERE uname = '$uname' OR email = '$email'";
        $result = mysqli_query($conn, $exists);
        $numExistsRows = mysqli_num_rows($result);

        if ($numExistsRows > 0) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Username or email already exists.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        } 
        else {
            if ($pass == $cpass) {
                $hash = password_hash($pass, PASSWORD_DEFAULT);
                $sql = "INSERT INTO `register` (`uname`, `fname`, `lname`, `email`, `password`, `dob`, `doj`) VALUES ('$fname', '$fname', '$lname', '$email', '$hash', '$dob', current_timestamp());";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> You can now log in.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                    header("location: /home-regulance/index.php?signupsuccess=true");
                } 
                else {
                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Fill the credentials carefully. ' . mysqli_error($conn) . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
            } 
            else {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Password did not match.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
        }
    }
?>