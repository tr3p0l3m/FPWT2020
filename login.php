<?php 
    $DBservername = "localhost";
    $DBusername = "root";
    $DBpassword = "";
    $DBname = 'webtechfinal2020';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $conn = new mysqli($DBservername, $DBusername, $DBpassword,$DBname);

    if ($conn-> connect_error){
        die("Error 404: Database not found!".$conn-> connect_error);
    }
    $sql = "SELECT User_username,User_password,User_profession from userdata WHERE User_username = '$username'AND User_password = '$password'";
    $result = $conn-> query($sql);

    if($result-> num_rows > 0){
        if('User_profession' == "admin"){
            echo '<script>alert("Welcome!")</script>';
            header("admin.php");
            exit();
        }else{
            echo '<script>alert("Welcome!")</script>';
            header("Location:report.html");
            exit();
        }
        
    }else{
        echo '<script>alert("Wrong Data Input!")</script>';
        header("Location:index.html");
    }

    $conn->close();
?>