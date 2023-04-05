
<?php 

include "db.php";
include "functions.php";
if(isset($_POST['submit'])){
Registration();
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>





<script>

$(document).ready(function(){

    //this is the validation part for the phone number 
    $("#number").on("input",function(){
        var mobile = $(this).val();
        var pattern = /^[1-9]{1}[0-9]{9}$/;
        if(pattern.test(mobile)){
            $("#error1").text("");
        } else {
            $("#error1").text("You have to enter the valid phone details");
        }
    });

    //this is the validation part for email
    $("#email").on("input",function(){
        var gmail = $(this).val();
        var pattern1 = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/;
        if(pattern1.test(gmail)){
            $("#error2").text("");
        } else {
            $("#error2").text("You have to enter the valid email details");
        }
    });

    //this is the validation part for first name
    $("#first").on("input", function() {
          var firstName = /^[a-zA-Z]+$/;
          if(!firstName.test($(this).val())) {
            
            $("#first-error").text("Invalid first name").show();
          }
          else {
            $("#first-error").hide();
          }
    });

    //this is the validation part for password
    $("#password").on("input",function(){
        var pwd = $(this).val();
        var pattern2 = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
        if(pattern2.test(pwd)){
            $("#error3").text("");
        } else {
            $("#error3").text("Password must contain min 8 characters including 1 number,lower,upper,special case letters");
        }
    });   
    
    
    $("#myForm1").submit((event) => {

        //  Post method Implementation for inserting data.

        event.preventDefault();                // prevent default form submission behavior
        $.post("insert.php",
        {
            
            first: $("#first").val(),
            Middle: $("#middle").val(),
            last: $("#last").val(),
            department: $("#department").val(),
            gender: $("#gender").val(),
            address: $("#address").val(),
            email: $("#email").val(),
            password: $("#password").val(),
            phone: $("#number").val(),
        },
        function(data){
            alert(data) ;
            if(data==="Registration Successful"){
            window.location.href = "login.php";
        }else {
            window.location.href = "login.php";
        }
        });
      });

    $("#myForm2").submit((e) => {
        e.preventDefault();
        $.post("login.php",{
        username:$("#usr").val(),
        password:$("#pwd").val()
      },(data) =>{
        alert(data);
        if(data === ""){
          window.location.href = "dashboard.php";
        }else {
          window.location.href = "login.php";
        }
      })
      });
 

});

</script>  
</head>








<body style="background-color:deepskyblue">
    <div class="container">

        <div class="col-md-6"><br>
        <h1 class="text-center" style="color:darkred">Employee Registration</h1>
            <hr>
            <form action="form.php" method="post" id="myForm1">

                <div class="form-group"><br>
                <label for="username">Employee ID (optional)</label>
                    <input type="text" name="id" id="empid" class="form-control">
                <label for="username">First Name</label>
                    <input type="text" name="first" id="first" class="form-control" required>
                    <span id = "first-error"></span><br>
                <label for="username">Middle Name</label>
                    <input type="text" name="Middle" id="middle" class="form-control">
                <label for="username">Last Name</label>
                    <input type="text" name="last" id="last" class="form-control" required>
                </div><br>

                <label>Department:</label>
                <select name="department" id="department" required>
                    <option value="developer">Devoloper</option>
                    <option value="tester">Tester</option>
                    <option value="sales">Sales</option>
                    <option value="bd">Business Dev</option>
                    <option value="hr">HR</option>
                </select>
                <br>
                <br>

                <label for="gender" id="gender">Gender:</label><br>
                    <input type="radio" id="male" name="male"/>Male<br>
                    <input type="radio" id="female" name="female"/>Female<br>
                    <input type="radio" id="other" name="other"/>Other<br>

                <br>

                <label for="address">Address:</label><br>
                    <textarea name="address" id="address" cols="60" rows="10" required></textarea>
                    <!-- <input type="text" name="address" class="form-control" cols="30" rows="5"><br> -->
                    <br>

                    <div class="form-group"><br>
                <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter your email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control" required><br>
                </div>
                <br>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="create your password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" class="form-control" required> <br>  
                </div>

                <div class="form-group"><br>
                    <label for="number">Phone number</label>
                    <input type="text" name="number" id="number" placeholder="Enter your phone number" class="form-control" pattern="[1-9]{1}[0-9]{9}" title="error message" required><br>
                </div>
                <div id="error1"></div>
                <div id="error2"></div>
                <div id="error3"></div>
                    <?php 
                    
                    
                    ?>

                    <input class="btn btn-primary" type="submit" name="submit" value="Register">
                    <button type="button" class="btn btn-secondary" onclick="javascript:window.location='http://localhost:5000/test/login.php';">Login</button>
            </form>

        </div>   

    </div>
</body>
</html>




