<?php 
   require_once(dirname(__DIR__)."/utils/functions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Change</title>
<script type="text/javascript" src="java.js" id="java"></script>
</head>
<body background="background1.jpg">
<style type="text/css">
	
  	#ok{
  		margin-left: 200px;
  		height: 30px;
  		width: 50px;
  	}
  	textarea{
  		background: linear-gradient(to top left, white, lemonchiffon, wheat, blanchedalmond);
		margin: 0 auto;
		text-align:center;
  		font-family: comic sans ms;
  		height: 300px;
  		width: 400px;
  		overflow: auto;
  		padding: 10px;
		border-radius: 10px;
		box-shadow:  0px 10px 20px 0px rgba(0, 0, 0, 0.3); 
  	}
  	body{
		background-repeat:no-repeat;
	}
	form{
		
		text-align:center;
		margin-top: 100px; 
		margin-left: 80px;
		font-family: comic sans ms;
	}
	
	h2{
		margin-top: 0px;
		padding-top: 0px;
		font-family: comic sans ms;
		color:sienna;

	}
	
	button {
		
		margin-left:150px;
		height: 50px;
  		width: 100px;
   		border-radius: 5px;
   		border: 0px solid #666;
   		margin: 5px;
		background: linear-gradient(to top left, sandybrown, peru, burlywood);
		text-decoration: none;
  	}
  	
</style>
</style>
<<?php  ?>
<form id="form" method="post" action="login.php">
	<h2>Change text!</h2>
	<textarea name="for_inf"><?php
	$id = get_id();
	$json_msg = api_request("data","first_part","&sessionid=$id");
	if($json_msg["Error"] == "Not logged!") { header("Location: ../controllers/index.php");}
	else{
	echo $json_msg["Result"];
	}
	?></textarea>
	<p><button type="submit" id="ok">Ok!</button></p>
</form>
<?php //session_destroy();?>
</body>
</html>