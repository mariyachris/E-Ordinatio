<?php
include 'subhead.php';
?>
<table class="table table-striped">
	<thead class="alert alert-success">
		<tr>
			<td>Hall ticket no</td>
			<td>college name</td>
			<td>Student name</td>
			<td>Course</td>
			<td>Semester</td>
			<td>Attendance status</td>
		</tr>
	</thead>
	<?php 
	   $uname=$_SESSION['uname'];
	   include '../connect.php';
	   $sql="SELECT * FROM `tb_seat_arr` INNER JOIN `tb_nominalroll` ON `tb_seat_arr`.`nr_nominalroll_id`=`tb_nominalroll`.`nr_nominalroll_id` WHERE `rh_room_no`=(SELECT `rh_room_no` FROM `tb_invigilation` WHERE `date`=CURDATE() AND `f_id`='$uname') AND `date`=CURDATE() ORDER BY  `tb_nominalroll`.`nr_nominalroll_id`";
	   $sq=mysql_query($sql);
	   while ($s=mysql_fetch_array($sq))
	   {
	?>
		<tr>
			<td><?php echo $s['nr_hallticket_id'];?></td>
			<td><?php echo $s['nr_clgname'];?></td>
			<td><?php echo $s['nr_name'];?></td>
			<td><?php echo $s['nr_course'];?></td>
			<td><?php echo $s['nr_sem'];?></td>
			<?php if($s['att_status']=="Absant"){?>
			<td style="color: red;font-weight: bold;"><?php echo $s['att_status'];?></td>
			<?php }
			else {
			?>
			<td style="color: green;font-weight: bold;"><?php echo $s['att_status'];?></td>
			<?php }?>
		</tr>
	<?php 
	   }
	?>
</table>
<?php 
include 'footer.php';
?>