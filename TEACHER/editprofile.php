<?php
include ("subhead.php");
?>
<?php 
include '../connect.php';
$id=$_GET['id'];
$profile="select * from tb_faculty_register where f_email='$id'";
//echo $profile;
$pro=mysql_query($profile);
$p=mysql_fetch_array($pro);
?>
<div class="form-style-5">
	<form action="" method="post">
		<fieldset>
			<legend>
				<span class="number">1</span> Profile Info
			</legend>
			<input type="text" name="name" placeholder="Your Name *" value="<?php echo $p['f_name']?>" pattern="[A-Z a-z]+$" required="required"> <input
				type="text" name="mob" placeholder="Your Mobile *" value="<?php echo $p['f_mob']?>" pattern="\d*" required="required"> <input
				type="text" name="quali" placeholder="Your Qualification *" value="<?php echo $p['f_quali']?>" pattern="[a-z A-Z]+$" required="required">  <input
				type="email" name="email" placeholder="Your Email *" value="<?php echo $p['f_email']?>" readonly="readonly"> <label
				for="department">Department:</label> 
				<select id="dept" name="dept" required="required">
					<option value="">--Select Department--</option>
                    <?php
                    include '../connect.php';
                    $sql = "select * from tb_department";
                    $sq = mysql_query($sql);
                    while ($s = mysql_fetch_array($sq)) {
                        ?>
                    	<option value="<?php echo $s[0];?>" <?php if($s[0]==$p['dept_id']){?> selected="selected" <?php }?>><?php echo $s[1];?></option>
                    <?php
                    }
                    ?>
            </select> 
		</fieldset>
		<input type="submit" value="Apply" name="submit" />
	</form>
</div>
<div id="snackbar">..Profile Updated successfuly..</div>
<?php
include ("footer.php");
?>
<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $mob = $_POST['mob'];
    $email = $_POST['email'];
    $quali = $_POST['quali'];
    $dept = $_POST['dept'];
   
    $qry = "update `tb_faculty_register` set `f_name`='$name',`f_mob`='$mob',`f_quali`='$quali',`dept_id`='$dept' where `f_email`='$email'";
    $qr = mysql_query($qry);
    if ($qr > 0) {
        echo "<script>window.location.href='viewprofile.php'</script>";
        }
    else {
        echo "<script>window.location.href='viewprofile.php'</script>";
    }
}

?>