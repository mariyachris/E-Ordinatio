<?php
include 'subhead.php';
?>
<form method="post" action="">
<table id="table" class="table table-striped" align="center" style="width:500px">
<thead class="alert alert-danger">
<tr>
<th>Hall ticket no</th>
<th>Name</th>
<th>Present</th>
<th>Absent</th>

</tr>
</thead>
<tbody>

<?php
$uname=$_SESSION['uname'];
include("../connect.php");
$sele="SELECT * FROM `tb_seat_arr` INNER JOIN `tb_nominalroll` ON `tb_seat_arr`.`nr_nominalroll_id`=`tb_nominalroll`.`nr_nominalroll_id` WHERE `rh_room_no`=(SELECT `rh_room_no` FROM `tb_invigilation` WHERE `date`=CURDATE() AND `f_id`='$uname') and att_status='0' AND `date`=CURDATE() ORDER BY  `tb_nominalroll`.`nr_nominalroll_id`";
$sel=mysql_query($sele);
$num=mysql_num_rows($sel);
if($num>0)
{
    $i=1;
    while($se=mysql_fetch_array($sel))
    {
        ?>
			<tr>
			<td><?php print $se['nr_hallticket_id'];?></td>
			<td><?php print $se['nr_name'];?></td>
			<td>
			<input type="hidden" name="id<?php echo $i;?>" value="<?php echo $se['nr_nominalroll_id'];?>" >
			<input name="p<?php echo $i;?>" type="radio" value="Present"></td>
			<td><input name="p<?php echo $i;?>" type="radio" value="Absant"></td>
			</tr>
			<?php
			$i++;
			}
			}
		else
		{
		?>
		<tr>
			<td colspan="12">No records found</td>
		</tr>
		<?php
		}
		?>
		<input type="hidden" name="count" value="<?php echo $i;?>">
	</tbody>
	</table>
	<input type="submit" name="submit" value="DONE" style="margin-left:50%" class="btn btn-success"> 
	</form>
	<?php
if(isset($_POST['submit']))
{
	
	$i=$_POST['count'];
	include("../connect.php");
	for($j=1;$j<$i;$j++)
	{
		if(isset($_POST['p'.$j]))
		{
			$stud=$_POST['id'.$j];
			$atte=$_POST['p'.$j];
			$sql="update tb_seat_arr set att_status='$atte' where nr_nominalroll_id='$stud'";
			$sq=mysql_query($sql);
		}	
	}
	
	if($sq>0)
	{
		header("location:addattendence.php?m=List is make");
	}
	else
	{
		header("location:addattendence.php?m=error");
	}
	
}
?>
<?php 
    include "footer.php";
?>