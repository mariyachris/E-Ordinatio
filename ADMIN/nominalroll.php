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
			<li class="breadcrumb-item active">Add Nominal roll</li>
		</ol>

	<!--//banner-->
<div class="form-style-5">
    <form action="" method="post" autocomplete="off">
        <fieldset>
            <legend><span class="number">1</span> Nominal Roll Info</legend>
            <input type="text" name="htno" placeholder="Hallticket number *" pattern="[a-z A-Z0-9]+$" required="required" title="Only numbers and charectores are alowed">
            <input type="text" name="cname" placeholder="College name  *" pattern="[a-z A-Z]+$" required="required" title="Only charectors are alowed">            
            <input type="text" name="sname" placeholder="Student name  *" pattern="[a-z A-Z]+$" required="required" title="Only charectors are alowed"> 
            <input type="text" name="year" placeholder="Year *" pattern="\d*" required="required" title="Onliy numbers are alowed"> 
            <input type="text" name="course" placeholder="course *" pattern="[a-z A-Z]+$" required="required" title="Only charectors are alowed">
            <select id="sem" name="sem" required="required">
              <option value="">--Select Semester--</option>
           	  <option>I Sem</option>
           	  <option>II Sem</option>
           	  <option>III Sem</option>
           	  <option>IV Sem</option>
           	  <option>V Sem</option>
           	  <option>VI Sem</option>
            </select>
        </fieldset>
        <input type="submit" value="Save" name="submit"  />
    </form>
</div>
<div id="snackbar">..Nominal Roll added successfuly..</div>
<?php 
include 'footer.php';
?>
<?php 
    if (isset($_POST['submit']))
    {
        include '../connect.php';
        $htno=$_POST['htno'];
        $cname=$_POST['cname'];
        $sname=$_POST['sname'];
        $year=$_POST['year'];
        $sem=$_POST['sem']; 
        $course=$_POST['course'];
        $sql="INSERT INTO `tb_nominalroll` (`nr_hallticket_id`,`nr_clgname`,`nr_name`,`nr_year`,`nr_sem`,`nr_course`)VALUES('$htno','$cname','$sname','$year','$sem','$course')";
        $sq=mysql_query($sql);
        if($sq>0)
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
            echo "<script>window.location.href='addrommsandhalls.php'</script>";
        }
    }
?>