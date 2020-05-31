<?php
include 'subhead.php';
?>
<script>
function funemail()
{
	var e=document.getElementById("e1").value;
	document.getElementById("e2").value=e;
}
</script>
<div class="form-style-5" style="width: 500px">
	<form action="" method="post">
		<fieldset>
			<legend>
				<span class="number">1</span> Student Info
			</legend>
			<input type="text" name="name" placeholder="Your Name *" required="required" pattern="[A-Z a-z]+$" title="Enter only Charectors " > 
			<select id="sem" name="sem" required="required">
              <option value="">--Select Semester--</option>
           	  <option>I Sem</option>
           	  <option>II Sem</option>
           	  <option>III Sem</option>
           	  <option>IV Sem</option>
           	  <option>V Sem</option>
           	  <option>VI Sem</option>
            </select>
			<input type="text" name="mob" placeholder="Your Mobile *" required="required" maxlength="10" minlength="10" pattern="\d*" title="Enter Only Numbers"> 
			<input type="text" name="Halid" placeholder="Hall ticket id *" required="required" Pattern="[A-Z 0-9]+$" title="Enter Only upper case letters and numbers only"> 
				<input type="email" id="e1" name="email" placeholder="Your Email *" required="required" onkeyup="funemail()" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"> 
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
            <input type="password" name="psw"  placeholder="Password" required="required">
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
    $qry = "INSERT INTO `tb_student` (`s_name`,`s_sem`,`s_hallticket_id`,`s_mob`,`s_email`,`dept_id`)VALUES('$name','$sem','$hallid','$mob','$email','$dept')";
    $qr = mysql_query($qry);
    if ($qr > 0) {
        $login = "insert into tb_login(username,password,type)values('$email','$pass','Student')";
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