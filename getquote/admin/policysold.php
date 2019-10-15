
	   <ul class="pager">
  <li class="previous"><a href="index.php?page=policysold&pagi=<?php echo $pagi;?>">Previous</a></li>
  <li class="next"><a href="index.php?page=policysold&pagi='<?php echo $last;?>'">Next</a></li>
</ul>
<table class="table table-hover table-striped table-bordered table-responsive">
	 
		<tr>
			<th>Sl No.</th>
			<th>Insurance Plan</th>
			<th>Insurer Company</th>
			<th>Customer Name</th>
			<th>Premium Duration</th>
			<th>Insurance Covered</th>
			 
		</tr>
		<?php
		 $d="select count(txn_id) from transaction";
						$v=mysqli_query($con,$d);
						
						$row=mysqli_fetch_row($v);
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
			
			$sql="select * from transaction inner join plans on transaction.id=plans.id inner join userinsurance on 
	transaction.email=userinsurance.email LIMIT $offset,$rec_limit";
	$query=mysqli_query($con,$sql);
	$inc=1;
		$i=1;
		 
			while($a=mysqli_fetch_array($query,MYSQLI_ASSOC))
			{
				?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $a['inputfield1']; ?></td>
					<td><?php echo $a['insurer']; ?></td>
					<td><?php echo $a['user_fname']," ".$a['user_lname']; ?></td>
					<td><?php echo $a['duration']; ?></td>
					<td><?php echo $a['sum_insured']; ?></td>
				</tr>
				<?php
				$i++;
				$inc++;
			}
		?>
		<tr>
					<?php
			   if( $pagi > 0 )
						 {
								 $last = $pagi - 2;
							  echo "<a href = \"index.php?page=policysold&pagi=$last\">Prev</a> |";
								echo "<a href = \"index.php?page=policysold&pagi=$pagi\">Next</a>";
								 
								 }
								 else if( $pagi == 0 )
								  {
							 echo "<a href='index.php?page=policysold&pagi=$pagi'>Next</a>";
								 }
								 else if( $left_rec < $rec_limit ) {
									$last = $pagi - 2;
									echo "<a href='index.php?page=policysold&pagi=$last'>Prev</a>";
						 }
				?></tr>
			
	 
	</table>
 