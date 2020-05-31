<?php
include("subhead.php");
?>
<!--//header-->
	<div class="banner-inner">
		</div>
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="#">ADMIN</a>
			</li>
			<li class="breadcrumb-item active">Add Department</li>
		</ol>

	<!--//banner-->
<div id="snackbar">..Department added successfuly..</div>
<div class="form-style-5">
    <form action="" method="post">
        <fieldset>
            <legend><span class="number">1</span> Add Department</legend>
            <input name="dept" type="text" placeholder="Department name *" required="required" pattern="[A-Z a-z]+$" title="Only enter charectors">
        </fieldset>
        <input type="submit" value="Save" name="save">
    </form>
</div>

<?php
include("footer.php");
?>
<?php
if(isset($_POST['save']))
{
	$dep=$_POST['dept'];
	include("../connect.php");
	$sql="insert into `tb_department`(dept_name)values('$dep')";
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
		echo "<script>window.location.href='adddepatment.php'</script>";
	}
}
	
?>