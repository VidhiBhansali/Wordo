<html>
<head>
<title>
Detect word substitution
</title>
<link rel="stylesheet" href="css/style.css">
<script>

function showMedical(str)
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
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtb").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","detect_med.php?ar="+str,true);
xmlhttp.send();
}

function showSocial(str)
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
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtb").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","detect_social.php?ar="+str,true);
xmlhttp.send();
}

function showSport(str)
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
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtb").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","detect_sport.php?ar="+str,true);
xmlhttp.send();
}

function showNews(str)
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
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtb").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","detect_news.php?ar="+str,true);
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
    var article = document.getElementById("articleb").value; 
	if (article == "")
	{
		alert ("There is no value in New Textarea");
	}
	else
	{
	var str = document.getElementById("articleb").value;  
	var hrf="spell_synonym.php?article="+str;
    document.getElementById("b_link").href=hrf;
	}
}	
function detect_word()
{
	var str = document.getElementById("articleb").value;    
    var hrf="#";
    document.getElementById("c_link").href=hrf;
}	

</script>
</head>
<body>
<?php include("header.php"); ?>
<?php $article = $_GET['article'];?>
  <div id="txtarea">
  <p id='txta'>
  <textarea id="article" cols="75" rows="10" placeholder="Please select value from Combobox!!" readonly><?php echo $article; ?></textarea></br></br>
  </p>
  <button id="MedicalBtn" type="button" onclick="showMedical(article.value)">Medical</button>
  <button id="SocialBtn" type="button" onclick="showSocial(article.value)">Social</button>
  <button id="SportBtn" type="button" onclick="showSport(article.value)">Sport</button>
  <button id="NewsBtn" type="button" onclick="showNews(article.value)">News</button></br></br>
  <p id='txtb'>
  <textarea id="articleb" cols="75" rows="10" placeholder="Please select value from Combobox!!" readonly></textarea></br>
  </p>
  </div>
  <!-- <?php// include("footer.php"); ?> -->
</body>
</html>