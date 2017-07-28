<html>
<head>
<title></title></head>
<body>
<form method="post" name="login_form" class="" id="">
Enter Id:<input type="text" name="name" class="" id=""/><br>
Enter Password:<input type="password" class="pass" name="pass" id=""/>

</br>
<input type="submit" name="submit">
</form>
</body>













<?php
if(isset($_POST['submit'])){
	session_start();
$con=mysql_connect("localhost","root","") or die("sorry couldn't connect");
$dbconn=mysql_select_db("workout_tracker") or die("sorry couldn't connect");

$q=mysql_query("Select * from `Users` WHERE id={$_POST['name']}");
$row=mysql_fetch_assoc($q);
if(mysql_real_escape_string($_POST['pass'])==$row['password']){
	$_SESSION['uid']=$_POST['name'];
	$_SESSION['uname']=$row['name'];
	header("Location:logs1.php");
}
else{
	echo"SORRY WRONG PASSWORD OR USERNAME";

}
}



?>
</html>