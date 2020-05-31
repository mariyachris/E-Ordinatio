<?php
include ("subhead.php");
?>
<script>
function funemail()
{
	var e=document.getElementById("e1").value;
	document.getElementById("e2").value=e;
}
</script>
<!--//header-->
	<div class="banner-inner">
		</div>
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="#">ADMIN</a>
			</li>
			<li class="breadcrumb-item active">Add Faculty</li>
		</ol>
	<!--//banner-->
<div class="form-style-5">
	<form action="" method="post" autocomplete="off">
		<fieldset>
			<legend>
				<span class="number">1</span> Faculty Info
			</legend>
			<input type="text" name="name" placeholder="Your Name *" pattern="[a-z A-Z]+$" required="required"> <input
				type="text" name="mob" placeholder="Your Mobile *" maxlength="10" minlength="10" pattern="\d*" required="required"> 
				<input type="text" name="quali" placeholder="Your Qualification *"  pattern="[a-z A-Z]+$" required="required">
				<input type="email" name="email" id="e1" placeholder="Your Email *" onkeyup="funemail()" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required="required"> 
				<label for="department">Department:</label> 
				<select id="dept" name="dept" required="required">
    				<option value="">--Select Department--</option>
                    <?php
                    include '../connect.php';
                    $sql = "select * from tb_department";
                    $sq = mysql_query($sql);
                    while ($s = mysql_fetch_array($sq)) {
                        ?>
                    	<option value="<?php echo $s[0];?>"><?php echo $s[1];?></option>
                    <?php
                    }
                    ?>
                </select> 
		</fieldset>
		<fieldset>
			<legend>
				<span class="number">2</span> Login Info
			</legend>
			<input type="email" name="email1" id="e2" placeholder="Your Email *" readonly="readonly"> 
			<input type="password" name="psw" placeholder="Password" required="required" >
		</fieldset>
		<input type="submit" value="Save" name="submit" />
	</form>
</div>
<div id="snackbar">..Faculty added successfuly..</div>
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
    $pass = $_POST['psw'];
    $qry = "INSERT INTO `tb_faculty_register`(`f_name`,`f_mob`,`f_quali`,`f_email`,`dept_id`)VALUES('$name','$mob','$quali','$email','$dept')";
    $qr = mysql_query($qry);
    if ($qr > 0) {
        $login = "insert into tb_login(username,password,type)values('$email','$pass','Faculty')";
        $log = mysql_query($login);
        if ($log > 0) {
            ?>
    		<script type="text/javascript">
    		    var x = document.getElementById("snackbar")
    			x.className = "show";
    			setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
    		</script>
<?php
        }
    } else {
        echo "<script>window.location.href='adddepatment.php'</script>";
    }
}

?>