<?php
include("subhead.php");
?>
<style>
.atag
{
    outline: none;
    padding: .8em 4em;
    font-size: 1em;
    color: #fff;
    border: none;
    background-color: #49c7ed;
    border:1px solid #49c7ed;
	-webkit-transition:.5s all;
	-moz-transition:.5s all; 
	transition:.5s all;
}
.atag:hover{
    background: transparent;
    color: #4CAF50;
}

</style>
<?php
include("../connect.php");
$uid=$_SESSION['uname'];
$sql="SELECT `tb_student`.*,`tb_department`.`dept_name` FROM `tb_student` INNER JOIN `tb_department` ON `tb_student`.`dept_id`=`tb_department`.`dept_id`  WHERE `tb_student`.`s_email`='$uid'";
//echo $sql;
$sq=mysql_query($sql);
$val=mysql_fetch_assoc($sq);
?>
<h1 style="color: #31708f;font-weight:bold" align="center">PROFILE</h1>

<div class="container">
    <!--<div class="row profile">
		<div class="col-md-12">
			<div class="profile-sidebar">
				
				<!-- SIDEBAR USER TITLE -->
			<!--	<div class="profile-usertitle" style="margin-left: 491px;">
					<div class="profile-usertitle-name">
						<?php echo $val['s_name'];?>
					</div>
					<div class="profile-usertitle-job">
						<?php echo $val['s_mob'];?>
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR MENU -->
				<!--<div class="profile-usermenu" style="width: 200px;float:  left;margin-left: 391px;">
					<ul class="nav">
						<li style="width: 232px;">
							<a title="Branch name">
							<i class="glyphicon glyphicon-asterisk"></i>
							<?php echo $val['s_hallticket_id'];?> </a>
						</li>
						<li style="width: 232px;">
							<a title="Date of birth">
							<i class="glyphicon glyphicon-calendar"></i>
							<?php echo $val['s_email'];?> </a>
						</li>
						<li style="width: 232px;">
							<a title="Gender" target="_blank">
							<i class="glyphicon glyphicon-user"></i>
							<?php echo $val['dept_name'];?></a>
						</li>
					</ul>
				</div>
			</div>
		</div>			
		<div>	
		<a href="editprofile.php?id=<?php echo $val['s_email'];?>" class="atag" style="margin-left: 495px;">Edit Profile</a>
		</div>
	</div>-->

	<table style="width: 58%;margin-left:25%">
		<tr>
			<td style="width: 136px; height: 39px">Name</td>
			<td style="height: 39px; width: 75px;">:</td>
			<td style="height: 39px"><?php echo $val['s_name']?></td>
		</tr>
		<tr>
			<td style="width: 136px; height: 37px">Contact</td>
			<td style="height: 37px; width: 75px;">:</td>
			<td style="height: 37px"><?php echo $val['s_mob']?></td>
		</tr>
		<tr>
			<td style="width: 136px; height: 42px;">Email</td>
			<td style="height: 42px; width: 75px">:</td>
			<td style="height: 42px"><?php echo $val['s_email']?></td>
		</tr>
		<tr>
			<td style="width: 136px; height: 50px">Register No</td>
			<td style="height: 50px; width: 75px;">:</td>
			<td style="height: 50px"><?php echo $val['s_hallticket_id']?></td>
		</tr>
		<tr>
			<td style="width: 136px; height: 38px">Department</td>
			<td style="height: 38px; width: 75px;">:</td>
			<td style="height: 38px"><?php echo $val['dept_name']?></td>
		</tr>
		<tr>
			<td style="width: 136px; height: 40px">Semester</td>
			<td style="height: 40px; width: 75px;">:</td>
			<td style="height: 40px"><?php echo $val['s_sem']?></td>
		</tr>
		<tr>
			<td style="width: 136px">&nbsp;</td>
			<td style="width: 75px">&nbsp;</td>
			<td><a href="editprofile.php?id=<?php echo $val['s_email'];?>" class="atag">Edit Profile</a>
</td>
		</tr>
	</table>

</div>

<br>
<br>         

<?php
include("footer.php");
?>