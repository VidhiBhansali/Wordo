<?php
$article = $_GET['ar'];
$connect=mysql_connect("localhost","root","admin") or die("connnection failed");
mysql_select_db("wordo") or die(mysql_error());
$art = explode(" ",$article);
$length_art = count($art);
$art[-4] = "";
$art[-3] = "";
$art[-2] = "";
$art[-1] = "";
$art[$length_art] = "";
$art[$length_art + 1] = "";
$art[$length_art + 2] = "";
$art[$length_art + 3] = "";
$space = " ";
$string = "";
$change = 0;
$left_kgram = "";
$right_kgram = "";
$statement = "";
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
	
$query="select frequency from detect where word='".$word."'";
$result = mysql_query($query) or die($query."<br/><br/>".mysql_error());
$row = mysql_fetch_array($result);
$num_results = mysql_num_rows($result);
if ($num_results > 0)
{
$frequency = $row['frequency'];
$query="select word from social where frequency='".$frequency."'";
$result = mysql_query($query) or die($query."<br/><br/>".mysql_error());
$row = mysql_fetch_array($result);
$social = $row['word'];

//Start of kgram5

//left and right kgram5
$left_5 = $art[$i-4].$space.$art[$i-3].$space.$art[$i-2].$space.$art[$i-1].$space.$word;	
$right_5 = $word.$space.$art[$i+1].$space.$art[$i+2].$space.$art[$i+3].$space.$art[$i+4];
$left_sub5 = $art[$i-4].$space.$art[$i-3].$space.$art[$i-2].$space.$art[$i-1].$space.$social;	
$right_sub5 = $social.$space.$art[$i+1].$space.$art[$i+2].$space.$art[$i+3].$space.$art[$i+4];

//frequency of left kgram5
$query="select frequency from kgram5 where gram='".$left_5."'";
$result = mysql_query($query) or die($query."<br/><br/>".mysql_error());
$row = mysql_fetch_array($result);
$left_5f = $row['frequency'];

//frequency of right kgram5
$query="select frequency from kgram5 where gram='".$right_5."'";
$result = mysql_query($query) or die($query."<br/><br/>".mysql_error());
$row = mysql_fetch_array($result);
$right_5f = $row['frequency'];

//frequency of left kgram5 after substitution
$query="select frequency from kgram5 where gram='".$left_sub5."'";
$result = mysql_query($query) or die($query."<br/><br/>".mysql_error());
$row = mysql_fetch_array($result);
$left_sub5f = $row['frequency'];

//frequency of right kgram5 after substitution
$query="select frequency from kgram5 where gram='".$right_sub5."'";
$result = mysql_query($query) or die($query."<br/><br/>".mysql_error());
$row = mysql_fetch_array($result);
$right_sub5f = $row['frequency'];

$total5f = $left_5f + $right_5f;
$total_sub5f = $left_sub5f + $right_sub5f;

//Decide if solution exist in kgram5
if ($total5f == 0 && $total_sub5f !=0)
	{
	$social = $social;
	}
elseif ($total5f != 0 && $total_sub5f ==0)
	{
		$social = $word;
		$pmi = 1;
	}
elseif ($total5f == 0 && $total_sub5f == 0)
//start of kgram4		
		{				
//left and right kgram4
$left_4 = $art[$i-3].$space.$art[$i-2].$space.$art[$i-1].$space.$word;	
$right_4 = $word.$space.$art[$i+1].$space.$art[$i+2].$space.$art[$i+3];
$left_sub4 = $art[$i-3].$space.$art[$i-2].$space.$art[$i-1].$space.$social;	
$right_sub4 = $word.$space.$art[$i+1].$space.$art[$i+2].$space.$art[$i+3];

//frequency of left kgram4
$query="select frequency from kgram4 where gram='".$left_4."'";
$result = mysql_query($query) or die($query."<br/><br/>".mysql_error());
$row = mysql_fetch_array($result);
$left_4f = $row['frequency'];

//frequency of right kgram4
$query="select frequency from kgram4 where gram='".$right_4."'";
$result = mysql_query($query) or die($query."<br/><br/>".mysql_error());
$row = mysql_fetch_array($result);
$right_4f = $row['frequency'];

//frequency of left kgram4 after substitution
$query="select frequency from kgram4 where gram='".$left_sub4."'";
$result = mysql_query($query) or die($query."<br/><br/>".mysql_error());
$row = mysql_fetch_array($result);
$left_sub4f = $row['frequency'];

//frequency of right kgram4 after substitution
$query="select frequency from kgram4 where gram='".$right_sub4."'";
$result = mysql_query($query) or die($query."<br/><br/>".mysql_error());
$row = mysql_fetch_array($result);
$right_sub4f = $row['frequency'];


$total4f = $left_4f + $right_4f;
$total_sub4f = $left_sub4f + $right_sub4f;

//Decide if solution exist in kgram4
if ($total4f == 0 && $total_sub4f !=0)
	{
	$social = $social;
	}
elseif ($total4f != 0 && $total_sub4f ==0)
	{
		$social = $word;
		$pmi = 1;
	}
	elseif ($total4f == 0 && $total_sub4f == 0)
//Start of kgram3
	{				
//left and right kgram3
$left_3 = $art[$i-2].$space.$art[$i-1].$space.$word;	
$right_3 = $word.$space.$art[$i+1].$space.$art[$i+2];
$left_sub3 = $art[$i-2].$space.$art[$i-1].$space.$social;	
$right_sub3 = $social.$space.$art[$i+1].$space.$art[$i+2];

//frequency of left kgram3
$query="select frequency from kgram3 where gram='".$left_3."'";
$result = mysql_query($query) or die($query."<br/><br/>".mysql_error());
$row = mysql_fetch_array($result);
$left_3f = $row['frequency'];

//frequency of right kgram3
$query="select frequency from kgram3 where gram='".$right_3."'";
$result = mysql_query($query) or die($query."<br/><br/>".mysql_error());
$row = mysql_fetch_array($result);
$right_3f = $row['frequency'];

//frequency of left kgram3 after substitution
$query="select frequency from kgram3 where gram='".$left_sub3."'";
$result = mysql_query($query) or die($query."<br/><br/>".mysql_error());
$row = mysql_fetch_array($result);
$left_sub3f = $row['frequency'];

//frequency of right kgram3 after substitution
$query="select frequency from kgram3 where gram='".$right_sub3."'";
$result = mysql_query($query) or die($query."<br/><br/>".mysql_error());
$row = mysql_fetch_array($result);
$right_sub3f = $row['frequency'];


$total3f = $left_3f + $right_3f;
$total_sub3f = $left_sub3f + $right_sub3f;

//decide if solution exists in kgram3 or not
if ($total3f == 0 && $total_sub3f !=0)
	{
	$social = $social;
	}
elseif ($total3f != 0 && $total_sub3f ==0)	
	{
		$social = $word;
		$pmi = 1;
	}
	elseif ($total3f == 0 && $total_sub3f == 0)
//Start of Kgram2		
		{
				
//left and right kgram2
$left_2 = $art[$i-1].$space.$word;	
$right_2 = $word.$space.$art[$i+1];
$left_sub2 = $art[$i-1].$space.$social;	
$right_sub2 = $word.$space.$art[$i+1];

//frequency of left kgram2
$query="select frequency from kgram2 where gram='".$left_2."'";
$result = mysql_query($query) or die($query."<br/><br/>".mysql_error());
$row = mysql_fetch_array($result);
$left_2f = $row['frequency'];

//frequency of right kgram2
$query="select frequency from kgram2 where gram='".$right_2."'";
$result = mysql_query($query) or die($query."<br/><br/>".mysql_error());
$row = mysql_fetch_array($result);
$right_2f = $row['frequency'];

//frequency of left kgram2 after substitution
$query="select frequency from kgram2 where gram='".$left_sub2."'";
$result = mysql_query($query) or die($query."<br/><br/>".mysql_error());
$row = mysql_fetch_array($result);
$left_sub2f = $row['frequency'];

//frequency of right kgram2 after substitution
$query="select frequency from kgram2 where gram='".$right_sub2."'";
$result = mysql_query($query) or die($query."<br/><br/>".mysql_error());
$row = mysql_fetch_array($result);
$right_sub2f = $row['frequency'];

$total2f = $left_2f + $right_2f;
$total_sub2f = $left_sub2f + $right_sub2f;

//Decide if result is in kgram1 or kgram2
if ($total2f == 0 && $total_sub2f !=0)
	{
	$social = $social;
	}
elseif ($total2f != 0 && $total_sub2f ==0)
	{
		$social = $word;
		$pmi = 1;
	}
elseif ($total2f == 0 && $total_sub2f == 0)
// Start of kgram1	
	{
		$social = $word;		
	} 
//End of kgram1	
else 
//Solution is there in kgram2
	{
		$rest_left1 = $art[$i-1];	
		$rest_right1 = $art[$i+1];

//frequency of left over left kgram2
$query="select frequency from kgram1 where gram='".$rest_left1."'";
$result = mysql_query($query) or die($query."<br/><br/>".mysql_error());
$row = mysql_fetch_array($result);
$rest_left1f = $row['frequency'];

//frequency of left over right kgram2
$query="select frequency from kgram1 where gram='".$rest_right1."'";
$result = mysql_query($query) or die($query."<br/><br/>".mysql_error());
$row = mysql_fetch_array($result);
$rest_right1f = $row['frequency'];

// PMI of left and right grams of word
	if ($left_2f == 0 && $right_2f == 0)
		{
			$total_pmi_2f = 0;
		}
	elseif ($left_2f == 0 && $right_2f != 0)
		{
			$pmi_right2f = ($frequency * $rest_right1f) / ($right_2f);
			$total_pmi_2f = $pmi_right2f;
		}

	elseif ($left_2f != 0 && $right_2f == 0)
		{
			$pmi_left2f = ($frequency * $rest_left1f) / ($left_2f);
			$total_pmi_2f = $pmi_left2f;
		} 
	else 
		{ 
			$pmi_left2f = ($frequency * $rest_left1f) / ($left_2f);
			$pmi_right2f = ($frequency * $rest_right1f) / ($right_2f);
			$total_pmi_2f = $pmi_left2f + $pmi_right2f;
		}
// closing of PMI of left and right grams of word	

// PMI of left and right grams after substitution
	if ($left_sub2f == 0 && $right_sub2f == 0)
		{
			$total_pmi_sub2f = 0;
		}
	elseif ($left_sub2f == 0 && $right_sub2f != 0)
		{
			$pmi_right_sub2f = ($frequency * $rest_right1f) / ($right_sub2f);
			$total_pmi_sub2f = $pmi_right_sub2f;
		}
	elseif ($left_sub2f != 0 && $right_sub2f == 0)
		{
			$pmi_left_sub2f = ($frequency * $rest_left1f) / ($left_sub2f);
			$total_pmi_sub2f = $pmi_left_sub2f;
		} 
	else 
		{ 
			$pmi_left_sub2f = ($frequency * $rest_left1f) / ($left_sub2f);
			$pmi_right_sub2f = ($frequency * $rest_right1f) / ($right_sub2f);
			$total_pmi_sub2f = $pmi_left_sub2f + $pmi_right_sub2f;
		}
// closing of PMI of left and right grams after substitution	

		//PMI conclusion
		if ($total_pmi_sub2f > $total_pmi_2f)
			{
				$social = $word;
			//	$pmi = $total_pmi_2f/1000000;
			//	echo "the probability is ".$pmi;
			} 

		else 
			{
				$social = $social;
				$pmi = $total_pmi_sub2f/1000000;
				$statement = $statement.'<p>The Phrase <b style = "color:red;">'.$left_2.' '.$rest_right1.'</b> is detected as substitution with probability = '.$pmi. ".</p> ";
			} 
		//closing PMI conclusion
	}
// closing Solution found in kgram2
// Done with kgram1 and kgram2
}
//End of Kgram2
	else
//Solution is there in Kgram3
{
$rest_left2 = $art[$i-2].$space.$art[$i-1];	
$rest_right2 = $art[$i+1].$space.$art[$i+2];

//frequency of left over left kgram3
$query="select frequency from kgram2 where gram='".$rest_left2."'";
$result = mysql_query($query) or die($query."<br/><br/>".mysql_error());
$row = mysql_fetch_array($result);
$rest_left2f = $row['frequency'];

//frequency of left over right kgram3
$query="select frequency from kgram2 where gram='".$rest_right2."'";
$result = mysql_query($query) or die($query."<br/><br/>".mysql_error());
$row = mysql_fetch_array($result);
$rest_right2f = $row['frequency'];

// PMI of left and right grams of word
if ($left_3f == 0 && $right_3f == 0)
	{
	$total_pmi_3f = 0;
	}
elseif ($left_3f == 0 && $right_3f != 0)
	{
		$pmi_right3f = ($frequency * $rest_right2f) / ($right_3f);
		$total_pmi_3f = $pmi_right3f;
	}
elseif ($left_3f != 0 && $right_3f == 0)
	{
		$pmi_left3f = ($frequency * $rest_left2f) / ($left_3f);
		$total_pmi_3f = $pmi_left3f;
	} 
else 
	{ 
		$pmi_left3f = ($frequency * $rest_left2f) / ($left_3f);
		$pmi_right3f = ($frequency * $rest_right2f) / ($right_3f);
		$total_pmi_3f = $pmi_left3f + $pmi_right3f;
	}
// closing of PMI of left and right grams of word
	
// PMI of left and right grams after substitution
if ($left_sub3f == 0 && $right_sub3f == 0)
 {
	$total_pmi_sub3f = 0;
 }
elseif ($left_sub3f == 0 && $right_sub3f != 0)
 {
$pmi_right_sub3f = ($frequency * $rest_right2f) / ($right_sub3f);
$total_pmi_sub3f = $pmi_right_sub3f;
 }

elseif ($left_sub3f != 0 && $right_sub3f == 0)
 {
	$pmi_left_sub3f = ($frequency * $rest_left2f) / ($left_sub3f);
    $total_pmi_sub3f = $pmi_left_sub3f;
 } 
else 
{ 
$pmi_left_sub3f = ($frequency * $rest_left2f) / ($left_sub3f);
$pmi_right_sub3f = ($frequency * $rest_right2f) / ($right_sub3f);
$total_pmi_sub3f = $pmi_left_sub3f + $pmi_right_sub3f;
}
// closing of PMI of left and right grams after substitution

 //PMI conclusion
if ($total_pmi_sub3f > $total_pmi_3f)
	{
		$social = $word;
	//	$pmi = $total_pmi_3f/1000000;
	//	echo "the probability is ".$pmi;
	} 
else 
	{
	$social = $social;
	$pmi = $total_pmi_sub3f/1000000;
	$statement = $statement.'<p>The Phrase <b style = "color:red;">'.$left_3.' '.$rest_right2.'</b> is detected as substitution with probability = '.$pmi. ". ";
	} 
//closing PMI conclusion
} 
//closing solution found in kgram3
}
//End of kgram3
	else
//Solution is there in kgram4	
	{
$rest_left3 = $art[$i-3].$space.$art[$i-2].$space.$art[$i-1];	
$rest_right3 = $art[$i+1].$space.$art[$i+2].$space.$art[$i+3];

//frequency of left over left kgram4
$query="select frequency from kgram3 where gram='".$rest_left3."'";
$result = mysql_query($query) or die($query."<br/><br/>".mysql_error());
$row = mysql_fetch_array($result);
$rest_left3f = $row['frequency'];

//frequency of left over right kgram4
$query="select frequency from kgram3 where gram='".$rest_right3."'";
$result = mysql_query($query) or die($query."<br/><br/>".mysql_error());
$row = mysql_fetch_array($result);
$rest_right3f = $row['frequency'];

// PMI of left and right grams
if ($left_4f == 0 && $right_4f == 0)
 {
	$total_pmi_4f = 0;
 }
elseif ($left_4f == 0 && $right_4f != 0)
 {
	$pmi_right4f = ($frequency * $rest_right3f) / ($right_4f);
	$total_pmi_4f = $pmi_right4f;
 }

elseif ($left_4f != 0 && $right_4f == 0)
 {
	$pmi_left4f = ($frequency * $rest_left3f) / ($left_4f);
	$total_pmi_4f = $pmi_left4f;
 } 
else 
{ 
$pmi_left4f = ($frequency * $rest_left3f) / ($left_4f);
$pmi_right4f = ($frequency * $rest_right3f) / ($right_4f);
$total_pmi_4f = $pmi_left4f + $pmi_right4f;
}

// PMI of left and right grams after substitution
if ($left_sub4f == 0 && $right_sub4f == 0)
 {
	$total_pmi_sub4f = 0;
 }
elseif ($left_sub4f == 0 && $right_sub4f != 0)
 {
$pmi_right_sub4f = ($frequency * $rest_right3f) / ($right_sub4f);
$total_pmi_sub4f = $pmi_right_sub4f;
 }

elseif ($left_sub4f != 0 && $right_sub4f == 0)
 {
	$pmi_left_sub4f = ($frequency * $rest_left3f) / ($left_sub4f);
    $total_pmi_sub4f = $pmi_left_sub4f;
 } 
else 
{ 
$pmi_left_sub4f = ($frequency * $rest_left3f) / ($left_sub4f);
$pmi_right_sub4f = ($frequency * $rest_right3f) / ($right_sub4f);
$total_pmi_sub4f = $pmi_left_sub4f + $pmi_right_sub4f;
}

 //PMI conclusion
if ($total_pmi_sub4f > $total_pmi_4f)
	{
		$social = $word;
	//	$pmi = $total_pmi_4f/1000000;
	//	echo "the probability is ".$pmi;
	} 

else 
	{
	$social = $social;
	$pmi = $total_pmi_sub4f/1000000;
	$statement = $statement. '<p>The Phrase <b style = "color:red;">'.$left_4.' '.$rest_right3.'</b> is detected as substitution with probability = '.$pmi. ". ";
	} //closing else of PMI conclusion

} // closing else of $total_pmi not equal to zero
}
// Closing of kgram4
	else
//solution exist in kgram5	
	{
	$rest_left4 = $art[$i-4].$space.$art[$i-3].$space.$art[$i-2].$space.$art[$i-1];	
    $rest_right4 = $art[$i+1].$space.$art[$i+2].$space.$art[$i+3].$space.$art[$i+4];

//frequency of left over left kgram4
$query="select frequency from kgram4 where gram='".$rest_left4."'";
$result = mysql_query($query) or die($query."<br/><br/>".mysql_error());
$row = mysql_fetch_array($result);
$rest_left4f = $row['frequency'];

//frequency of left over right kgram4
$query="select frequency from kgram3 where gram='".$rest_right4."'";
$result = mysql_query($query) or die($query."<br/><br/>".mysql_error());
$row = mysql_fetch_array($result);
$rest_right4f = $row['frequency'];

// PMI of left and right grams
if ($left_5f == 0 && $right_5f == 0)
 {
	$total_pmi_5f = 0;
 }
elseif ($left_5f == 0 && $right_5f != 0)
 {
	$pmi_right5f = ($frequency * $rest_right4f) / ($right_5f);
	$total_pmi_5f = $pmi_right5f;
 }

elseif ($left_5f != 0 && $right_5f == 0)
 {
	$pmi_left5f = ($frequency * $rest_left4f) / ($left_5f);
	$total_pmi_5f = $pmi_left5f;
 } 
else 
{ 
$pmi_left5f = ($frequency * $rest_left4f) / ($left_5f);
$pmi_right5f = ($frequency * $rest_right4f) / ($right_5f);
$total_pmi_5f = $pmi_left5f + $pmi_right5f;
}

// PMI of left and right grams after substitution
if ($left_sub5f == 0 && $right_sub5f == 0)
 {
	$total_pmi_sub5f = 0;
 }
elseif ($left_sub5f == 0 && $right_sub5f != 0)
 {
$pmi_right_sub5f = ($frequency * $rest_right4f) / ($right_sub5f);
$total_pmi_sub5f = $pmi_right_sub5f;
 }

elseif ($left_sub5f != 0 && $right_sub5f == 0)
 {
	$pmi_left_sub5f = ($frequency * $rest_left4f) / ($left_sub5f);
    $total_pmi_sub5f = $pmi_left_sub5f;
 } 
else 
{ 
$pmi_left_sub5f = ($frequency * $rest_left4f) / ($left_sub5f);
$pmi_right_sub5f = ($frequency * $rest_right4f) / ($right_sub5f);
$total_pmi_sub5f = $pmi_left_sub5f + $pmi_right_sub5f;
}

 //PMI conclusion
if ($total_pmi_sub5f > $total_pmi_5f)
	{
		$social = $word;
	//	$pmi = $total_pmi_5f/1000000;
	//	echo "the probability is ".$pmi;
	} 

else 
	{
	$social = $social;
	$pmi = $total_pmi_sub5f/1000000;
	$statement = $statement. '<p>The Phrase <b style = "color:red;">'.$left_5.' '.$rest_right4.'</b> is detected as substitution with probability = '.$pmi. ". ";
	} //closing else of PMI conclusion
	}
    $string = $string.$social.$special.$space;
	}
else 
	{
		$string = $string.$word.$special.$space;
	} // closing else of $string = $word	
}
echo '<textarea id="articleb" cols="75" rows="10" placeholder="Please select value from Combobox!!" readonly>'.$string.'</textarea></br>';
echo $statement; 
?>
