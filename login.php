<?php 

session_start();
ini_set('display_errors', 1);
include "db.php";
include "functions.php";


if(isset($_POST['email']) && isset($_POST['password']) && strlen($_POST['email']) > 0 && strlen($_POST['password']) > 0) {

    
    
    $email=$_POST['email'];
    $password1=$_POST['password'];
    //  $phone=$_POST['number'];
    
    if($email && $password1){
    $email=mysqli_real_escape_string($connection,$email);
    $password=mysqli_real_escape_string($connection,$password1);

    $hashFormat="$2y$10$";
    $salt="iamjayamakshay15161718";
    $hash_and_salt=$hashFormat . $salt;
    $password=crypt($password,$hash_and_salt);

    // $phone=mysqli_real_escape_string($connection,$phone);
        
    $query = "SELECT * FROM employee WHERE email='$email' AND password='$password' ";
    
    $result = mysqli_query($connection,$query);
    if (isset($result->num_rows) && $result->num_rows > 0)
    {
      while($row = mysqli_fetch_assoc($result)){
        $id=$row['id'];
        $firstname=$row['first_name'];
        $middlename=$row['middle_name'];
        $lastname=$row['last_name'];
        $number=$row['number'];
        $email=$row['email'];
        $password1=$row['password'];
        $address=$row['address'];
        $gender=$row['gender'];
        $department=$row['department'];
        
        
    }
    if($password1===$password){

        $_SESSION['id']=$id;
        $_SESSION['firstname']=$firstname;
        $_SESSION['middlename']=$middlename;
        $_SESSION['lastname']=$lastname;
        
        
        $_SESSION['number']=$number;
        $_SESSION['email']=$email;
        $_SESSION['address']=$address;
        $_SESSION['gender']=$gender;
        $_SESSION['department']=$department;
    
        header("Location:../test/dashboard.php");
        exit;
    } else
    {
        echo "Invalid User";
      
    }
    
        }
        else echo "Invalid User";
    }
    else header("Location:../test/login.php");
} 

?>





<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<style >
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}


.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>
<form action="login.php" method="post" id="myForm2">
<h2 class="text-center">Login Form</h2>


  <div class="container">
    <label for="email"><b>Username/Email</b></label>
    <input type="text" placeholder="Enter Email" id="usr" name="email" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" id="pwd" name="password" required>
        
    <button type="submit">Login</button>

  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn" onclick="javascript:window.location='http://localhost:5000/test/form.php';">Cancel</button>
  </div>

</form>

</body>
</html>
