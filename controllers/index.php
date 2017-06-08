<?php 
   require_once(dirname(__DIR__)."/utils/functions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<script type="text/javascript" src="java.js" id="java"></script>
</head>
<body background="back.jpg">
<style type="text/css">
	form{
		margin-top: 200px; 
		margin-left: 100px;
	}
	#t{

		font-family: 'Pacifico', cursive;
		margin-left: 90px;
		color: blue;
	}
    input {
	    width: 200px;
	 	margin-left: 50px;
		margin-bottom: 10px;
		border-radius: 10px;
		font-family: 'Pacifico', cursive;
		font-size: 20px;
		color: black;
		text-decoration: none;

    }
    #block
{
    	padding: 100 px 0;
		border: solid 1px grey;
		border-radius: 10px;
		background: linear-gradient(to top left, powderblue, pink);
		border-radius: 5px;
		margin: 150px auto;
		width: 300px;
	    font-family: 'Open Sans', sans-serif;
	    box-shadow:  0px 10px 20px 0px rgba(0, 0, 0, 0.3); 
    	letter-spacing: 0;
    	border-radius: 50px;
        -moz-border-radius: 40px;
        -webkit-border-radius: 50px; 	
    }
    #button{
    width: 100px;
 	margin: 0 auto;
	margin-bottom: 10px;
	border-radius: 10px;
	font-family: 'Pacifico', cursive;
	font-size: 25px;
	color: blue;
	text-decoration: none;

    }
</style>
<?php //session_start();?>
<form id="form" method="post" action="login.php">
	<div id="block">
		<h3 id = "t">Authorization</h3>
		<p id="first"><input type="login" placeholder="Username" id="log" name="name"></p>
		<p id="error_user"></p>
		<p id="second"><input type="password" placeholder="Password" id="password" name="pass"></p>
		<p id="error_pass"></p>
		<p id = "button"><button type="submit" onclick="data.log()" id="button">Log in!</button></p>
	</div>
</form>
<?php //session_destroy(); ?>
</body>
</html>
<?php
if(isset($_GET['name_error']))
{
	?><script type="text/javascript">
	var prof1 = document.getElementById("error_user");
	pfof1.innerHTML="Wrong login!";
	</script>
<?php
}
if(isset($_GET['pass_error']))
{
	?><script type="text/javascript">
	var prof1 = document.getElementById("error_pass");
	prof1.innerHTML="Wrong password!";
	</script>
<?php
}
?>