<?php 
   require_once(dirname(__DIR__)."/utils/functions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
<script type="text/javascript" src="java.js" id="java"></script>
</head>
<body background="background1.jpg">
<style type="text/css">
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
  	div{	
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
</style>
<?php?>
<form id="form">
	<h2>Hello, user!</h2>
	<?php
	echo("<div>");
	$id = get_id();
	$json_msg = api_request("data","get","sessionid=$id");
	//var_dump($json_msg);
	if($json_msg["Error"]=="Not logged!") { header("Location: ../controllers/index.php");}
	else{
	echo $json_msg["Result"];
	}
	echo("</div>");
	?>
	<p><button type="button" id="logout" onclick="data.logout()">Logout</button><button type="button" id="change" onclick="data.change()">Change</button><button type="button" id="more_txt" onclick="loadMore()">Text</button></p>
	<script type="text/javascript">
	var currentPage = 0;
		var atEnd = false;
		function get_cookie(cookie_name)
		{
			var results = document.cookie.match ( '(^|;) ?' + cookie_name + '=([^;]*)(;|$)' );
  			if ( results )
	  			return (unescape ( results[2] ) );
  			else
    			return null;
		}
		function loadMore() 
		{
			if(atEnd) 
			{
				return;
			}
			var request = new XMLHttpRequest();
			currentPage+=200;
			request.open("GET", "http://localhost/web3/api.php?action=data&method=new_part&sessionid=" + get_cookie("sessionid") + "&count=" + (currentPage));
			request.onload = function loadCallback() 
			{
				if(request.responseText) 
				{
					var textElement = document.getElementById("three");
					var txt = request.responseText;
					txt = JSON.parse(txt);
						var text_extra = document.createTextNode(txt["Result"]);
                         textElement.innerText += txt["Result"];
				}
			};
			request.send();
		}
	</script>
</form>
<?php?>
</body>
</html>