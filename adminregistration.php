<?php

$organization = $_POST['organization'];
$type = $_POST['type'];
$first_name = $_POST['first_name'];
$username = $_POST['username'];
$password = $_POST['cpassword'];
$email = $_POST['email'];
$gender= $_POST['gender'];
$phone = $_POST['phone'];  
$i = time().'_'.$_FILES['files']['name'];

if (!empty($company) ||!empty($type) || !empty($first_name) || !empty($username) || !empty($password) || !empty($gender) || !empty($email) || !empty($phone)) 
{
    $host = "localhost:3308";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "voluntaria";
    $target = 'admin pictures/'. $i;
    

    //create connection

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) 
    {
        die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } 

    else 
    {
        /*$echeck="select email from admin where email=".$_POST['email'];
        $echk=mysqli_query($conn,$echeck);
        $ecount=mysqli_num_rows($echk);

        $echeck1="select phone from admin where phone=".$_POST['phone'];
        $echk1=mysqli_query($conn,$echeck1);
        $ecount1=mysqli_num_rows($echk1);
        
        if($ecount!=0)
        {
            echo "Email already exists";
        }
        if($ecount1!=0)
        {
            echo "Phone Number already exists";
        }
        else
        {*/
            move_uploaded_file($_FILES['files']['tmp_name'],$target);
            $sql="INSERT Into admin(organization_name,organization_type,admin_name, gender, username, pass,phone,email,image) 
            values('$organization', '$type', '$first_name', '$gender', '$username', '$password', '$phone', '$email','$target')";

            if ($conn->query($sql)) 
            {
                //echo $target;
                echo $image;
                echo $target;
                echo "New Data Inserted";
                //header("Location:adminlogin.html");
            } 
            else
            {
                echo "Error: ". $sql ." ". $conn->error;
                echo "<script>alert('Invalid login details');</script>";
            }
            $conn->close();
        }
} 

else 
{
    echo "All field are required";
    die();
}
?>

 

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registration Form</title>


    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">


    <link href="css/reg1.css" rel="stylesheet" media="all">
    <style>
        .cb {
            height: 40px;
            width: 40px;
            align-items: left;
            margin-left: 30px;
            margin-right: 40px;
        }
        
        h3 {
            margin-bottom: 30px;
            color: #fff;
        }
        
        p {
            color: red;
        }
    </style>
</head>

<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Administrator Registration Form</h2>
                </div>
                <div class="card-body">
                    <form action="adminregistration.php" method="POST" name="form1">
                        <div class="form-row">
                            <div class="name">Organisation </div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="organization" placeholder="Organisation Name">

                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Organisation Type</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="type">
                                                        <option disabled="disabled" selected="selected">Choose option</option>
                                                        <option name="type">NGO</option>
                                                        <option name="type">School</option>
                                                        <option name="type">University</option>
                                                    </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3 align=center>Admin Details</h3>
                        <div class="form-row m-b-55">
                            <div class="name">Name</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="first_name" placeholder="First Name" id="a" onblur="allLetter(document.form1.first_name)">
                                            <p id="error" style="display:none"></p>
                                        </div>
                                    </div>
                                    <script type="text/javascript">
                                        function allLetter(inputtxt) {
                                            var p = document.getElementById("error");
                                            var letters = /^[A-Za-z]+$/;
                                            if (inputtxt.value.match(letters)) {
                                                p.style = "display:none";
                                                return true;
                                            } else {
                                                p.innerHTML = "Please Enter Only Alphabets!";
                                                p.style = "display:inline";
                                                return false;
                                            }
                                        }
                                    </script>

                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="last_name" placeholder="Last Name" onblur="isletter(document.form1.last_name)">

                                            <p id="err" style="display:none"></p>
                                        </div>
                                    </div>
                                    <script type="text/javascript">
                                        function isletter(inputtxt) {
                                            var p = document.getElementById("err");
                                            var letters = /^[A-Za-z]+$/;
                                            if (inputtxt.value.match(letters)) {
                                                p.style = "display:none";
                                                return true;
                                            } else {
                                                p.innerHTML = "Please Enter Only Alphabets!";
                                                p.style = "display:inline";
                                                return false;
                                            }
                                        }
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="form-row-1">
                            <div class="name">Gender</div>
                            <div class="value">
                                <label class="radio-container m-r-55">Male
                                    <input type="radio" checked="checked" name="gender" value="m">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container">Female
                                    <input type="radio" name="gender" value="f">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container">Others
                                    <input type="radio" name="gender" value="o">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name"> Username</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="username">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Password</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="password" name="password" id="pass">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name"> Confirm</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="password" name="cpassword" placeholder="Type your password again" id="cp" onblur="return val()">
                                    <p id="error1" style="display:none"></p>
                                </div>
                            </div>
                        </div>

                        <script type="text/javascript">
                            function val() {

                                var password1 = document.getElementById("pass").value;
                                var password2 = document.getElementById("cp").value;
                                var p = document.getElementById("error1");
                                var letters = /^[A-Za-z]+$/;
                                if (password1 == password2) {
                                    p.style = "display:none";
                                    return true;
                                } else {
                                    p.innerHTML = "Password and Confirm Password Fields Do Not Match!!";
                                    p.style = "display:inline";


                                    return false;
                                }
                            }
                        </script>
                        <script type="text/javascript">
                            function checkMailStatus() {
                                //alert("came");
                                var email = $("#email").val(); // value in field email
                                $.ajax({
                                    type: 'post',
                                    url: 'regconnect.php', // put your real file name 
                                    data: {
                                        email: email
                                    },
                                    success: function(msg) {
                                        alert("Email ID already taken.. Enter new email ID"); // your message will come here.     
                                    }
                                });
                                //onblur="checkMailStatus()"
                            }
                        </script>

                        <div class="form-row">
                            <div class="name">Email</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="email" name="email" placeholder="xyz@gmail.com">
                                </div>
                            </div>
                        </div>
                        <script type="text/javascript">
                            function checkPhoneStatus() {
                                //alert("came");
                                var phone = $("#phone").val();
                                $.ajax({
                                    type: 'post',
                                    url: 'regconnect.php',
                                    data: {
                                        phone: phone
                                    },
                                    success: function(msg) {
                                        alert("Phone Number already taken.. Enter new Phone Number"); // your message will come here.     
                                    }
                                });
                            } //onblur="check()"
                        </script>
                        <div class="form-row m-b-55">
                            <div class="name">Phone</div>
                            <div class="value">
                                <div class="row row-refine">
                                    <div class="col-3">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="number" name="area_code" placeholder="+(91)">

                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="phone" placeholder="10 Digit Number" id="ph">

                                            <p id="error2" style="display:none"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="Picture-upload" style="color: white;">
                            <label id="l1"> Image to upload : </label>
                            <input type="file" name="files" id="files" accept=".png,.gif,.jpg,.webp">

                        </div>
                        <script type="text/javascript">
                            function check() {
                                var p = document.getElementById("error2");
                                var a = document.getElementById("ph").value;
                                var l = a.length;
                                if (l > 10 || l < 10) {

                                    p.innerHTML = "Phone Number must be 10 digits!!"
                                    p.style = "display:inline";


                                } else {

                                    p.style = "display:none";
                                    var phone = $("#phone").val();
                                    $.ajax({
                                        type: 'post',
                                        url: 'regconnect.php',
                                        data: {
                                            phone: phone
                                        },
                                        success: function(msg) {
                                            alert("Phone Number already taken.. Enter new Phone Number"); // your message will come here.     
                                        }
                                    });
                                }
                            }
                        </script>

                        <div>
                            <button class="btn btn--radius-2 btn--red" name="submit" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body>

</html>
<!-- end document-->