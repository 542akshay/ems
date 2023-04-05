<?php ob_start();
session_start();?>
<?php include "db.php";



if(isset($_POST['update'])){

    $id=$_SESSION['id'];
    $firstname=$_POST['first-name'];
    $middlename=$_POST['middle-name'];
    $lastname=$_POST['last-name'];
    $address=$_POST['address'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $phone=$_POST['phone'];
    $gender=$_POST['gender'];
    $department=$_POST['dropdown-menu'];

    
    $query3="SELECT * FROM employee WHERE id='$id';";
    $res3=mysqli_query($connection,$query3);
    $row1=mysqli_fetch_assoc($res3);
    
        $hashFormat="$2y$10$";
        $salt="iamjayamakshay15161718";
        $hash_and_salt=$hashFormat . $salt;
        $password=crypt($password,$hash_and_salt);
       
    
    if($password==$row1['password']){
            $query2="UPDATE employee SET first_name='{$firstname}',middle_name='{$middlename}',last_name='{$lastname}',department='{$department}',gender='{$gender}',number='{$phone}',email='{$email}',password='{$password}',address='{$address}',id='{$id}' WHERE id='{$_SESSION['id']}';";
            // echo $query2;
            $res2=mysqli_query($connection,$query2);
            // $row2=mysqli_fetch_assoc($res2);
            
            echo "Update Successful";
            header("Location:dashboard.php");
            
    }
    else echo "Invalid Password";
}
?>

<!-- <?php 

// $gender=$_POST['gender'];
// if ($gender == 'on') {
//     if ($_POST['gender'] == 'male') {
//         $gender = 'male';
//     } elseif ($_POST['gender'] == 'female') {
//         $gender = 'female';
//     } else {
//         // If neither "male" nor "female" was selected, set the gender to null or an empty string
//         $gender = "other"; // or $gender = '';
//     }
// }


?> -->











<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body >
<form action="update.php" method="post">
  
    <h1 class="text-center">Information Update</h1>
    <hr>
   
    <label for="first-name">First Name:</label>
    <input type="text" id="first-name" name="first-name" ><br><br>

    <label for="middle-name">Middle Name:</label>
    <input type="text" id="middle-name" name="middle-name"><br><br>

    <label for="last-name">Last Name:</label>
    <input type="text" id="last-name" name="last-name" ><br><br>

    <label for="dropdown-menu">Department:</label>
    <select id="dropdown-menu" name="dropdown-menu">
      <option value="dev">Developer</option>
      <option value="test">Tester</option>
      <option value="sales">sales</option>
      <option value="bd">Business Dev</option>
      <option value="hr">HR</option>
    </select><br><br>

    <label for="gender">Gender:</label><br>
                    <input type="radio" id="male" name="male"/>Male<br>
                    <input type="radio" id="female" name="female"/>Female<br>
                    <input type="radio" id="other" name="other"/>Other<br>

                <br>

    <label for="address">Address:</label>
    <input type="text" id="address" name="address" ><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" ><br><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" ><br><br>

    <label for="phone">Phone Number:</label>
    <input type="tel" id="phone" name="phone" pattern="[1-9]{1}[0-9]{9}" ><br><br>
  <br>

  
  <input class="btn btn-outline-primary" name="update" type="submit" value="Update">
  <a class="btn btn-info" href="dashboard.php" role="button">Dashboard</a><br><br>
</form>

</body>
</html>