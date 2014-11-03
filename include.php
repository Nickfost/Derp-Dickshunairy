<?php

//		HTML Function 
function html($html){
	if($GLOBALS["minify"]==true){
		echo trim($html);
		}
	else{
		echo $html."\n";
		}
	
}
function starthtml(){
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
?>