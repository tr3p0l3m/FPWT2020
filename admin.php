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
                $username = 'username';
                $conn = mysqli_connect("localhost","root","","report");
                if ($conn-> connect_error){
                    die("Error 404: Database not found!".$conn-> connect_error);
                }
                $sql = "SELECT Msg_Title,Msg_Message,Msg_Location,Msg_Username,Msg_Category from report_data";
                $result = $conn-> query($sql);

                if($result-> num_rows > 0){
                    while($row = $result-> fetch_assoc()){
                        echo "<tr><td>". $row['Msg_Title'] ."</td><td>". $row['Msg_Message'] ."</td><td>". $row['Msg_Location'] ."</td><td>". $row['Msg_Username'] ."</td><td>". $row['Msg_Category'] ."</td><tr>";
                    }
                    echo "</table>";
                }else{
                    echo "Error 404 Something is wrong!";
                }

                $conn->close();
            ?>
        </tbody>
    </table>
    <button>
        Add Event
    </button>
</body>
</html>