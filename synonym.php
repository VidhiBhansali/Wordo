<html>
<head>
	<title>
		Synonym
	</title>
<link rel="stylesheet" href="css/style.css">
<script>
function showChanged(str)
{
	var xmlhttp;
	if (str=="")
	{
		document.getElementById("txtb").innerHTML="";
		return;
	}
	if (window.XMLHttpRequest)
		{// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		}
	else
		{// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
	xmlhttp.onreadystatechange=function(){
	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
		document.getElementById("txtb").innerHTML=xmlhttp.responseText;
    }
 }
xmlhttp.open("GET","article_syn.php?ar="+str,true);
xmlhttp.send();
}

function showOptions(str)
{
var xmlhttp;
if (str=="")
  {
  document.getElementById("labels").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("labels").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","find_syn.php?ar="+str,true);
xmlhttp.send();
}

function showArticle(str,str1,str2)
{
var xmlhttp;
var str3 = document.getElementById("articleb").innerHTML;
if (str3 != "")
{ str2 = str3; }
if (str2=="")
  {
  document.getElementById("txtb").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtb").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","replace_article.php?ar="+str+"&ar1="+str1+"&ar2="+str2,true);
xmlhttp.send();
}

function spell_check()
{
    var article = document.getElementById("articleb").value; 
	if (article == "")
	{
		alert ("There is no value in New Textarea");
	}
	else
	{
	var str = document.getElementById("articleb").value;  
    var hrf="spell_check_synonym.php?article="+str;
    document.getElementById("a_link").href=hrf;
	}
}	
function synonym()
{
	var str = document.getElementById("articleb").value;    
    var hrf="#";
    document.getElementById("b_link").href=hrf;
}	
function detect_word()
{
	var article = document.getElementById("articleb").value; 
	if (article == "")
	{
		alert ("There is no value in New Textarea");
	}
	else
	{
	var str = document.getElementById("articleb").value;   
    var hrf="spell_detect.php?article="+str;
    document.getElementById("c_link").href=hrf;
	}
}	

</script>
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
?>
  <div id="txtarea">
	<p id='txta'>
		<textarea id="article" cols="75" rows="10" placeholder="Please select value from Combobox!!" readonly><?php echo $article; ?></textarea></br></br>
	</p>
	<button id="copyBtn" type="button" onclick="showChanged(article.value)">Replace</button> 
	
	<input id="article_find" name="article_find">  </input>
	<button id="findBtn" type="button" onclick="showOptions(article_find.value)">Find</button>

<span id = "labels">	

</span>  
  
  <p id='txtb'>
  <textarea id="articleb" cols="75" rows="10" placeholder="Please select value from Combobox!!" readonly></textarea></br>
  </p>
  
  </div>
  <?php include("footer.php"); ?>
</body>
</html>