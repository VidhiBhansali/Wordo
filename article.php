<?php
$title_short = $_GET['ar'];
$connect=mysql_connect("localhost","root","admin") or die("connnection failed");
mysql_select_db("wordo") or die(mysql_error());
$query="select article from title_desc where title_short='".$title_short."'";
$result = mysql_query($query) or die($query."<br/><br/>".mysql_error());
while($row = mysql_fetch_array($result))
	{
		echo '<textarea id="article" cols="75" rows="8" placeholder="Please select value from Combobox!!" readonly>'.$row['article'].'</textarea>';
	}
?>