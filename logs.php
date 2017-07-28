
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Logs</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php
session_start();
$uid=$_SESSION['uid'];
?>
</head>

<body>
<div class="container">
</br>
</br>

<form method="post" name="" class="">
  <table name="dynamic_field">
  <tr>
  <td>
  <input type="text" name="name[]" class="form-control name_list"/>
 <td>
		<button name="add" id="add" class="btn btn-success">Add More</button>


	</td>

	</tr>

	
	</table>
	<input type="submit" name="submit" value="Add Workout"></input>

</form>

</div>

</body>



<script>  
 $(document).ready(function(){  
      var i=1;  
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="name[]" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
      
 });  
 </script>


<?php
if(isset($_POST['submit'])){
$conn=mysql_connect("localhost","root","");
$dbconn=mysql_select_db("workout_tracker");
foreach ($name as $a => $b) {
	# code...
	$q=mysql_query("INSERT INTO `logs`(`uid`,`date`) VALUES('{$uid}','{$_POST['name'][$a]}')");
}

header("Location:workouts.php");


}
?>


























