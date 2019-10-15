<?php
session_start();
$value=$_GET['value'];
$price=$_GET['price'];
 if($value==1)
{
	$price=$price*1;
	$_SESSION['duration']=21;	
	$_SESSION['price']=$price;	
	echo $price;
}
else if($value==2)
{
	$price=$price*2;
	$_SESSION['duration']=2;	
	$_SESSION['price']=$price;
	echo $price;
	 
}
else if($value==3)
{
	$_SESSION['duration']=3;	
	$price=$price*3;
	$_SESSION['price']=$price;
	echo $price;
}
?>