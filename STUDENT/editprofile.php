<?php
include 'subhead.php';
?>
<?php 
include '../connect.php';
$id=$_GET['id'];
$profile="select * from tb_student where s_email='$id'";
//echo $profile;
$pro=mysql_query($profile);
$p=mysql_fetch_array($pro);
?>
<div class="form-style-5">
	<form action="" method="post">
		<fieldset>
			<legend>
				<span class="number">1</span> Candidate Info
			</legend>
			<input type="text" name="name" placeholder="Your Name *" value="<?php echo $p['s_name'];?>"> 
			<select id="sem" name="sem">
              <option value="">--Select Semester--</option>
           	  <option <?php if($p['s_sem']=="I Sem"){?> selected="selected"<?php }?>>I Sem</option>
           	  <option <?php if($p['s_sem']=="II Sem"){?> selected="selected"<?php }?>>II Sem</option>
           	  <option <?php if($p['s_sem']=="III Sem"){?> selected="selected"<?php }?>>III Sem</option>
           	  <option <?php if($p['s_sem']=="IV Sem"){?> selected="selected"<?php }?>>IV Sem</option>
           	  <option <?php if($p['s_sem']=="V Sem"){?> selected="selected"<?php }?>>V Sem</option>
           	  <option <?php if($p['s_sem']=="VI Sem"){?> selected="selected"<?php }?>>VI Sem</option>
            </select>
			<input type="text" name="mob" placeholder="Your Mobile *" value="<?php echo $p['s_mob'];?>"> 
			<input type="text" name="Halid" placeholder="Hall ticket id *" value="<?php echo $p['s_hallticket_id'];?>"> 
				<input type="email" name="email" placeholder="Your Email *"  value="<?php echo $p['s_email'];?>" readonly="readonly"> 
				<label for="department">Department:</label> 
				<select id="dept" name="dept">
				<option value="">--Select Department--</option>
            <?php
            include '../connect.php';
            $sql = "select * from tb_department";
            $sq = mysql_query($sql);
            while ($s = mysql_fetch_array($sq)) {
                ?>
            	<option value="<?php echo $s[0];?>" <?php if($p['dept_id']==$s[0]){?> selected="selected" <?php }?>><?php echo $s[1];?></option>
            <?php
            }
            ?>
            </select>
		</fieldset>
		<input type="submit" value="Apply" name="submit" />
	</form>
</div>
<div id="snackbar">..Student added successfuly..</div>
<?php 
include 'footer.php';
?>

<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $mob = $_POST['mob'];
    $email = $_POST['email'];
    $sem = $_POST['sem'];
    $hallid = $_POST['Halid'];
    $dept = $_POST['dept'];
    $pass = $_POST['psw'];
    $qry = "update `tb_student` set `s_name`='$name',`s_sem`='$sem',`s_hallticket_id`='$hallid',`s_mob`='$mob',`dept_id`='$dept' where `s_email`='$email'";
    $qr = mysql_query($qry);
    if ($qr > 0) {
        
        echo "<script>alert('Profile Edited successfully');window.location.href='viewprofile.php'</script>";
    } else {
        echo "<script>window.location.href='viewprofile.php'</script>";
    }
}

?>