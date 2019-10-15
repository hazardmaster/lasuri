<?php 

$id=$_GET['planid'];

$_SESSION['id']=$id;

$sql="select * from plans where id='".$id."'";

$query=mysqli_query($con,$sql);

$a=mysqli_fetch_array($query,MYSQLI_ASSOC);

$_SESSION['plan']= $a['inputfield1'];

$_SESSION['insurer']= $a['insurer'];

$_SESSION['sum']= $a['sum_insured'];

$_SESSION['duration']= 1;

$_SESSION['price']= $a['price'];

?>

<style>    

.whitebacks {

		background-color: white;

	}

 

  </style>

<div class="container whitebacks">

<br>

<br> 

<div class="well">

	<div class="row">

		<div class="col-sm-3">

				 Insurer:<h2><?php echo $a['insurer']; ?></h2>

		</div>

		<div class="col-sm-9">

			Plan Name:<h2 class="text text-danger"><?php echo $a['inputfield1']; ?></h2>

		</div>

	</div>

</div>

	<div class="row">

		<div class="col-sm-3">

		</div>

		<div class="col-sm-6">	

			<br>

			 

			

			<form>

				<label>Select Duration</label>

				<select class="form-control" onChange="changeprice(this.value);">

					<option value='1'>1 year</option>

					<option value='2'>2 year</option>

					<option value='3'>3 year</option>

				</select>				

				<h3> Sum Insured <span class="text-danger"><?php echo $a['sum_insured'];?></span></h3>	

				<h2 id="price">KES. <span class="text-primary" id="price1"><?php echo $a['price'];?></span></h2>

				<input type="hidden" id="oprice" value="<?php echo $a['price'];?>"/>

				<p class="text-right"><a href="index.php?page=confirmbooking" class="btn btn-success btn-lg">Procced  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="	glyphicon glyphicon-arrow-right"></span></a></p>

			</form>

			<script type="text/javascript">

	function changeprice(str)

		{

		var xmlhttp;

		if (window.XMLHttpRequest)

		{// code for IE7+, Firefox, Chrome, Opera, Safari

		xmlhttp=new XMLHttpRequest();

		}

		else

		{// code for IE6, IE5

		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

		}

		xmlhttp.onreadystatechange=function()

		{

		if (xmlhttp.readyState==4 && xmlhttp.status==200)

		{

		document.getElementById("price1").innerHTML=xmlhttp.responseText;

		}

		}

		var thea=document.getElementById("oprice").value;

		//alert(thea);

		//alert("hell");

		xmlhttp.open("GET","findprice.php?value="+str+"&price="+thea,true);

		xmlhttp.send();

		}

</script>

		</div>

	</div>

</div>