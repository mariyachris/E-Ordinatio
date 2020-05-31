<?php
include 'subhead.php';
?>
<!--//header-->
	<div class="banner-inner">
		</div>
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="#">ADMIN</a>
			</li>
			<li class="breadcrumb-item active">Add Timetable</li>
		</ol>

	<!--//banner-->
<div class="form-style-5">
    <form action="" method="post">
        <fieldset>
            <legend><span class="number">1</span> Add Timetable</legend>
            <input type="date" name="date" placeholder="Date" min="<?php echo date("Y-m-d",strtotime("+1 day"))?>" required="required">
            <input type="time" name="time" placeholder="Time" required="required">
           	<input type="text" name="subject" placeholder="Subject" pattern="[a-z A-Z 0-9]+$" required="required">
           	<label for="semester">Semester:</label>
            <select id="sem" name="sem" required="required">
              <option value="">--Select Semester--</option>
           	  <option>I Sem</option>
           	  <option>II Sem</option>
           	  <option>III Sem</option>
           	  <option>IV Sem</option>
           	  <option>V Sem</option>
           	  <option>VI Sem</option>
            </select>
           	<label for="department">Department:</label>
            <select id="dept" name="dept" required="required">
              <option value="">--Select Department--</option>
            <?php 
              include '../connect.php';
               $sql="select * from tb_department";
               $sq=mysql_query($sql);
               while ($s=mysql_fetch_array($sq))
               {
            ?>
            	<option value="<?php echo $s[0];?>"><?php echo $s[1];?></option>
            <?php
               }
            ?>
            </select>   
        </fieldset>
        <input type="submit" value="Apply" name="submit"  />
    </form>
</div>
<div id="snackbar">..Timetable added successfuly..</div>
<?php 
include 'footer.php';
?>
 <?php 
    if (isset($_POST['submit'])) {
        include '../connect.php';
        $date=$_POST['date'];
        $time=$_POST['time'];
        $subject=$_POST['subject'];
        $sem=$_POST['sem'];
        $dep=$_POST['dept'];
        $sql1="INSERT INTO `tb_timetable` (`tt_date`,`tt_time`,`tt_subject`,`tt_sem`,`dept_id`) VALUES('$date','$time','$subject','$sem','$dep')";
        $sq1=mysql_query($sql1);
        if ($sq1>0)
            {
 ?>
        		<script type="text/javascript">
        		    var x = document.getElementById("snackbar")
        			x.className = "show";
        			setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
        		</script>
    <?php   
            }
        else
        {
        	echo "<script>window.location.href='adddepatment.php'</script>";
        }
    }
 ?>