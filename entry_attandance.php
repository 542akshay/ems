<?php 

include "db.php";
session_start();
if(isset($_POST['submit'])){

    global $connection;
        
        
        $date=$_POST['date'];
        $email=$_SESSION['email'];
        $leaverecord=$_POST['leave_record'];
        $logintime=$_POST['login_time'];
        $logouttime=$_POST['logout_time'];
        $id=$_SESSION['id'];
        
    
        // $id=mysqli_real_escape_string($connection,$id);
        // $date=mysqli_real_escape_string($connection,$date);
        // $firstname=mysqli_real_escape_string($connection,$firstname);
        // $lastname=mysqli_real_escape_string($connection,$lastname);
        // $fromtime=mysqli_real_escape_string($connection,$fromtime);
        // $totime=mysqli_real_escape_string($connection,$totime);
        
    

        

        $query1 = "SELECT * FROM attandance WHERE id = $id AND date = '$date'";
        $result1= mysqli_query($connection, $query1);

if (mysqli_num_rows($result1) > 0) {
    // The user has already updated their attendance for the current date
    echo "You have already updated your attendance for today.";
} else {
    // The user has not updated their attendance for the current date
    // Perform the update here
    $query="INSERT INTO `attandance`(`attandance_id`, `id`, `email`, `leave_record`, `date`, `login_time`, `logout_time`) VALUES (NULL,'$id','$email','$leaverecord','$date','$logintime','$logouttime');";
        
        $result = mysqli_query($connection,$query);
        // echo $query;
        // exit;
        if(!$result){
            die('query failed' . mysqli_error($connection));
        } else{
            echo "Entry Successful";
        }
}
} 


?>




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
h1 {text-align: center;}
    </style>
</head>
<body>
    <h1>Entry Form</h1>
    <hr>
    <form action="entry_attandance.php" method="post">
    
    <?php echo $_SESSION['firstname'];
         echo $_SESSION['middlename'];
        echo $_SESSION['lastname']; ?> <br><br>

    <label for="date">Date</label>
    <input type="date" id="date" name="date" ><br><br>
    <label for="attandance">Choose Type:</label>
    <select name="leave_record" id="leave_record">
        <option value="Full day">Full day</option>
        <option value="Half day">Half day</option>
        <option value="Leave">Leave</option>
    </select><br><br>
        <label for="login_time">Login Time</label>
        <input type="time" id="login_time" name="login_time" ><br><br>
        <label for="logout_time">Logout Time</label>
        <input type="time" id="logout_time" name="logout_time" ><br><br>
        <input type="submit" name="submit" value="Enter">
        <a class="btn btn-outline-info" href="dashboard.php" role="button">Dashboard</a><br><br>
        <a class="btn btn-outline-primary" href="attandance.php" role="button">Back</a><br><br>
    </form>
</body>
</html>