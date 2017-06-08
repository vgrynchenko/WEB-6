<?php
const API_URL = "http://localhost/web3/api.php";

function session($sessionid, $user) {
	if($sessionid != null) {
		setcookie("sessionid", $sessionid);
		setcookie("username", $user);
	} else {
		return $_COOKIE["sessionid"];
	}
}
function get_id() {
	return $_COOKIE["sessionid"];
}
function logout()
{
	if (isset($_COOKIE['sessionid'])) 
	{
		unset($_COOKIE['sessionid']);
	}
	if (isset($_COOKIE['username'])) 
	{
		unset($_COOKIE['username']);
	}
	$id = get_id();
	
	session_id($id);

	//session_destroy();
	header("Location: ../controllers/index.php");
	exit;
}
function api_request($action, $method, $params) 
{
	$url = API_URL . "?action=${action}&method=${method}&${params}";
	$response_string = file_get_contents($url);
	//echo $response_string;
	$decoded = json_decode($response_string, true);
	//echo $decoded["Error"];
	return $decoded;
}
/*function removeBOM($str="") {
    if(substr($str, 0, 3) == pack('CCC', 0xef, 0xbb, 0xbf)) {
        $str = substr($str, 3);
    }
    return $str;
    }
function json_last_error_msg() 
{
     static $ERRORS = array(
                JSON_ERROR_NONE => 'No error',
                JSON_ERROR_DEPTH => 'Maximum stack depth exceeded',
                JSON_ERROR_STATE_MISMATCH => 'State mismatch (invalid or malformed JSON)',
                JSON_ERROR_CTRL_CHAR => 'Control character error, possibly incorrectly encoded',
                JSON_ERROR_SYNTAX => 'Syntax error',
                JSON_ERROR_UTF8 => 'Malformed UTF-8 characters, possibly incorrectly encoded'
            );

            $error = json_last_error();
            return isset($ERRORS[$error]) ? $ERRORS[$error] : 'Unknown error';
}

*/
?>