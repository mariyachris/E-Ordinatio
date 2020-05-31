<table class="table table-striped">
	<thead class="alert alert-success">
		<tr>
			<td>Hall ticket no:</td>
			<td>Name</td>
			<td>Email</td>
			<td>Department</td>
			<td>Semester</td>
		</tr>
	</thead>
	<?php 
	include '../connect.php';
	   $d=$_POST['d'];
	   $s=$_POST['s'];
	   $sql="SELECT * FROM `tb_student` INNER JOIN `tb_department` ON `tb_department`.`dept_id`=`tb_student`.`dept_id` WHERE `s_sem`='$s' AND `tb_student`.`dept_id`='$d'";
	   $sq=mysql_query($sql);
	   while ($s=mysql_fetch_array($sq))
	   {
	?>
		<tr>
			<td><?php echo $s['s_hallticket_id'];?></td>
			<td><?php echo $s['s_name'];?></td>
			<td><?php echo $s['s_email'];?></td>
			<td><?php echo $s['dept_name'];?></td>
			<td><?php echo $s['s_sem'];?></td>
		</tr>
	<?php 
	   }
	?>
</table>