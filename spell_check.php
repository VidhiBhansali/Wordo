<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>
		Auto Spell
	</title>
<link rel="stylesheet" href="css/style.css">
<script>
function spell_check()
{
	var str = document.getElementById("article").value;  
    var hrf="spell_check_synonym.php?article="+str;
    document.getElementById("a_link").href=hrf;
}	
function synonym()
{
	var str = document.getElementById("article").value;    
    var hrf="spell_synonym.php?article="+str;
    document.getElementById("b_link").href=hrf;
}	
function detect_word()
{
	var str = document.getElementById("article").value;   
    var hrf="spell_detect.php?article="+str;
    document.getElementById("c_link").href=hrf;
}	
</script>
<meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-1" />
</head>
<body>
<?php include("header.php"); ?>	
<?php $title = $_GET['title'];
	$connect=mysql_connect("localhost","root","admin") or die("connnection failed");
	mysql_select_db("wordo") or die(mysql_error());
	$query="select article from title_desc where title='".$title."'";
	$result = mysql_query($query) or die($query."<br/><br/>".mysql_error());
	$row = mysql_fetch_array($result);
	$article = $row['article'];
	echo '<div id="txtarea">
	<textarea id="article" cols="75" rows="10" >'.$article.'</textarea> </br>';
?>
<?php
	require "phpspellcheck/include.php";	
    //For a spell-check button that opens in a popup dialog.

$mySpell = new SpellCheckButton();
$mySpell->InstallationPath = "phpspellcheck/";
$mySpell->Fields = "ALL";
//$mySpell->WindowMode = "popup";
//$mySpell->CSSTheme = "bright";
//$mySpell->CaseSensitive = false;
//$mySpell->IgnoreAllCaps = false;
//$mySpell->IgnoreNumeric = false;
//$mySpell->CheckGrammar = false;
//$mySpell->ShowMeanings = false;
//$mySpell->ShowSummaryScreen = false;
echo $mySpell->SpellImageButton();

//For inline "spell-as-you-type" on right click
$mySpell = new SpellAsYouType();
$mySpell->InstallationPath = "phpspellcheck/";
$mySpell->Fields = "ALL";
//$mySpell->WindowMode = "popup";
//$mySpell->CSSTheme = "bright";
//$mySpell->CaseSensitive = false;
//$mySpell->IgnoreAllCaps = false;
//$mySpell->IgnoreNumeric = false;
//$mySpell->CheckGrammar = false;
//$mySpell->ShowMeanings = false;
//$mySpell->ShowSummaryScreen = false;
echo $mySpell->Activate();	
?>
</div>
<?php include("footer.php"); ?>	
</body>
</html>