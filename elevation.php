<?php
$width=3000;
$height=300;
$distance=$_POST['distance'];
$newvalue=0;
$MyImage=ImageCreate(1000,300);
$black=ImageColorAllocate($MyImage,183,225,255);
$white=ImageColorAllocate($MyImage,0,64,0);
$xstart=0;
$xend=0;
$ystart=$height;
foreach($_POST['boxes'] as $i=>$value)
	{
$yend=0;

	//echo $i."<br/>";
	//echo "ystart".$ystart."<br/>";
	
	//$xstart=$distance*$i;
	//echo "xstart".$xstart."<br/>";
	
	//echo "xend:".$xend."<br/>";
	$yend=($height/2)-$value;
	
	
	$xend=($distance/2)*($i+1);
	

	//echo "yend:".$yend."<br/>";
	Imageline($MyImage,$xstart,$ystart,$xend,$yend,$white);
	$ystart=$yend;
	$xstart=$xend;
	}
header("Content-type: image/gif");
Imagegif($MyImage);
ImageDestroy($MyImage);


?>

		