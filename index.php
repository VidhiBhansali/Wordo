<html>
<head>
<title>
wordo
</title>
<link rel="stylesheet" href="css/style.css">
<script>
function showArticle(str)
{
var xmlhttp;
if (str=="")
  {
  document.getElementById("txta").innerHTML="";
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
    document.getElementById("txta").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","article.php?ar="+str,true);
xmlhttp.send();
}
	
function spell_check()
{
	var article = document.getElementById("article").value; 
	if (article == "")
	{
		alert ("Please select the title from combobox");
	}
	else
	{
		var e = document.getElementById("comboSel");
		var str = e.options[e.selectedIndex].text;	
		var hrf="spell_check.php?title="+str;
		document.getElementById("a_link").href=hrf;
	}
}
	
function synonym()
{
    var article = document.getElementById("article").value; 
	if (article == "")
	{
		alert ("Please select the title from combobox");
	}
	else
	{
	var e = document.getElementById("comboSel");
    var str = e.options[e.selectedIndex].text;  
    var hrf="synonym.php?title="+str;
    document.getElementById("b_link").href=hrf;
	}
}
	
function detect_word()
{
	 var article = document.getElementById("article").value; 
	if (article == "")
	{
		alert ("Please select the title from combobox");
	}
	else
	{
	var e = document.getElementById("comboSel");
    var str = e.options[e.selectedIndex].text;  
    var hrf="detect.php?title="+str;
    document.getElementById("c_link").href=hrf;
	}
}	
</script>
</head>
<body >
<?php include("header.php"); ?>
<div id="txtarea">
<p id='txta'>
<textarea id="article" cols="75" rows="8" placeholder="Please select value from Combobox!!"></textarea></br>
</p>
<label>
	<select id="comboSel" name="comboSel">
    <!--<option value="select" selected> Select Article </option>-->
		<?php
			$connect=mysql_connect("localhost","root","") or die("connnection failed");
			mysql_select_db("wordo") or die(mysql_error());
			$query="select title, title_short from title_desc";
			$result = mysql_query($query) or die($query."<br/><br/>".mysql_error());
				while($row = mysql_fetch_array($result))
					{
						echo '<option value="'.$row['title_short'].'">'.$row['title'].'</option>';
					}
		?>
	</select>
</label>
<button id="copyBtn" type="button" onclick="showArticle(comboSel.value)">Copy</button>
</div>
<?php include("footer.php"); ?>
</body>
</html>