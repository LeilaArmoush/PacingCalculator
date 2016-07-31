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
<font color="#000000">
<div class="header">
<font size="8px">
<center>PACE CALCULATOR </center>
</font>
</div>
<div class= "top-box">
<h2>Rules for Use</h2>
<!--header box with instructions -->
<ul>
   <li>The total elevation assumes a course that starts and finishes in the same place so the summation of the elevation must be 0!</li>
   <li>The total windspeed assumes a course that starts and finishes in the same place so there must be an equal number of headwind and tailwind speeds</li>
</ul>
</div>
<!--Prelimiary calculations form-->
<div class= "floating-box">
<p>
<form action="WindEleForm.php"
method="POST">
<h3>1. Setting Parameters if there is wind or elevation</h3>
<input type="checkbox" id="checkbox" name="windspeed" value="windspeed">
<label for="windspeed">Any Wind?</label></p>
<input type="checkbox" id="elevation" name="elevation" value="elevation">
<label for="elevation">Elevation?</label></p>
<p><label for="distance">Distance: </label><br/>
<input type="double" id="distance" name="distance"></p>
<p><label for="laplength">Lap Distance: </label><br/>
<input type="double" id="laplength" name="laplength"></p>
<p><label for="minutes">Minutes: </label><br/>
<input type="number" id="minutes" name="minutes"></p>
<p><label for="seconds">Seconds: </label><br/>
<input type="number" id="seconds" name="seconds"></p>
 <input type="hidden" name="submit" value="" id="submitother" >
<p><label for="Units">Units: </label>
<select name="Units"><br/>
  <option value="">Select...</option>
  <option value="Metres">Metres</option>
  <option value="Kilometres">Kilometres</option>
  <option value="Miles">Miles</option><br/></p>
<input type="submit" name="submit" value="SUBMIT HERE IF WIND OR ELEVATION IS SELECTED" id="submit" >

</form>
<!-- Time calculations -->
</div>
</div>
<div class= "floating-box">
<form action="FlatTime.php"
method="POST">
<h3>2. Setting Parameters for a flat windless course</h3>
<p><label for="distance">Distance: </label><br/>
<input type="double" id="distance" name="distance"></p>
<p><label for="laplength">Lap Distance: </label><br/>
<input type="double" id="laplength" name="laplength"></p>
<p><label for="Units">Units: </label>
<select name="Units"><br/>
  <option value="">Select...</option>
  <option value="Metres">Metres</option>
  <option value="Kilometres">Kilometres</option>
  <option value="Miles">Miles</option>
</select><br/></p>
<p><label for="minutes">Minutes: </label><br/>
<input type="number" id="minutes" name="minutes"></p>
<p><label for="seconds">Seconds: </label><br/>
<input type="number" id="seconds" name="seconds"></p>
 <input type="hidden" name="submit" value="" id="submitother" >
 <input type="submit" name="submit" value="SUBMIT FOR FLAT TIME WITH NO WIND" id="submit" >
 </form>
</p>
</body>
</html>