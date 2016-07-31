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
<?php

	function outtable($d,$l,$m,$s)//function used for simple pace calculations
		{
			$max=$d/$l;//number of laps is distance over time useful in for loop
			$totalseconds=($m*60)+($s);//total seconds calculated
			$paceinseconds=$totalseconds/$max;//pace per lap calculated by diving by the number of laps
			$maxint=(integer)$max;//to make max in for loop

			for($counter=1;$counter<=$maxint;$counter++)//loops through the values adding time for new lap on each time
				{
					$distanceSoFar=($l*$counter);//distance through race at the point of the time given
					$perunitseconds=($totalseconds/$d)*$l;//number of seconds per lap (time/distance)*laplength
					$tempperunitseconds=$perunitseconds*$counter;//seconds so far is the number of laps covered * pace per lap
					$tempminutes=($tempperunitseconds/60);//to get the display minutes divide seconds by 60
					$outminutes=(integer)$tempminutes;//then only take the value before the decimal
					$outseconds=(integer)(($tempminutes-$outminutes)*60);//calculates the number of seconds leftover to display as seconds
					$units=$_POST['Units'];//Units for display

					//prints row to screen
					printf("<tr><td><font color=\"#000000\">%02s</td><td><font color=\"#000000\">%02s %s</td><td><font color=\"#000000\">%02s.%02s</td></td>",$counter,$distanceSoFar,$units,$outminutes,$outseconds);
				}
	
			echo "</table></div></font>"; //end of table
		}
if (empty($_POST['windspeed'])&&(empty($_POST['elevation'])))//both wind and elevation values are not checked
	{
		if(!empty($_POST['distance']))//and there is a value in the distance field
			{
				echo "<table><font color=\"#000000\">";//table header
				echo "<tr><th><font color=\"#000000\">Lap Number</th><th><font color=\"#000000\">Distance Covered</th><th><font color=\"#000000\">Time</th></tr>";
			};
	outtable($_POST['distance'], $_POST['laplength'],$_POST['minutes'],$_POST['seconds']);//output table from function
	}
?>