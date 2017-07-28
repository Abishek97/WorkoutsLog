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
<form method="post">
<div class="input_fields_wrap">
    <button class="add_field_button">Add More Fields</button>
    <div><input type="text" name="mytext[]"><input type="text" name="mu[]"></div>
</div>


</br>

<input type="submit" name="submit" value="Add workouts">

</form>

</body>
<script>
$(document).ready(function() {
    var max_fields      = 100; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div><input type="text" name="mytext[]"/><input type="text" name="mu[]"><a href="#" class="remove_field">Remove</a></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
</script>
<?php
if(isset($_POST['submit'])){
$conn=mysql_connect("localhost","root","");
$dbconn=mysql_select_db("workout_tracker");
for($i=0;$i<count($_POST["mytext"]);$i=$i+1){
   mysql_query("INSERT INTO `logs`(`uid`,`date`,`muscle_group`) VALUES ('{$uid}','{$_POST["mytext"][$i]}','{$_POST["mu"][$i]}')");
}

header("Location:workouts.php");


}
?>
</html>