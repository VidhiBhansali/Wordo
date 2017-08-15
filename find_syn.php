<?php
$word = $_GET['ar'];
$connect=mysql_connect("localhost","root","admin") or die("connnection failed");
mysql_select_db("wordo") or die(mysql_error());
$query="select meaning, value from synonym where word='".$word."'";
$result = mysql_query($query) or die($query."<br/><br/>".mysql_error());
echo '<label><select id="comboSel" name="comboSel">';
while($row = mysql_fetch_array($result))
{
$value = $row['value'];
$meaning = $row['meaning'];
echo '<option value="'.$meaning.'">'.$meaning.'</option>';
}
echo '</select></label>';
echo '<button id="changeBtn" type="button" onclick="showArticle(comboSel.value,\''.$word.'\',article.value)">Change</button></br>';

?>