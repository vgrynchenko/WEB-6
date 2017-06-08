<?php
require_once(dirname(__DIR__)."/utils/functions.php");
if(isset($_GET["logout"]))
{
		$id= get_id();
		$json_msg = api_request("user","logout","&sessionid=${id}");
	    logout();
}
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	if(isset($_POST['name']))
	{
	    $user = $_POST['name'];
	    $pass = $_POST['pass'];
    	//var_dump($json_msg);
    	$json_msg = api_request("user","login","username=$user&pass=$pass");
    	//var_dump($json_msg);
    	if($json_msg["Error"]==null)
    	{
    	header("Location: ../controllers/profile.php");
		session_id($json_msg["SessionId"]);
		$id = $json_msg["SessionId"];
		session_start();
		session($id,$user);
    }
   		else
    	{ 
    	if($json_msg["Error"]=="You have entered wrong password!") { header("Location: ../controllers/index.php?pass_error");}
    	else if($json_msg["Error"]=="This user doesn't exist") { header("Location: ../controllers/index.php?name_error");}
    	}
	}
	if(isset($_POST['for_inf']))
	{
		$tx =  $_POST['for_inf'];
		$id= get_id();
		$json_msg = api_request("data","set","sessionid=$id&text=$tx");
		header("Location: ../controllers/profile.php");
	}
}
else if(isset($_GET["set"]))
{
	$json_msg = api_request("data","login","username=$user&pass=$pass");
	if($json_msg["Error"]==null)
    {
		session_id($json_msg["SessionId"]);
    	session($id,$user);
    	header("Location: ../controllers/profile.php");
    }
}
?>