<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Panel</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>
<body>
    <h1>Emergency Events Entries</h1>
    <table class="content-table">
        <thead>
            <th>Title</th>
            <th>Message</th>
            <th>Location</th>
            <th>Username</th>
            <th>Category</th>
        </thead>
        <tbody>
            <?php 
                $DBservername = "localhost";
                $DBusername = "root";
                $DBpassword = "";
                $DBname = "webtechfinal2020";
                $conn = new mysqli($DBservername, $DBusername, $DBpassword,$DBname);
                if ($conn-> connect_error){
                    die("Error 404: Database not found!".$conn-> connect_error);
                }
                $sql = "SELECT Report_username,Report_title,Report_event,Report_location,Report_category from reportdata";
                $result = $conn-> query($sql);

                if($result-> num_rows > 0){
                    while($row = $result-> fetch_assoc()){
                        echo "<tr><td>". $row['Report_username'] ."</td><td>". $row['Report_title'] ."</td><td>". $row['Report_event'] ."</td><td>". $row['Report_location'] ."</td><td>". $row['Report_category'] ."</td><tr>";
                    }
                    echo "</table>";
                }else{
                    echo "Error 404 Something is wrong!";
                }

                $conn->close();
            ?>
        </tbody>
    </table>
    <button onclick="window.location.href='./report.html';">
        Add Event
    </button>
</body>
</html>