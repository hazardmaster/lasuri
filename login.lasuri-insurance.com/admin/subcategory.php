<?php
	//code to add subcategory
	extract ($_POST);
	if(isset($add))
	{
		$sql="insert into subcategory values('','".$subcategory."','".$categoryid."','".$field1."','".$field2."','".$field3."','".$field4."','".$field5."')";
		if(mysqli_query($con,$sql))
		{
			header("location:index.php?page=subcategory");
		}
	}
	
?>
		<div class="col-sm-12 text-left">
		  
		  
			 <form method="post">
					<button class="btn btn-primary  "><a href="#" data-toggle="modal" data-target="#myModal" ><font color="white">
				Add  Sub-Category</font></a> </button>
				  <p class="text-right"> <input type="submit" class="btn btn-primary"  name="delete" value="Delete Selected Sub-Category"/></p> 
				    <p>
				   <table class="table table-bordered table-responsive">
					<tr class="warning">
						<th>	Id			</th>
						<th>	Category	</th>
						<th>	Sub-Category	</th>
						<th>	Field 1	</th>
						<th>	Field 2	</th>
						<th>	Field 3	</th>
						<th>	Field 4	</th>
						<th>	Field 5	</th>						 
						<th>	Delete		</th>
						<th>	Modify		</th>						
					</tr>
					<hr/>
					<?php
						//delete subcategory
						 if(isset($_POST['delete']))
						{
							$sid=implode(',',$_POST['sid']);
							//echo $sid;
							//update values of subcategory table
							$data="delete from subcategory WHERE subcat_id in(".$sid.")";
							mysqli_query($con,$data);	
							header('location:index.php?page=subcategory');
						}
						
						$d="select count(subcat_id) from subcategory";
						$v=mysqli_query($con,$d);
						
						$row=mysqli_fetch_array($v,MYSQL_NUM);
						$rec_count=$row[0];	
							$rec_limit=10;
         if( isset($_GET{'pagi'} ) )
			 {
            $pagi = $_GET{'pagi'} + 1;
            $offset = $rec_limit * $pagi ;
         }else {
            $pagi = 0;
            $offset = 0;
         }
         
		 
         $left_rec = $rec_count - ($pagi * $rec_limit);
		$data1="SELECT * FROM subcategory INNER JOIN category ON subcategory.cat_id=category.cat_id LIMIT $offset, $rec_limit";
						$val1=mysqli_query($con,$data1);
						$inc=1;
						$i=1;		
						while($r=mysqli_fetch_array($val1,MYSQLI_ASSOC))
						{
							echo "<tr>";
								 
								echo "<td>".$i."</td>";
								echo "<td>".$r['cat_name']."</td>";
								echo "<td>".$r['subcat_name']."</td>";
								echo "<td>".$r['field1']."</td>";
								echo "<td>".$r['field2']."</td>";
								echo "<td>".$r['field3']."</td>";
								echo "<td>".$r['field4']."</td>";
								echo "<td>".$r['field5']."</td>";
								echo "<td> <input type='checkbox' name='sid[]' value='".$r['subcat_id']."'/></td>";
								echo "<td> <a href='index.php?page=editsubcategory&sid=".$r['subcat_id']."'>
								Edit</a></td>";
								 
							echo "</tr>";
							$i++;
							$inc++;
						}
					?>
					<tr>
					<?php
			   if( $pagi > 0 )
						 {
								 $last = $pagi - 2;
							  echo "<a href = \"index.php?page=subcategory&pagi=$last\">Prev</a> |";
								echo "<a href = \"index.php?page=subcategory&pagi=$pagi\">Next</a>";
								 
								 }
								 else if( $pagi == 0 )
								  {
							 echo "<a href='index.php?page=subcategory&pagi=$pagi'>Next</a>";
								 }
								 else if( $left_rec < $rec_limit ) {
									$last = $pagi - 2;
									echo "<a href='index.php?page=subcategory&pagi=$last'>Prev</a>";
						 }
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
          <h2 class="modal-title text-primary text-center">Add Sub-Category</h2>
        </div>
        <div class="modal-body">
            <?php 
			
			$sq="select * from category";
			$qu=mysqli_query($con,$sq);
			?>
			<form role="form" method="post" enctype="multipart/form-data">
				<div class="form-group" >
				  <label for="category">Select Category:</label>
				  <select class="form-control" id="category" name="categoryid">
				   <?php
						while($m=mysqli_fetch_array($qu,MYSQLI_ASSOC))
						{
							echo "<option value='".$m['cat_id']."'>".$m['cat_name']."</option>";
						}
				   ?>
				   </select>
			   </div>		
			   <div class="form-group">
				  <label for="subcategory">Sub-Category Name:</label>
				  <input type="text" class="form-control" id="subcategory" name="subcategory" 
				  placeholder="Enter Sub-category name" required="required">
			   </div>
			   <div class="form-group">
				  <label for="field1">Field 1:</label>
				  <input type="text" class="form-control" id="field1" name="field1" 
				  placeholder="Enter field 1 name" required="required">
			   </div>
			   <div class="form-group">
				  <label for="field2">Field 2:</label>
				  <input type="text" class="form-control" id="field2" name="field2" 
				  placeholder="Enter field 2 name" required="required" >
			   </div>
			   <div class="form-group">
				  <label for="field3">Field 3:</label>
				  <input type="text" class="form-control" id="field3" name="field3" 
				  placeholder="Enter field 3 name" required="required">
			   </div>
			   <div class="form-group">
				  <label for="field4">Field 4:</label>
				  <input type="text" class="form-control" id="field4" name="field4" 
				  placeholder="Enter field 4 name" required="required">
			   </div>
			   <div class="form-group">
				  <label for="field5">Field 5:</label>
				  <input type="text" class="form-control" id="field5" name="field5" 
				  placeholder="Enter field 5 name" required="required">
			   </div>
			   
				 
        <div class="modal-footer">
			<input type="submit" class=" btn btn-primary" value="Add Sub-Category" name="add"/>
			</form> 
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
		
      </div>
      
    </div>
  </div>
  
</div>
<!-- modal ends here -->