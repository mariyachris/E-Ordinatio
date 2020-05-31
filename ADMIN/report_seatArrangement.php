<?php
include("subhead.php");
?>
<h1>SEAT ARRANGEMENT</h1>
<table>
	<tr>
		<th>Register Numbers</th>
		<th>Room Number</th>
	
	</tr>
	<tr>
		<?php
			include("../connect.php");
			$sel="SELECT DISTINCT `tb_nominalroll`.`nr_hallticket_id`,`tb_seat_arr`.`rh_room_no` FROM `tb_seat_arr` INNER JOIN `tb_nominalroll` ON `tb_seat_arr`.`nr_nominalroll_id`=`tb_seat_arr`.`nr_nominalroll_id` WHERE `tb_seat_arr`.`date`='2019-02-24'  GROUP BY `tb_seat_arr`.`rh_room_no`";
			$exe=mysql_query($sel);
			while($row=mysql_fetch_array($exe))
			{
			//echo $row[1];
			$sele="SELECT * FROM `tb_nominalroll` INNER JOIN `tb_seat_arr` ON `tb_nominalroll`.`nr_nominalroll_id`=`tb_seat_arr`.`nr_nominalroll_id` WHERE `tb_seat_arr`.`rh_room_no`='$row[1]' AND `tb_seat_arr`.`date`='2019-02-24'";
		$e=mysql_query($sele);
		while($fetch=mysql_fetch_array($e))
		{	
			$str=$fetch[1];
			$str1=$str.",";
		?>
	<td><?php echo $row[1]?></td>
	<td><?php echo $str1;?></td>
	</tr>
<?php
}}
?>

</table>
<?php
include("footer.php");
?>