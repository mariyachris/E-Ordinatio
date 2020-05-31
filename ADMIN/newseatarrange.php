<?php
include("subhead.php");
?>
<p style="font-size:x-large;color:#3366CC;text-align:center;padding-bottom:10px;">Seat Arrange</p>

<form action="" method="post">
	<table style="width: 43%; height: 175px;" align="center">
		<tr>
			<td>Department</td>
			<td><fieldset name="Group1">
			<legend>Including Department</legend>
			<?php
			include("../connect.php");
			$sel=mysql_query("select distinct(nr_course) from `tb_nominalroll`");
			while($fet=mysql_fetch_row($sel))
			{
			?>
			<input name="ch[]" type="checkbox" value="<?php print $fet[0]?>"/><?php print $fet[0] ?><br/>
			<?php
			}
			?>
			</fieldset>&nbsp;</td>
		</tr>
		
		<tr>
			<td>&nbsp;</td>
			<td><input name="Submit1" type="submit" value="submit" /></td>
		</tr>
	</table>
</form>
<?php
if(isset($_POST['Submit1']))
{
$dep="";
foreach($_POST['ch'] as $val)
{
if($dep=="")
{
$dep=$val;
}
else
{
$dep.="-".$val;
}
}
print $dep;
$edate=$_POST['examdate'];
echo"<script>window.location.href='selectsem.php?dep=$dep';</script>";
}
?>
<?php
include("footer.php");
?>
