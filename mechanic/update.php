<?php

    session_start();
 
    $rn = $_GET['rn'];
    $_SESSION["id"] = $rn;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<body>
    <form action="update2.php" method="POST">
      <table>
        <tr>
          <td>Appointment Date:</td>
          <td><input type="date" name="date" required /></td>
        </tr>
        <tr>
          <td>Select your desired mechanic</td>
          <td>
            <input type="radio" name="mechanic" value="1" />Mechanic 1
            <input type="radio" name="mechanic" value="2" />Mechanic 2
            <input type="radio" name="mechanic" value="3" />Mechanic 3
            <input type="radio" name="mechanic" value="4" />Mechanic 4
            <input type="radio" name="mechanic" value="5" />Mechanic 5
          </td>
        </tr>
        <tr>
          <td><input type="submit" value="Update" /></td>
        </tr>
      </table>
    </form>
    
</body>
</html>