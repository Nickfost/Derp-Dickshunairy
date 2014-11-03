<?php
require("include.php");
$rows = rand(2,12);
starthtml();
metadescription("this translates english into derpish");
metakeywords("derp");
title("derp dickshunary");
beginbody();
html("<form role=\"form\" method=\"post\" ");
html("<div class=\"form-group\">");
html("    <label  for=\"textbox\">Put words here that you'd like translated</label>");
html("<textarea  id=\"textbox\" class=\"form-control\" name=\"words\" rows=\"".$rows."\">");
html("</textarea>");
html(" </div>");
html("    <button type=\"submit\" class=\"btn btn-warning\" > Trunslate! </button>");
html("</form>");
if(isset($_POST['words']) && $_POST['words'] != ""){
	html("<div id=\"Modal\" class=\"modal fade bs-example-modal-lg\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myLargeModalLabel\" aria-hidden=\"true\">");
	html("	<div class=\"modal-dialog modal-lg\">");
	html("		<div class=\"modal-content\">");
	html("			<div class=\"modal-header\">");
	html("				<button type=\"button\" class=\"close\" data-dismiss=\"modal\"><span aria-hidden=\"true\">&times;</span><span class=\"sr-only\">Close</span></button>");
	html("				<h4 lass=\"modal-title\">Trunslation</h4>");
	html("			</div>");
	html("			<div style=\"margin-bottom:65%;\" class=\"modal-body\">");
	html("				<p>".translate($_POST['words'])."</p>");
	html("			</div>");
	html("			<div class=\"modal-footer\">");
	html("				<p class=\"text-center\"> <a class=\"twitter-follow-button\" href=\"https://twitter.com/Nickfost_\" data-size=\"large\" data-show-count=\"false\" data-lang=\"en\"> Follow @Nickfost_ </a></p>");
    html("			</div>");
	html("		</div>");
	html("	</div>");
	html("</div>");
}
endpage();
if(isset($_POST['words']) && $_POST['words'] != ""){
	html("<script>$('#Modal').modal('show')</script>");
	html("<script type=\"text/javascript\">");
	html("window.twttr = (function (d, s, id) {");
	html("  var t, js, fjs = d.getElementsByTagName(s)[0];");
	html("  if (d.getElementById(id)) return;");
	html("  js = d.createElement(s); js.id = id;");
	html("  js.src= \"https://platform.twitter.com/widgets.js\";");
	html("  fjs.parentNode.insertBefore(js, fjs);");
	html("  return window.twttr || (t = { _e: [], ready: function (f) { t._e.push(f) } });");
	html("}(document, \"script\", \"twitter-wjs\"));");
	html("</script>");
}
?>