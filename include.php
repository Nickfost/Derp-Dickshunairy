<?php

//		HTML Function 
session_start();

function html($html){
	echo trim($html);
}
function starthtml(){
	if(isset($_GET['Username']) && isset($_GET['Password'])){
		login($_GET['Username'], $_GET['Password']);
	}
	html("<!DOCTYPE html>");
	html("<html lang=\"en\">");
  	html("	<head>");
    html("		<meta charset=\"utf-8\">");
    html("		<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, user-scalable=no\">");
    html("		<meta name=\"robots\" content=\"index, follow\">");
    html("		<meta name=\"revisit-after\" content=\"1 day\">");
}
function metadescription($desc){
	html("		<meta name=\"description\" content=\"".$desc."\">");}
function metakeywords($keywords){
	html("		<meta name=\"keywords\" content=\"".$keywords."\">");}
		
function title($title){
	html("		<title>".$title."</title>");}
function bootstrap(){
	html("		<link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css\">");
	html("		<link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css\">");
}
function beginbody(){
	bootstrap();
	html("	</head>");
	html("	<body class=\"container\">");
	html("	<p class=\"text-center h3\">");
	html("		<a href=\"/\" />Home</a> | <a href=\"/submit a word.php\" />Submit a word</a> ");
	if(loggedin()){
		html("		| <a href=\"/accept wurds.php\" />accept wurds</a> ");
	}

	html("	</p>");
	html("<div style=\"margin-top:15%;\">");
	
}
function endpage(){
	html("<p class=\"text-right\"> I'm <a href=\"http://nckfst.us/dirp\">open source</a></p>");
	html("</div>");
	html("        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->");
    html("    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js\"></script>");
    html("    <!-- Include all compiled plugins (below), or include individual files as needed -->");
    html("    <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js\"></script>");
	html("	</body>");
	html("</html>");
}
function translate($sentance){
	$newsentance = "";
	$words = split(" ", $sentance);
	$handle = @fopen("Dickshunairy.txt", "r+");
	while(!feof($handle)){
 		$trans = split(';',fgets($handle));
		$dataArray[$trans[0]] = $trans[1];
	}
 	foreach($words as $word){
		$word = strtolower($word);
    	if(isset($dataArray[$word])) {
 		$newsentance .= $dataArray[$word].' ';
    	}
		else{
 			$newsentance .= $word.' ';
 		}
	}	
	return $newsentance;
}

function checkifexists($thing){
	global $db; 
	$sql = "SELECT * FROM  `Words` WHERE Real_Word =".$thing;
	$result = $db->query($sql);
	if($result->num_rows > 0){
		return true;
	}
	
	else{
		return false;
	}
	
}

function cleanmysql($string){
	global $db;
	return $db->real_escape_string($string);	
}

function login($username, $password) {
	global $db; 	
	$username = cleanmysql($username);
	$query = "SELECT * FROM Users WHERE Username=\"".$username."\" LIMIT 1";
	$result = $db->query($query);
	$data = $result->fetch_object();
	unset($query, $result);
	if (isset($data->Password) && $password == $data->Password) {
		$_SESSION["user-id"] = $data->ID;
		header("Location: /"); 
		die();	
	}
}

function loggedin(){
	if(isset($_SESSION["user-id"])){
		return true;
	}
	else{
		return false;
	}
}

function submitword($realword, $newword){
	global $db;
	$realword = cleanmysql($realword);
	$newword = cleanmysql($newword);
	$sql = "INSERT INTO `Words` (`Real_Word`, `Derp_Word`) VALUES ('".$realword."', '".$newword."')";
	
	
}
?>