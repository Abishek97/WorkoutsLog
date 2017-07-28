<?php  
session_start();
$uname=$_SESSION['uname'];
$uid=$_SESSION['uid'];
$date=$_GET['id'];
#echo "$date"
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
<body>
<form method="post">
	<div id="wrapper" class="container">
	<button class="add_field_btn">ADD WORKOUTS</button>
	<div>
		<input type="text" name="name[]" placeholder="Excercise_NAME" />
		<input type="text" name="s[]" placeholder="SETS" />
		<input type="text" name="r[]" placeholder="REP" />
       </div>
	</div>
	<br/>
	<input type="submit" name="submit" value="submit"></input>
	</form>
</body>

<script >
$(document).ready(function(e){
	var max=100;
	var x=1;
	  $(".add_field_btn").click(function(e){
	  	 x++;
	  	 if(x<max){
	  	 e.preventDefault();
         $("#wrapper").append('<div><input type="text" name="name[]" placeholder="Excercise_NAME" /><input type="text" name="s[]" placeholder="SETS" /><input type="text" name="r[]" placeholder="REP" /><a href="#" class="remove_btn">Delete Workout</a></div>');
}
	  });
	  $("#wrapper").on('click','.remove_btn',function(e){
           e.preventDefault();
           x--;
           $(this).parent('div').remove();

	  })
});

</script>
</html>
<?php

  if(isset($_POST['submit'])){
   $conn=mysql_connect("localhost","root","");
   $dbconn=mysql_select_db("workout_tracker");
   for($i=0;$i<count($_POST['name']);$i=$i+1){
      mysql_query("INSERT INTO `workouts`(`uid`,`date`,`name`,`reps`,`sets`) VALUES ('{$uid}','{$date}','{$_POST["name"][$i]}','{$_POST["r"][$i]}','{$_POST["s"][$i]}')");

   }
}




?>