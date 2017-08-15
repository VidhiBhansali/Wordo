<?php
$article = $_GET['ar'];
$connect=mysql_connect("localhost","root","admin") or die("connnection failed");
mysql_select_db("wordo") or die(mysql_error());
$art = explode(" ",$article);
$length_art = count($art);
$space = " ";
$string = "";
$change = 0;
$colon = ";";
$replaced = "";
for ($i=0; $i<$length_art; $i++)
{
	$char = $art[$i];
	$char_split =  str_split($char, 1);
	$length_char = count($char_split);
		if ($char_split[$length_char-1] == "." or $char_split[$length_char-1] == "," 
		    or $char_split[$length_char-1] == "?" or $char_split[$length_char-1] == "!")
		{
			$special = $char_split[$length_char-1];
			$word = "";
				for ($j=0; $j < $length_char-1; $j++)
				{
					$word = $word.$char_split[$j];
				}
		}
		else
		{
			$special = "";
			$word = $art[$i];
		}
	$query="select meaning from synonym where word='".$word."' and value=1";
	$result = mysql_query($query) or die($query."<br/><br/>".mysql_error());
	$row = mysql_fetch_array($result);
	$num_results = mysql_num_rows($result);
		if ($num_results > 0)
		{
			$meaning = $row['meaning'];
			$string = $string.$meaning.$special.$space;
			$change = $change + 1;
			$replaced = $replaced.$art[$i]." = ".$meaning." ; ";
		}
		else 
		{
			$string = $string.$art[$i].$space;		
		}
}
$percentage = round(($change/$length_art) * 100);
echo '<textarea id="articleb" cols="75" rows="10" placeholder="Please select value from Combobox!!" readonly>'.$string.'</textarea>';
echo '<p> The list of words substituted are '.$replaced.'.<p>';
?>