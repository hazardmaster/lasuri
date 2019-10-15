<?php
	//code to add category
	extract ($_POST);
	if(isset($add))
	{
		$sql="insert into category values('','".$category."')";
		if(mysqli_query($con,$sql))
		{
			header("location:index.php?page=category");
		}
	}

?>
	<div class="col-sm-8 text-left">
		 <form method="post">
				   <table class="table table-bordered table-responsive">
					<tr class="active">
					 <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add new category</a>
					</tr>
					<tr class="warning">
						<th>	Id			</th>
						<th>	Category	</th>						 
						<th>	Delete		</th>
						<th>	Modify		</th>
						 
						
					</tr>
					<hr/>
					<?php
						//connect database 
						 
							  					  
						//select all values from category table
						$data="SELECT * FROM category";
						 
						 //delete category
						 if(isset($_POST['delete']))
						{
							$id=implode(',',$_POST['id']);
							//echo $id;
							//update values of category table
							$data="delete from category WHERE cat_id in(".$id.")";
							mysqli_query($con,$data);	
							header('location:index.php?page=category');
						}
						
						$val=mysqli_query($con,$data);
						$i="1";		
						while($r=mysqli_fetch_array($val,MYSQLI_ASSOC))
						{
							$catname=$r['cat_name'];
							 
							echo "<tr>";
								echo "<td>".$i."</a></td>";
								echo "<td>".$r['cat_name']."</a></td>";
								 
								echo "<td> <input type='checkbox' name='id[]' value='".$r['cat_id']."'/></td>";
								echo "<td> <a href='index.php?page=editcategory&catid=".$r['cat_id']."'>
								Edit</a></td>";
								//$_SESSION['catid']=$r['cat_id'];
							echo "</tr>";
							$i++;
						}
						
						 
					?>
					
					<tr><td colspan="4"><input type="submit" class="btn btn-primary" name="delete" value="Delete Selected"/></td></tr>
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
          <h2 class="modal-title text-primary text-center">Add Category</h2>
        </div>
        <div class="modal-body">
            
			<form role="form" method="post" enctype="multipart/form-data">
				<div class="form-group">
				  <label for="category">Category Name:</label>
				  <input type="text" class="form-control" id="category" name="category" 
				  placeholder="Enter category name" required="required">
			   </div>
			   
			   
				 
        <div class="modal-footer">
			<input type="submit" class=" btn btn-primary" value="Add Category" name="add"/>
			</form> 
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
<!-- modal ends here -->