<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Dashboard</title>
</head>
<body>

    <?php include "partials/_nav.php" ?>
    <?php require "partials/_dbConnect.php" ?>

    <div class="navbar navbar-expand-lg navbar-light bg-light">
        <h2 class="text-center">Dashboard</h2>
    </div>

    <div class="container my-4">
        <div class="row my-4">
            <?php

                $sql = "SELECT * FROM `data`";
                $result = mysqli_query($conn, $sql);

                while($row = mysqli_fetch_assoc($result)){

                    $iD = $row['ID'];
                    $sub = $row['SUB'];
                    $des = $row['DES'];
                    $med = $row['MEDIA'];
                    
                    echo'
                        <div class="col-md-4 mb-4">
                            <div class="card" style="width: 18rem;">
                                <img src='.$med.' class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">'.$iD.'</h5>
                                    <h4 class="card-title">'.$sub.'</h4>
                                    <p class="card-text">'.$des.'</p>
                                    <a href="#" class="btn btn-primary">Edit</a>
                                </div>
                            </div>
                        </div>
                    ';

                }

            ?>

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>