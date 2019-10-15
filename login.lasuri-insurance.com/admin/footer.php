
	<div class="col-sm-8 text-left">
		 <form method="post">
				   <table class="table table-bordered table-responsive">
					
					<tr class="warning">
						<th>	Title			</th>
						<th>	Link	</th>						 
						
						<th>	Modify		</th>
						 
						
					</tr>
					<?php
						//connect database 
						 
							  					  
						//select all values from category table
						$data="SELECT * FROM footer";
						 
						 
						
						$val=mysqli_query($con,$data);
						$i="1";		
						while($r=mysqli_fetch_array($val,MYSQLI_ASSOC))
						{
							
							 
							echo "<tr>";
								
								echo "<td>".$r['text']."</a></td>";
								echo "<td>".$r['link']."</a></td>";
								
								
								echo "<td> <a href='index.php?page=editfooter&id=".$r['id']."'>
								Edit</a></td>";
								//$_SESSION['catid']=$r['cat_id'];
							echo "</tr>";
							
						}
						
						 
					?>
					
					
				   </table>
				   
				   
				  </form>
		  
		</div>