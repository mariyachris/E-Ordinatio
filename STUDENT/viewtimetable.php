<?php
include 'subhead.php';
?>
<table class="table table-striped">
	<thead class="alert alert-success">
		<tr>
			<td>Date:</td>
			<td>Time</td>
			<td>Subject</td>
		</tr>
	</thead>
	<?php 
	   $uname=$_SESSION['uname'];
	   include '../connect.php';
	   $sql="SELECT * FROM `tb_timetable` WHERE `tt_sem` =(SELECT `s_sem` FROM `tb_student` WHERE `s_email`='$uname') AND `dept_id`=(SELECT `dept_id` FROM `tb_student` WHERE `s_email`='$uname')";
	   //echo $sql;
	   $sq=mysql_query($sql);
	   while ($s=mysql_fetch_array($sq))
	   {
	?>
		<tr>
			<td><?php echo $s['tt_date'];?></td>
			<td><?php echo $s['tt_time'];?></td>
			<td><?php echo $s['tt_subject'];?></td>
			
		</tr>
	<?php 
	   }
	?>
</table>
<?php 
include 'footer.php';
?>