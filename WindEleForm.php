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


</style>
<body>
<form action="table.php"
method=POST>

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
	<?php





	$max=($_POST['distance']/$_POST['laplength']);//calculate number of laps
		if (!empty($_POST['windspeed'])&&(empty($_POST['elevation'])))//if windspeed is checked and elevation isn't
			{//output box to add variables windspeedvalue, height, and weight
				echo "<p><div class=\"floating-box\"><h3>Calcuating Wind affect.</h3>
				<label for=\"Windspeedvalue\">Wind Speed (mph): </label><br/>
				<input type=\"number\" id=\"Windspeedvalue\" name=\"Windspeedvalue\"><br/>
				<label for=\"height\">Height(cm):</label><br/>
				<input type=\"number\" id=\"height\" name=\"height\"><br/>
				<label for=\"weight\">Weight(Kg):</label><br/></<input type=\"number\" id=\"weight\" name=\"weight\">
				<input type=\"number\" id=\"weight\" name=\"weight\"><br/>";
			
				$counter=1; //intialise counter at 1
				while($counter<=$max)//while counter is less than the number of laps loop through

					{
						echo "<br/>";

						if (!empty($_POST['windspeed'])&&(empty($_POST['elevation']))) //if wind checkbox only is checked! print an box for every lap for tailwind and headwind
							{

								echo "<label for=\"WindDirection\">Lap $counter:</label> 
								<select name=\"WindDirection[]\">
								<option value=\"\">Wind Direction...</option>
								<option value=\"Tailwind\">Tailwind</option>
								<option value=\"Headwind\">Headwind</option>
								</select>";
								
								

								$counter++; //increment by 1

					}
								echo"<input type=\"hidden\" name=\"Winddirectionhidden\" value=\"Winddirectionhidden\"><br/>"; //hidden submit so that there isn't actually a button but its submitted
							}
							echo "</div><br/>";
			}
				elseif (!empty($_POST['windspeed'])&&(!empty($_POST['elevation'])))//if both windspeed and elevation are selected output box height weight and windspeed 
					{
						echo "<div class= \"floating-box\"><p><label for=\"Windspeedvalue\">Wind Speed (mph): </label><br/>
							<input type=\"number\" id=\"Windspeedvalue\" name=\"Windspeedvalue\"></p><br/>
							<label for=\"height\">Height(cm):</label><br/><input type=\"number\" id=\"height\" name=\"height\"></p><br/>
							<label for=\"weight\">Weight(Kg):</label><br/><input type=\"number\" id=\"weight\" name=\"weight\"></p><br/></div>";
					}


error_reporting(E_ERROR | E_PARSE);
if (!empty($_POST['elevation']))//if elevation box is checked

	{
		$max=(integer)($_POST["distance"]/$_POST["laplength"]); //get the number of laps useful for iteration
		echo "<div class=\"floating-box\">";
			for($counter=1;$counter<=$max;$counter++)
				{
					if((!empty($_POST['elevation'])&&(empty($_POST['windspeed'])))) //if there is only elevation
						{
							echo "<label for=\"ElevationLap\">Elevation(%) Lap $counter</label><br/>";
							echo "<input type=\"double\" id=\"$counter\" name=\"boxes[]\">";
							echo "<br/>";
						}//creates boxes for elevation values
					elseif ((!empty($_POST['elevation']))&&(!empty($_POST['windspeed']))) //if both elevation and windspeed are selected output elevation and windspeed boxes
						{
							echo "<label for=\"ElevationLap\">Elevation (%) Lap $counter</label>";
							echo "<input type=\"double\" id=\"$counter\" name=\"WindDirectionElevation[]\">";
							echo "<br/>";

							echo "<label for=\"WindDirectionElevation\">Wind Direction Lap $counter:</label>";
							echo "<select name=\"WindDirectionElevation[]\">";
							echo  "<option value=\"\">Wind Direction...</option>";
							echo  "<option value=\"TailwindElevation\">Tailwind</option>";
							echo  "<option value=\"HeadwindElevation\">Headwind</option></select><br/>";
						};


				}
	};
if (!empty($_POST['windspeed'])||!empty($_POST['elevation'])) //if wind and elevation boxes are both checked
		{
			echo "<div class=\"submit\"><input type=\"submit\" name=\"elevationbutton\" value=\"SUBMIT HERE FOR ALTERED PACE\" id=\"submit\"></div>"; //submit button for when wind and elevation are selected
			echo "<br/></div>";
		};	
		
?>


</font>
</form>
</body>

</html>
