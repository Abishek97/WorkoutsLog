<html>
<head>
<title></title></head>
<body>
<form method="post" name="login_form" class="" id="">
Enter Id:<input type="text" name="id" class="" id=""/><br>
Enter Name:<input type="text" name="name"/></br>
Enter Password:<input type="password" class="pass" name="pass" id=""/>

</br>
<input type="submit" name="submit">
</form>
</body>













<?php
if(isset($_POST['submit'])){
$con=mysql_connect("localhost","root","") or die("sorry couldn't connect");
$dbconn=mysql_select_db("workout_tracker") or die("sorry couldn't connect");
$q1=mysql_query("SELECT * FROM `Users` WHERE id={$_POST['id']}");

if(mysql_num_rows($q1)==0){
	if($_POST['id']!=NULL&&$_POST['name']!=NULL&&$_POST['pass']!=NULL){
         $q=mysql_query("INSERT INTO `Users` VALUES ({$_POST['id']},'{$_POST['name']}','{$_POST['pass']}')");


	header("Location:om1.php");
}
	else{
		echo"SORRY PASSWORD OR ID OR NAME IS EMPTY";
	}
}
else{
	echo"SORRY ID ALREADY EXISTS";

}
}



?>
</html>