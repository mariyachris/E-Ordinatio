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
			<li class="breadcrumb-item active">Seat arrangement</li>
		</ol>

	<!--//banner-->
<div class="form-style-5">
<fieldset>
	<legend><span class="number">1</span> Morning</legend>
    	<table class="table table-striped">
        	<thead class="alert alert-danger">
        		<tr>
        			<th>Date</th>
        			<th>Allocate</th>
        		</tr>
        	</thead>
        	<tbody>
        		<?php 
        		  include '../connect.php';
        		  $y=date("Y");
        		  $sql=mysql_query("SELECT DISTINCT(tt_date) FROM `tb_timetable` WHERE YEAR(tt_date)=$y AND tt_status='nill' and tt_time<12");
        		  while($sq=mysql_fetch_array($sql))
        		  {
        	    ?>
        	   	<tr>
        	   		<td><?php echo $sq[0];?></td>
                                <td><a href="seatarrangecodeexampleexp.php?date1=<?php echo $sq[0];?>&t=m">Set seat</a></td>
        		<?php 
        		  }
        		?>
        	</tbody>
    	</table>
</fieldset>

<fieldset>
	<legend><span class="number">2</span> Afternoon</legend>
    	<table class="table table-striped">
        	<thead class="alert alert-danger">
        		<tr>
        			<th>Date</th>
        			<th>Allocate</th>
        		</tr>
        	</thead>
        	<tbody>
        		<?php 
        		  include '../connect.php';
        		  $y=date("Y");
        		  $sql=mysql_query("SELECT DISTINCT(tt_date) FROM `tb_timetable` WHERE YEAR(tt_date)=$y AND tt_status='nill' and tt_time>=12");
        		  while($sq=mysql_fetch_array($sql))
        		  {
        	    ?>
        	   	<tr>
        	   		<td><?php echo $sq[0];?></td>
        	   		<td><a href="seatarrangecodeexampleexp.php?date1=<?php echo $sq[0];?>&t=a">Set seat</a></td>
        		<?php 
        		  }
        		?>
        	</tbody>
    	</table>
</fieldset>
</div>
<?php 
include 'footer.php';
?>