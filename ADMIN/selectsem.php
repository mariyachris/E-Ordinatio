<?php
include("subhead.php");
?>
<p style="font-size:x-large;color:#3366CC;text-align:center;padding-bottom:10px;">Login</p>


<form action="" method="post">
	<table style="width: 27%; height: 97px;" align="center">
		<tr>
			
			    <?php 
				$dep=$_GET['dep'];
				$sp=explode("-",$dep);
				$lengthsp=count($sp);
				for($i=0;$i<$lengthsp;$i++)
				{
				?>
				<td><?php print $sp[$i]?></td>
			<td><select name="Select<?php print $i ?>" style="width: 73px">
			<option value="">Select</option>
			<option value="I sem">sem1</option>
			<option value="II sem">sem2</option>
			<option value="III sem">sem3</option>
			<option value="IV sem">sem4</option>
			<option value="V sem">sem5</option>
			<option value="VI sem">sem6</option>

			</select>&nbsp;</td>
		</tr>
		<?php
		}
		?>
		
			<tr>
			<td>&nbsp;</td>
			<td><input name="Submit1" type="submit" value="submit" />&nbsp;</td>
		</tr>
	</table>
</form>
<?php
if(isset($_POST['Submit1']))
{

	for($i=0;$i<$lengthsp;$i++)
	{
		if($i==0)
		{
			$examsem=$sp[$i].":".$_POST['Select'.$i];
		}
		else
		{
			$examsem.="|".$sp[$i].":".$_POST['Select'.$i];
		}
	}
	print "$examsem";
	
	echo"<script>window.location.href='seatarrangecode.php?examsem=$examsem&count=$lengthsp';</script>";

}
?>
<?php
include("footer.php");
?>


