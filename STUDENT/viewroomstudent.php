<?php
include 'subhead.php';
?>
<table class="table table-striped">
	<thead class="alert alert-success">
		<tr>
			<td>Date:</td>
			<td>Class Room</td>
			<td>From Time</td>
			
		</tr>
	</thead>
	<?php 
	   $uname=$_SESSION['uname'];
	   include '../connect.php';
	   $sql="SELECT * FROM `tb_seat_arr` WHERE `nr_nominalroll_id`=(SELECT `nr_nominalroll_id` FROM `tb_nominalroll` WHERE `nr_hallticket_id`=(SELECT `s_hallticket_id` FROM `tb_student` WHERE `s_email`='$uname'))";
	  // echo $sql;
	   $sq=mysql_query($sql);
	   while ($s=mysql_fetch_array($sq))
	   {
	?>
		<tr>
			<td><?php echo $s['date'];?></td>
			<td><?php echo $s['rh_room_no'];?></td>
			<td><?php echo $s['time'];?></td>
			
		</tr>
	<?php 
	   }
	?>
</table>
<?php 
include 'footer.php';
?>