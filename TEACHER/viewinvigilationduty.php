<?php
include 'subhead.php';
?>
<table class="table table-striped">
	<thead class="alert alert-success">
		<tr>
			<td>Date:</td>
			<td>Class Room</td>
			<td>From Time</td>
			<td>To Time</td>
		</tr>
	</thead>
	<?php 
	   $uname=$_SESSION['uname'];
	   include '../connect.php';
	   $sql="SELECT * FROM `tb_invigilation` WHERE DATE>=CURDATE() AND `f_id`='$uname'";
	   $sq=mysql_query($sql);
	   while ($s=mysql_fetch_array($sq))
	   {
	?>
		<tr>
			<td><?php echo $s['date'];?></td>
			<td><?php echo $s['rh_room_no'];?></td>
			<td><?php echo $s['ftime'];?></td>
			<td><?php echo $s['ttime'];?></td>
		</tr>
	<?php 
	   }
	?>
</table>
<?php 
include 'footer.php';
?>