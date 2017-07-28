<?php  
session_start();
$uname=$_SESSION['uname'];
$uid=$_SESSION['uid'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Logs</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
</head>
 <?php  
   
   $uname=$_SESSION['uname'];
   $uid=$_SESSION['uid'];
   $conn=mysql_connect("localhost","root","");
   $dbconn=mysql_select_db("workout_tracker");
   $q=mysql_query("SELECT * FROM `logs` WHERE `uid`={$uid} ");
   $row = mysql_fetch_assoc($q);
?>
<body>
  <center>WELCOME <?php echo "{$uname}"?></center>
  <table>
      <?php do{ ?>
  	 <tr>
  	 	<td><?php echo $row['date']?></td>
        <td><a href="addworkouts.php?id=<?php echo $row['date']?>">ADD Workouts</a></td>
        <td><a href="showworkouts.php?id=<?php echo $row['date']?>">SHOw Workouts</a></td>     

  	 </tr>
<?php }while($row=mysql_fetch_assoc($q));?>
  </table>

</body>
</html>