<?php
$meaning = $_GET['ar'];
$word = $_GET['ar1'];
$article = $_GET['ar2'];
$connect=mysql_connect("localhost","root","admin") or die("connnection failed");
mysql_select_db("wordo") or die(mysql_error());
$str = $article;
$arr = explode(" ",$str);
$len = count($arr);
$space = " ";
$string = "";
for ($i=0; $i<$len; $i++)
{
if ($arr[$i] == $word)
{
$string = $string.$meaning.$space;
//echo '<textarea id="articleb" cols="75" rows="10" placeholder="Please select value from Combobox!!">'.$string.'</textarea>';
}
else 
{
$string = $string.$arr[$i].$space;
}
}
echo '<textarea id="articleb" cols="75" rows="10" placeholder="Please select value from Combobox!!" readonly>'.$string.'</textarea>';
?>
