<?php 
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "root";
    $dbname = "mechanic";

    $conn = new mysqli($host,$dbUsername,$dbPassword,$dbname);
    $query="SELECT * from userinfo";
    $result = mysqli_query($conn,$query);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Admin Page</title>
</head>
<body>
    <header>
    <h1>MECHANIC</h1>
    <nav>
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="admin.php">Admin</a></li>
        <li><a href="appoint.html">Appointment</a></li>
        <li><a href="contact.html">Contact Us!</a></li>
      </ul>
    </nav>
  </header>
    <div class="registration">
        
        <h2 style="margin-left:600px;">List of Appointments</h2>
        <table align="center" border="1px" style="width:1000px; line-height:30px;" >
            <tr>
                <th>Client Name</th>
                <th>Phone</th>
                <th>Car Registration Number</th>
                <th>Appointment Date</th>
                <th>Mechanic Name</th>
                <th>Operation</th>
            </tr>
            <?php
            while($rows=mysqli_fetch_assoc($result)){
             echo"
                <tr>
                    <td>".$rows['username']."</td>
                    <td>".$rows['phonenumber']."</td>
                    <td>".$rows['licensenumber']."</td>
                    <td>".$rows['date']."</td>
                    <td>".$rows['mechanic']."</td>
                    <td><a href='update.php?rn=$rows[iduserinfo]'><input type='button' value='Edit'></input></td></a>
                </tr>";
             
            }
            ?>
            
        </table>
    </div>
</body>
</html>

