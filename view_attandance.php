


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <style>
        h1{
            text-align: center;
        }
    </style>
</head>
<body>
    <form action="view_attandance.php">
    
    
    <div><h1>View Page</h1></div>
    
</body>
</html>


<table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Attandance Id</th>
                <th>ID</th>
                <th>Email</th>
                <th>Leave</th>
                <th>Date</th>
                <th>From time</th>
                <th>To time</th>
            </tr>
        </thead>
    

<tbody>

<?php 

include "db.php";
session_start();

$query = "SELECT * FROM attandance WHERE email='{$_SESSION['email']}';";
$result = mysqli_query($connection,$query);

$row = mysqli_fetch_assoc($result);
   
    
    echo "<tr>";
    foreach($row as $r){
        echo "<td>{$r}</td>";
    }
    echo "</tr>";
   
?>
</tbody>
</table>


<div>
<a class="btn btn-outline-primary" href="attandance.php" role="button">Back</a><br><br>
<a class="btn btn-outline-secondary" href="dashboard.php" role="button">Dashboard</a><br><br>
</div>