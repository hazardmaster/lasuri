<?php
	//code to add subcategory
	extract ($_POST);
	if(isset($add))
	{
		$sql="insert into plans values('','".$company."','".$field1."','".$field2."','".$field3."','".$field4."','".$catid."','".$subcatid."','".$price."','".$sum."')";
		if(mysqli_query($con,$sql))
		{
			header("location:index.php?page=plans");
		}
	}
	
?>
<script type="text/javascript">
 
		function showsubcategory(str)
		{
			//alert("hello");
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
		document.getElementById("test").innerHTML=xmlhttp.responseText;
		}
		}//alert(str)
		

		xmlhttp.open("GET","findsubcategory.php?id="+str,true);
		xmlhttp.send();
		}
</script>
		<div class="col-sm-12 text-left">
		   
		  <button class="btn btn-primary  "><a href="#" data-toggle="modal" data-target="#myModal" ><font color="white">
				Add Insurance Plans</font></a> </button> 
			 <form method="post">
				
				  <p class="text-right"> <input type="submit" class="btn btn-primary"  name="delete" value="Delete Selected Sub-Category"/></p> 
				    <p>
				   <table class="table table-responsive table-bordered">
					<tr class="warning">
						<th>	Sl.No.			</th>
						<th>	Category	</th>
						<th>	Sub-Category	</th>
						<th>	Insurance Company	</th>
						<th>	Annual Premium	</th>
						<th>	Sum Insured </th>
						<th>	Field1	</th>
						<th>	Field2	</th>
						<th>	Field3	</th>
						<th>	Field4	</th>						 
						<th>	Delete		</th>
						<th>	Modify		</th>						
					</tr>
					<hr/>
					<?php
						//delete subcategory
						 if(isset($_POST['delete']))
						{
							$id=implode(',',$_POST['id']);
							//echo $sid;
							//update values of subcategory table
							$data="delete from plans WHERE id in(".$id.")";
							mysqli_query($con,$data);	
							header('location:index.php?page=plans');
						}
						if(isset($_GET['pagi']))
							{
								$pagi=$_GET['pagi'];
							}
							else
							{
								$pagi=1;
							}
							$d="select count(id) from plans";
							$res=mysqli_query($con,$d) or trigger_error("SQL",E_USER_ERROR);
							$row=mysqli_fetch_row($res);
							$nrow=$row[0];
							$rlimit=5;
							$lpage=ceil($nrow/$rlimit);
							echo $lpage;
							$pagi=(int)$pagi;
							if($pagi>$lpage)
							{
								$pagi=$lpage;
							}
							if($pagi<1)
							{
								$pagi=1;
							}
							$limit='LIMIT '.($pagi-1)*$rlimit.','.$rlimit;
							echo $limit;
							//$data1="SELECT * FROM plans INNER JOIN subcategory ON subcategory.subcat_id=plans.subcat_id INNER JOIN category ON plans.cat_id=category.cat_id $limit";
							//echo $data1;
							$va=mysqli_query($con,$data1);
							$i="1";
							$r=mysqli_fetch_assoc($va);
							while($r)
							{
								//print_r($r);
								echo "<tr>";
									 
									echo "<td>".$i."</td>";
									echo "<td>".$r['cat_name']."</td>";
									echo "<td>".$r['subcat_name']."</td>";
									echo "<td>".$r['insurer']."</td>";
									echo "<td> Rs. ".$r['sum_insured']."</td>";
									echo "<td> Rs. ".$r['price']."</td>";
									echo "<td>".$r['inputfield1']."</td>";
									echo "<td>".$r['inputfield2']."</td>";
									echo "<td>".$r['inputfield3']."</td>";
									echo "<td>".$r['inputfield4']."</td>";
									echo "<td> <input type='checkbox' name='id[]' value='".$r['id']."'/></td>";
									echo "<td> <a href='index.php?page=editplan&id=".$r['id']."'>
									Edit</a></td>";
									 
								echo "</tr>";
								$i++;
							}
							if($pagi==1)
							{
								//echo "FIRST PREV<br>";
							}
							else
							{
								echo "<a href = 'index.php?page=plans&pagi=1'>First</a>";
								$prevp=$pagi-1;
								echo "<a href = 'index.php?page=plans&pagi='$prevp'>Prev</a>";
							}
							// echo "(page '$pagi' of '$lpage')";
							if($pagi==$lpage)
							{
								//echo "sNext LAST";
							}
							else
							{
								$nextp=$pagi+1;
								echo "<a href = 'index.php?page=plans&pagi=$nextp'>Next</a>";
								echo "<a href = 'index.php?page=plans&pagi=$lpage'>Next</a>";
								
							}
						?>
					<tr>
					<?php
			   
				?></tr>
					
				   </table>
 
				  </form>
		  
		</div>
  <!--Modal for adding category-->
 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="modal-title text-primary text-center">Add Insurance Plans</h2>
        </div>
        <div class="modal-body">
            <?php 
			
			$sq="select * from category";
			$qu=mysqli_query($con,$sq);
			?>
			<form role="form" method="post" enctype="multipart/form-data">
				<div class="form-group">
				  <label for="category">Select Category:</label>
				  <select class="form-control" id="category" name="catid" onChange=showsubcategory(this.value)>
				  	<option value="0">No selection</option>
					<?php					
						while($m=mysqli_fetch_array($qu,MYSQLI_ASSOC))
						{
							echo "<option value='".$m['cat_id']."'>".$m['cat_name']."</option>";
						}
				   ?>
				   </select>
			   </div>
			   <label for="subcategory">Select Sub-Category:</label>
				<p id="test">					
					<select  class="form-control" name="subcatid" id="subcategory">
						<option value="0">No Selection</option>
					</select>
				</p>			   
			   <div class="form-group">
				  <label for="company">Insurance Company</label>
				  <input type="text" class="form-control" id="company" name="company" 
				  placeholder="Enter Insurance Company Name" required="required">
			   </div>
				<div class="form-group">
				<div class="row">
				<div class="col-sm-6">
					<label for="sum">Sum Insured</label>
				  <input type="number" class="form-control" id="sum" name="sum" 
				  placeholder="Enter Sum Insured." required="required">
				</div>
				<div class="col-sm-6">
					<label for="price">Annual prmium</label>
				  <input type="number" class="form-control" id="price" name="price" 
				  placeholder="Enter price for one year." required="required">
				</div>
				</div>
				  
			   </div>			   
			   
			   <div class="form-group">
				  <label for="fiel1">Field 1:</label>
				  <textarea class="form-control" name="field1" id="field1">
				  
				  </textarea>
			   </div>
			   <div class="form-group">
				  <label for="fiel2">Field 2:</label>
				  <textarea class="form-control" name="field2" id="field2">
				  
				  </textarea>
			   </div>
			   <div class="form-group">
				  <label for="field3">Field 3:</label>
				  <textarea class="form-control" name="field3" id="field3">
				  
				  </textarea>
			   </div>
			   <div class="form-group">
				  <label for="fiel4">Field 4:</label>
				  <textarea class="form-control" name="field4" id="field4">
				  
				  </textarea>
			   </div>
			   
			   
				 
        <div class="modal-footer">
			<input type="submit" class=" btn btn-primary" value="Add Insurance Plan" name="add"/>
			</form> 
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
<!-- modal ends here -->