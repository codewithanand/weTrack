<?php
    require "partials/_dbConnect.php";

    if(isset($_POST['submit'])){

        $qrCode = $_POST['qrcode'];
        $subject = $_POST['subject'];
        $description = $_POST['description'];

        $file = $_FILES['file'];
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $fileExt = explode('.' , $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png', 'pdf');

        if(in_array($fileActualExt , $allowed)){
            if($fileError === 0){
                if($fileSize < 1000000){
                    $fileNameNew = uniqid('', true).'.'.$fileActualExt;
                    $fileDestination = 'uploads/'.$fileNameNew;
                    //Add $fileDestination to the database for retrieving files
                    $sql = "INSERT INTO `data` (`ID`,`SUB`,`DES`,`MEDIA`) VALUES ('$qrCode','$subject','$description','$fileDestination')";
                    $result = mysqli_query($conn, $sql);

                    if($result){
                        move_uploaded_file($fileTmpName , $fileDestination);
                        //Add redirect page link here
                        header("location: dashboard.php");
                    }
                    else{
                        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> '.mysqli_error($conn).'.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    } 
                }
                else{
                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> File size too big.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
            }
            else{
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> There was an error in uploading file.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
        }
        else{
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Error!</strong> You cannot upload file of this type.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';    
        }        
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Issue Form</title>
</head>
<body>
    <?php include "partials/_nav.php" ?>

    <div class="navbar navbar-expand-lg navbar-light bg-light">
        <h2 class="text-center">Issue Form</h2>
    </div>

    <div class="container mt-3" >
        <form action="form.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="qrcode" class="form-label">Location</label>
                <input type="text" class="form-control" id="qrcode" name="qrcode" required>
            </div>
            <div class="mb-3">
                <label for="subject" class="form-label">Subject</label>
                <input type="text" class="form-control" id="subject" name="subject" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" rows="3" name="description" required></textarea>
            </div>
            <div class="mb-3">
                <label for="file" class="form-label">File upload</label>
                <input type="file" class="form-control" id="file" name="file">
            </div>
            <button type="submit" class="btn btn-primary w-50 " name="submit">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</body>
</html>