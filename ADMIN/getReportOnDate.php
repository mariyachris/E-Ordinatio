<?php
$dre=$_POST['r'];
//echo $dre;
?>
<h1 style="text-align:center;padding:20px;font-weight:bold">INVIGILATION DUTY REPORT</h1>
<table class="table table-striped">
	<tr>
		<th>Day</th>	
		<th>Hall</th>
		<th>Staff</th>
		<th>AN/FN</th>
		<th>Department</th>
	</tr>
	<tr>
	<?php
	include("../connect.php");
$sel="SELECT  * FROM  `tb_invigilation` INNER JOIN `tb_faculty_register`  ON `tb_invigilation`.`f_id`=`tb_faculty_register`.`f_email` INNER JOIN `tb_department` ON `tb_faculty_register`.`dept_id`=`tb_department`.`dept_id`  WHERE `tb_invigilation`.`date`='$dre'";
$exe=mysql_query($sel);
while($row=mysql_fetch_array($exe))
{
	
	?>
	<th><?php echo $row[3]?></th>
	<th><?php echo $row[2]?></th>
	<th><?php echo $row[7]?></th>
	<th><?php
	$f_time=$row[4];
	if($f_time>='10:00:00' && $f_time<='1:00:00')
	{
		echo "FN";
	}
	else if($f_time>='1:00:00')
	{
	echo "AN";
	}
	
	
	?></th>
	<th><?php echo $row[14]?></th>




	
	</tr>
<?php
}
?>
</table>