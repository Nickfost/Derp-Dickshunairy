<?php
require("include.php");
$rows = rand(2,12);
starthtml();
metadescription("this translates english into derpish");
metakeywords("derp");
title("derp dickshunary");
beginbody();
html("	<div class=\"text-center\">");
html("		<form method=\"get\">");
html("			<div class=\"form-group\">");
html("				<input name=\"Normal\" class=\"form-control\" width=\"75px\" placeholder=\"Normal Word\" type=\"text\">");
html("			</div>");
html("			<div class=\"form-group\">");
html("				<input name=\"Derp\" class=\"form-control\" width=\"75px\" placeholder=\"Derp Word\" type=\"text\">");
html("			</div>");
html("			<input type=\"submit\" class=\"btn btn-primary\">");
html("		</form>");
html("	</div>");

if(isset($_GET["Normal"]) && isset($_GET["Derp"])){
	
	function error($what){
		html("<br />");
		html("<div class=\"alert alert-danger\" role=\"alert\">".$what."</div>");
	}
	
	$Normal = trim($_GET["Normal"]);
	$Derp = trim($_GET["Derp"]);
	if(!strstr($Normal, " ")){
		if($Normal != "" || $Derp != ""){
			if(checkifexists($Normal)){
				error("That word is already defined");
			}
			else{
				
			}
		}
		else{
			error("You can't leave shit blank");
		}
	}
	else{
		error("You can only use 1 word");
	}
}
endpage();
?>