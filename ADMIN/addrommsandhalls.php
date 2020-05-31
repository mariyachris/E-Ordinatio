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
			<li class="breadcrumb-item active">Add rooms & halls</li>
		</ol>

	<!--//banner-->
<div class="form-style-5">
    <form action="" method="post">
        <fieldset>
            <legend><span class="number">1</span> Add Rooms and halls</legend>
            <input type="text" name="rhno" placeholder="Room or hall number *" required="required" pattern="[A-Z0-9]+$" title="Room number must be uppercase letters and numbers">
            <input type="text" name="rhcapacity" placeholder="Room capacity *" required="required" pattern="\d*" title="Please enter numbers only">
           	<input type="radio" name="rhtype" value="Room" required="required">Room
           	<input type="radio" name="rhtype" value="Halls" required="required">Halll
        </fieldset>
        <input type="submit" value="Save" name="submit"  />
    </form>
</div>
<div id="snackbar">..Rooms and halls added successfuly..</div>
<?php
include 'footer.php';
?>
<?php
    if(isset($_POST['submit']))
    {
        $rhno=$_POST['rhno'];
        $rhcapacity=$_POST['rhcapacity'];
        $rhtype=$_POST['rhtype'];
        include '../connect.php';
        $sql="INSERT INTO `tb_room_hall` (`rh_room_no`,`rh_capacity`,`rh_type`)VALUES('$rhno','$rhcapacity','$rhtype')";
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