<?php

$correct_password = "PASS";

if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
        // If the password is not set (or incorrect), display the password prompt
    if (isset($_POST['password']) && $_POST['password'] === $correct_password) {
        // Password is correct, continue to show the page content
    } else {
        // Password prompt if not correct
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // If the form has been submitted but password is incorrect, show an alert and reload
            echo '<script>alert("Incorrect password! Please try again.");</script>';
        }
        echo '<div style="display:flex;width:100%;height:100%;justify-content:center;align-items: center;color:red;">
        <div style="padding:30px;background-color:#f5bd73;width:300px;border-radius:10px;">
                <span style="color:white;font-size:40px;font-weight:600">Administration Login</span>
                <form method="POST" style="display:grid;max-width:300px;gap:30px;margin-top:50px;">
                    <label for="password" style="color:black;font-size:1.3rem">Enter password:</label>
                    <input type="password" name="password" required style="height:30px;outline:none;border:1px solid blue;border-radius:3px;"/>
                    <input type="submit" value="Submit" style="height:30px;background-color:#4169E1;border-radius:3px;border:none;color:white;font-weight:550;cursor:pointer"/>
                </form>
            </div>
    </div>';
        exit;  // Stop executing the rest of the PHP file
    }
}


$servername = "localhost";
$username = "root";
$password = "";
$database = "gym"; 

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id, name, email, comment, created_at FROM comments ORDER BY created_at DESC";
$sql1= "SELECT id, name, email, contact, created_at FROM enquiry ORDER BY created_at DESC";

// Execute the query
$result = mysqli_query($conn, $sql);
$result1 = mysqli_query($conn,$sql1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow:auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        td .c{
            width: 100%;
            height: 100px;
            overflow: auto;
            scrollbar-width:thin;
            word-break: break-word;
            overflow-wrap: break-word;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
            width:250px;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .no-results {
            text-align: center;
            color: red;
            font-size: 18px;
        }

        .logo-container{
            display:flex;
            justify-content:center;
            align-items:center;
            background-color:orange;
            width:100%;
            height:300px;
        }

        .logo-view{
            background-image:url('img/avr-gym-logo.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-size: 100% 100%;
            width: 250px;
            height: 100px;
            padding:50px;
        }

        .display{
            display:none;
        }

        .select-but{
            width:100%;
            display:flex;
            justify-content:center;
            margin:20px;
            gap:40px;
        }

        #user-com, #enq{
            background:#CC5500;
            border:none;
            padding:10px;
            color:#FAF9F6;
            border-radius:3px;
            font-weight:bold;
            cursor:pointer;
        }

        #Renq{
            background:#009E60;
            border:none;
            padding:10px;
            color:#FAF9F6;
            border-radius:3px;
            font-weight:bold;
            cursor:pointer;
        }

        .deleteEnq{
            background:red;
            border:none;
            padding:10px;
            color:#FAF9F6;
            border-radius:3px;
            font-weight:bold;
            cursor:pointer;
        }

    </style>
</head>
<body>
<div>
    <div class="logo-container"><div class="logo-view"></div></div>
    <div class="select-but">
        <button id="user-com">User Comments</button>
        <button id="enq">Enquiries</button>
    </div>
    
    <div class="container display" id="user-container">
        <h1>User Comments</h1>

        <?php
        // Check if there are any rows returned
        if (mysqli_num_rows($result) > 0) {
            // Output data for each row
            echo "<table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Comment</th>
                        <th>Commented On</th>
                        <th>Send Mail</th>
                    </tr>";
            $serial = 1;
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>" . $serial++ . "</td>
                        <td>" . $row["name"]. "</td>
                        <td>" . $row["email"]. "</td>
                        <td><div class=\"c\">" . $row["comment"]. "</div></td>
                        <td>" . $row["created_at"]. "</td>
                        <td><a href=\"https://mail.google.com/mail/?view=cm&fs=1&to=" . $row['email'] . "\" target=\"_blank\">Send</a></td>
                    </tr>";
            }

            echo "</table>";
        } else {
            echo "<p class='no-results'>No results found.</p>";
        }
        ?>
    </div>

    <div class="container display" id="enquiry-container">
        <h1>Enquiry Forms</h1>

        <?php
        // Check if there are any rows returned
        if (mysqli_num_rows($result1) > 0) {
            // Output data for each row
            echo "<table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Enquiry Date</th>
                        <th>Send Mail</th>
                    </tr>";
            $serial = 1;
            while($row = mysqli_fetch_assoc($result1)) {
                echo "<tr>
                        <td>" . $serial++ . "</td>
                        <td>" . $row["name"]. "</td>
                        <td>" . $row["email"]. "</td>
                        <td>" . $row["contact"]. "</td>
                        <td>" . $row["created_at"]. "</td>
                        <td><a href=\"https://mail.google.com/mail/?view=cm&fs=1&to=" . $row['email'] . "\" target=\"_blank\">Send</a></td>
                    </tr>";
            }
            echo "</table>";
        } else {
            echo "<p class='no-results'>No results found.</p>";
        }
        ?>
    </div>

</div>

<script>
    document.getElementById("user-com").addEventListener("click", function(event){
        event.preventDefault();
        document.getElementById("enquiry-container").classList.add("display");
        document.getElementById("user-container").classList.remove("display");
    })
    document.getElementById("enq").addEventListener("click", function(event){
        event.preventDefault();
        document.getElementById("user-container").classList.add("display");
        document.getElementById("enquiry-container").classList.remove("display");
    })
</script>
<?php
// Close the connection
mysqli_close($conn);
?>

</body>
</html>
