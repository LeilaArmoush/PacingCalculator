<html>
<head>
<style type="text/css">
body {
    background-image: url("http://www.clker.com/cliparts/R/i/9/V/W/B/running-icon-on-transparent-background-hi.png");
    background-repeat: repeat-y & repeat-x;
    font: 20px ARIAL, sans-serif;
	font-color: LIGHTPINK;
}

.header
	{
	 display: inline-block;
    width: 1200px;
	height:50px;
    margin: 20px;
	padding: 10px;
    border: 3px solid #F26964;
	padding: 20px;
	font-family: ARIAL;
	align: center;
	vertical-align: middle;
	background: #E5E4E2;
	}	


/* box at the top of the page */
.top-box {
    display: inline-block;
    width: 1200px;
	height: 270px;
    margin: 20px;
	padding: 10px;
    border: 3px solid #F26964;
	vertical-align: top;
	padding: 20px;
	font-family: ARIAL;
	align: center;
	vertical-align: middle;
	background: #E5E4E2;
}
/* All boxes for calculations*/
.floating-box {
    display: inline-block;
	overflow: auto;
    width: 420px;
	height: 570px;
    margin: 20px;
	padding: 10px;
    border: 3px solid #F26964;
	vertical-align: top;
	padding: 20px;
	font-color: #000000;
	align: center;
	vertical-align: middle;
	background: #E5E4E2;
}
	
/* anything with the id submit */
	#submit{
	    background-color: #FF9C5F
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    border-radius:6px;
    color: #30302F;
    font-family: 'ARIAL';
    font-size: 15px;
    text-decoration: none;
    cursor: pointer;
    border:#F26964 inset;
	margin: 20px;
	width: 50px
	word-wrap: break-word;
}

/* applied to all tables */
table{
	  display: inline-block;
	overflow: auto;
    width: 420px;
    margin: 20px;
	padding: 10px;
    border: 3px solid #F26964;
	vertical-align: top;
	padding: 20px;
	font-color: #000000;
	align: center;
	vertical-align: middle;
	background: #E5E4E2;
}
	

/*small-print */
.bottom-box
{
	display: inline-block;
	overflow: auto;
    width: 1200px;
	height: 100px;
    margin: 10px;
	padding: 0px;
    border: 3px solid #F26964;
	padding: 5px;
	font-color: #000000;
	align: center;
	vertical-align: center;
	font-size: 8px;
	background: #E5E4E2;
}
/*small-print */
.graph
{
	display: inline-block;
	overflow: auto;
    width: 1200px;
	height: 300px;
    margin: 10px;
	padding: 0px;
    border: 3px solid #F26964;
	padding: 5px;
	font-color: #000000;
	align: center;
	vertical-align: center;
	font-size: 8px;
	background: #E5E4E2;
}
.hidden {
    display: none;
}

</style>
<div class="hidden">
<form action="elevation.php" method="POST">
<input type="hidden" name="windspeed"
value="<?php echo $_POST['windspeed']; ?>">
<input type="hidden" name="elevation"
value="<?php echo $_POST['elevation']; ?>">
<input type="hidden" name="distance"
value="<?php echo $_POST['distance']; ?>">
<input type="hidden" name="laplength"
value="<?php echo $_POST['laplength']; ?>">
<input type="hidden" name="Units"
value="<?php echo $_POST['Units']; ?>">
<input type="hidden" name="minutes"
value="<?php echo $_POST['minutes']; ?>">
<input type="hidden" name="seconds"
value="<?php echo $_POST['seconds']; ?>">
</class>

<?php
if (!empty($_POST['elevation']))//if elevation box is checked

	{
		$max=(integer)($_POST["distance"]/$_POST["laplength"]); //get the number of laps useful for iteration
		echo "<div class=\"floating-box\">";
			for($counter=1;$counter<=$max;$counter++)
				{
					if((!empty($_POST['elevation'])&&(empty($_POST['windspeed'])))) //if there is only elevation
						{
							
							echo "<input type=\"hidden\" id=\"$counter\" name=\"boxes[]\">";
							echo "<br/>";
						}//creates boxes for elevation values
					elseif ((!empty($_POST['elevation']))&&(!empty($_POST['windspeed']))) //if both elevation and windspeed are selected output elevation and windspeed boxes
						{
							
							echo "<input type=\"hidden\" id=\"$counter\" name=\"WindDirectionElevation[]\">";
							echo "<br/>";

							echo "<label for=\"WindDirectionElevation\">Wind Direction Lap $counter:</label>";
							echo "<select name=\"WindDirectionElevation[]\">";
							echo  "<option value=\"\">Wind Direction...</option>";
							echo  "<option value=\"TailwindElevation\">Tailwind</option>";
							echo  "<option value=\"HeadwindElevation\">Headwind</option></select><br/>";
						};


				}
	};
?>
<body>
<?php
if (empty($_POST['windspeed'])&&(!empty($_POST['elevation'])))//if just elevation is selected
	{
		if(isset($_POST['boxes'])) //if the elevation boxes are selected
			{

				echo "<table><font color=\"#000000\">"; //create table with black font colour
				echo "<tr><th><font color=\"#000000\">Lap Number</th><th><font color=\"#000000\">Distance Covered</th><th><font color=\"#000000\">Time</th></tr>";//table header	
				$lapnumber=1;	//initialise the laps at 1
					foreach($_POST['boxes'] as $percent) //for each member of the boxes array store the value as percent
					{
						$max=$_POST['distance']/$_POST['laplength']; //calculate number of laps
						$totalseconds=(($_POST['minutes']*60)+($_POST['seconds']));//total number of seconds is minutes times 60 with seconds added
						$paceinseconds=$totalseconds/$max; //pace per lap
						$alteredpace=($paceinseconds*($percent/100))+$paceinseconds; //pace affected by the elevation per lap
						$pacesofar=$pacesofar+$alteredpace; //culmative pace
						$tempminutes=($pacesofar/60); //time in a minutes as a decimal value
						$outminutes=(integer)$tempminutes; //for display the integer value of minutes
						$outseconds=(integer)(($tempminutes-$outminutes)*60);//for display the number of seconds converted from the decimal
						$units=$_POST['Units'];//units
						$distanceSoFar=($_POST['laplength']*$lapnumber); //culmative distance for display
						$counter=$lapnumber;//set lapnumber as counter for display
	
						printf("<tr><td><font color=\"#000000\">%02s</td><td><font color=\"#000000\">%02s %s</td><td><font color=\"#000000\">%02s.%02s</td></td>",$counter,$distanceSoFar,$units,$outminutes,$outseconds);//output table row for pace altered by elevation
						$lapnumber++; //increment lapnumber by 1
					}


					
			
			};
			
	};

		if (!empty($_POST['windspeed'])&&(!empty($_POST['elevation'])))	//if wind and elevation boxes are BOTH checked
			{
	
				if(isset($_POST['WindDirectionElevation']))//if there are values written into the array that stores both the wind direction and elevation 
					{
						echo "<table><font color=\"#000000\">";//table header
						echo "<tr><th><font color=\"#000000\">Lap Number</th><th><font color=\"#000000\">Distance Covered</th><th><font color=\"#000000\">Time</th></tr>";	
						$counter=1;//initalise the loop at 1
							foreach (array_values($_POST['WindDirectionElevation']) as $i => $value) //take the array values and assign an index and value variable 
								{
									if($i%2==0)//if the index is even
										{
											$percent=$value;//set the value as percent-so elevation variable
											$max=$_POST['distance']/$_POST['laplength'];//calculate number of laps
											$totalseconds=(($_POST['minutes']*60)+($_POST['seconds']));//calculate time in seconds
											$paceinseconds=$totalseconds/$max;//time per lap in seconds
											$alteredpace=($paceinseconds*($percent/100))+$paceinseconds;//the altered lap pace
											$pacesofar=$pacesofar+$alteredpace; //culmative pace
											$units=$_POST['Units'];//units
		
		
										}
									elseif($i%2==1)//if the index is odd
										{
											$winddirection=$value;//set value to winddirection variable
											$paceinseconds=$totalseconds/$max; //pace per lap in seconds
											$maxint=(integer)$max;//convert the total number of laps to an integer value
											$pacegained=(($_POST['Windspeedvalue']*$_POST['height']*$_POST['weight'])*((1.275/(2))))/3600;//calcuation for how tailwind affects the pace total over course
											$pacelost=($pacegained*2);//calculation for how headwind affects pace total over course
											$pacegainedperlap=$pacegained/$max;//how each lap is affected by tailwind
											$pacelostperlap=($pacegainedperlap*2)/$max;//how each lap is affected by headwind
	
											if($value=="HeadwindElevation")//when its headwind 
												{

													$tempperunitseconds=$pacelostperlap;
													//echo $tempperunitseconds;
													$outvalue=(-1)*$pacelostperlap;//set outvalue to a negative value of the pace lost calculated line 384
		
												}

											elseif($value=="TailwindElevation")//when its a tailwind
												{

													$tempperunitseconds=$pacegainedperlap;//how each lap is affected by tailwind
													//echo $tempperunitseconds;
													$outvalue=$pacegainedperlap;//set outvalue to a positive value calculated in 383
		
	
												};
											$temp=$pacesofar + $outvalue;//create temporary with the culmative value of the pace so far adding the effect of the tail or headwind
											$tempminutes=($temp/60);//time as decimal minute pace
											$outminutes=(integer)$tempminutes; //integer minutes pace for display 
											$outseconds=(integer)(($tempminutes-$outminutes)*60); //integer seconds for display 
											$distanceSoFar=(($_POST['laplength']*$counter));//culmative distance
											$units=$_POST['Units'];//units
											printf("<tr><td><font color=\"#000000\">%02s</td><td><font color=\"#000000\">%02s %s</td><td><font color=\"#000000\">%02s.%02s</td></td>",$counter,$distanceSoFar,$units,$outminutes,$outseconds);
											$pacesofar=$temp;//print table row
											$counter++;	//increment value
							};
 


								}
							echo "</table>";//end table
							
					};

	


			};


{

error_reporting(E_ERROR | E_PARSE);
if(!empty($_POST['Windspeedvalue']))
{
if(empty($_POST['Elevation']))
//if the wind box is checked and the head/tail winds are submitted
	{

	
		$max=$_POST['distance']/$_POST['laplength'];//calculate number of laps
		$totalseconds=($_POST['minutes']*60)+($_POST['seconds']);//total number of seconds
		$paceinseconds=$totalseconds/$max;//number of seconds per lap
		//$maxint=(integer)$max;
		(float)$pacegained=(($_POST['Windspeedvalue']*$_POST['height']*$_POST['weight'])*((1.275/(2))))/3600; // total pace gained in tailwind
		(float)$pacelost=($pacegained*2); //total pace lost in headwind
		(float)$pacegainedperlap=$pacegained/$max; //pace gained per lap in tailwind
		(float)$pacelostperlap=((float) $pacegainedperlap*2)/$max; //pace lost per lap in headwind
		$totalflattime=(float)$totalseconds-(float)$pacelost+(float)$pacegained; //calcuate achievable flat time if there were no hills
		$flattimeperlap=$totalflattime/$max;//flat pace per lap
		$laptimeinheadwind=((float) $flattimeperlap+(float) ($pacelostperlap))*($totalseconds/$totalflattime); //flattime  per lap + seconds into headwind
		$laptimeintailwind=(float) $flattimeperlap-(float)($pacegainedperlap)*($totalseconds/$totalflattime); //flatime per lap -seondsd with tailwind
		
			if(isset($_POST['WindDirection']))


{
                              //if winddirection is set
				
				echo "<table>";//output table header
		 		echo "<tr><th><font color=\"#000000\">Lap Number</th><th><font color=\"#000000\">Distance Covered</th><th><font color=\"#000000\">Time</th></tr>";

{
$counter=1;
$totalsofar=0;
foreach($_POST['WindDirection'] as $value)

	{

		if($value=="Headwind")
			{

				$tempperunitseconds=$laptimeinheadwind+$totalsofar;
				$tempminutes=($tempperunitseconds/60);
				$outminuteswind=(integer)$tempminutes;
				$outsecondswind=(integer)(($tempminutes-$outminuteswind)*60);
				$distanceSoFar=$_POST['laplength']*$counter;
				$units=$_POST['Units'];
				printf("<tr><td><font color=\"#000000\">%02s</td><td><font color=\"#000000\">%02s %s</td><td><font color=\"#000000\">%02s.%02s</td></tr>",$counter,$distanceSoFar,$units,$outminuteswind,$outsecondswind);
				$totalsofar=$totalsofar + $laptimeinheadwind;
			}

			elseif($value=="Tailwind")
			{


				$tempperunitseconds=$laptimeintailwind+$totalsofar;
				$tempminutes=($tempperunitseconds/60);
				$outminuteswind=(integer)$tempminutes;
				$outsecondswind=(integer)(($tempminutes-$outminuteswind)*60);
				$distanceSoFar=$_POST['laplength']*$counter;
				$units=$_POST['Units'];
				printf("<tr><td><font color=\"#000000\">%02s</td><td><font color=\"#000000\">%02s %s</td><td><font color=\"#000000\">%02s.%02s</td></tr>",$counter,$distanceSoFar,$units,$outminuteswind,$outsecondswind);
				$totalsofar=$totalsofar + $laptimeinheadwind;
			};
			$counter++;
	}
};
	
	
echo "</font></table>";
echo "</div>";
};
};
};
}

	

?>
<input type="submit" name="submit" value="Get Elevation" id="submit" >
</form>
</font>
</body>
</html>						