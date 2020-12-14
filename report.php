<?php

    $DBservername = "localhost";
    $DBusername = "root";
    $DBpassword = "";
    $DBname = "webtechfinal2020";



    // Create connection
    $conn = new mysqli($DBservername, $DBusername, $DBpassword,$DBname);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $username = $_POST['username'];
    $title = $_POST['title'];
    $event = $_POST['event'];
    $location = $_POST['location'];
    $category = $_POST['category'];

    $sql = "SELECT * FROM userdata where User_username = '$username'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $sql = "INSERT INTO reportdata (Report_username	,Report_title,Report_event,Report_location,Report_category) VALUES ('$username','$title','$event','$location','$category')";
        $result = $conn->query($sql);
        echo '<script>alert("Glad you could join us. Proceed to Log In!")</script>';
        header("Location:report.html");

    }else{
      echo '<script>alert("UNAUTHOURISED USER!")</script>';
      header("login.html");
    }
?>