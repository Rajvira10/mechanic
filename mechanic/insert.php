<?php
$username = $_POST['username'];
$address = $_POST['address'];
$phonenumber = $_POST['phonenumber'];
$licensenumber = $_POST['licensenumber'];
$date = $_POST['date'];
$mechanic = $_POST['mechanic'];

if(!empty($username)||!empty($address)||!empty($phonenumber)||!empty($licensenumber)||!empty($date)||!empty($mechanic)){
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "root";
    $dbname = "mechanic";

    $conn = new mysqli($host,$dbUsername,$dbPassword,$dbname);

    if(!mysqli_connect_error()){
        $SELECT = "SELECT username FROM userinfo where username=? and date=?";
        $INSERT = "INSERT INTO userinfo(username,address,phonenumber,licensenumber,date,mechanic) values(?,?,?,?,?,?)";
        $SELECT2 = "SELECT username FROM userinfo where mechanic=? and date=?";
        
        $stmt = $conn ->prepare($SELECT);
        $stmt->bind_param("ss",$username, $date);
        $stmt->execute();
        $stmt->bind_result($date);
        $stmt->store_result();
        $rnum = $stmt->num_rows;

        if($rnum==0){
            $stmt->close();
            $stmt = $conn ->prepare($SELECT2);
            $stmt->bind_param("ss",$mechanic, $date);
            $stmt->execute();
            $stmt->bind_result($date);
            $stmt->store_result();
            $rnum = $stmt->num_rows;

            if($rnum<4){
                $stmt->close();
                $stmt = $conn ->prepare($INSERT);
                $stmt -> bind_param("sssiss",$username,$address,$phonenumber,$licensenumber,$date,$mechanic);
                $stmt -> execute();
                echo "You have booked this mechanic successfully";
                echo "<a href='index.html'><button>Go back</button></a> ";
            }
            else{
                echo "This mechanic is booked fully that day";
                echo "<a href='index.html'><button>Go back</button></a> ";
            }

        }
        else{
            echo "You already have a booking that day with this mechanic";
            echo "<a href='index.html'><button>Go back</button></a> ";
        }

        
        
    }
}else{
    echo "All fields are required";
    die();
}

?>