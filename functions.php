<?php 

include "db.php";

function Registration(){
    global $connection;
        $firstname=$_POST['first'];
        $middlename=$_POST['Middle'];
        $lastname=$_POST['last'];
        $address=$_POST['address'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $phone=$_POST['number'];
        $gender=$_POST['gender'];
        $department=$_POST['department'];
    
        $firstname=mysqli_real_escape_string($connection,$firstname);
        $middlename=mysqli_real_escape_string($connection,$middlename);
        $lastname=mysqli_real_escape_string($connection,$lastname);
        $address=mysqli_real_escape_string($connection,$address);
        $email=mysqli_real_escape_string($connection,$email);
        $password=mysqli_real_escape_string($connection,$password);
        $phone=mysqli_real_escape_string($connection,$phone);
        $gender=mysqli_real_escape_string($connection,$gender);
        $department=mysqli_real_escape_string($connection,$department);
    
        $hashFormat="$2y$10$";
        $salt="iamjayamakshay15161718";
        $hash_and_salt=$hashFormat . $salt;
        $password=crypt($password,$hash_and_salt);
    
    
    
    
    $query = "INSERT INTO employee(first_name,middle_name,last_name,address,email,password,number,gender,department) ";
    $query .= "VALUES('$firstname','$middlename','$lastname','$address','$email','$password','$phone','$gender','$department')";
    
    $result = mysqli_query($connection,$query);
    
        if(!$result){
            die('query failed' . mysqli_error($connection));
        } else{
            return "Registration Successful";
        }
    
    }



    
?>