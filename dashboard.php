<?php session_start();
include "db.php"; ?>



<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<style>
    .button-container {
  display: flex;
  justify-content: space-between;
}

.button-container button {
  margin-right: 10px;
}

</style>

</head>
<body>
    <h1 class="text-center">Dashboard</h1>
    <hr>


    <table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>FirstName</th>
            <th>MiddleName</th>
            <th>LastName</th>
            <th>Address</th>
            <th>Email</th>
            <th>Password</th>
            <th>Number</th>
            <th>Id</th>
            <th>Gender</th>
            <th>Department</th>
        </tr>
    </thead>

        <tbody>



<?php 

include "db.php";


$query = "SELECT * FROM employee WHERE id='{$_SESSION['id']}';";
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

    <div class="button-container">

    <!-- <button class="btn btn-danger"type="button" onclick="javascript:window.location='http://localhost:5000/test/form.php';" ></button> -->
    
    <a class="btn btn-success" href="attandance.php" role="button">Attandance</a><br><br>
    <a class="btn btn-info" href="update.php" role="button">Update</a><br><br>
    <a class="btn btn-danger" href="form.php" role="button">Sign Out</a><br><br>
    
    </div>
</body>
</html>
