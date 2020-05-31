<?php
include("subhead.php");
?>
<script>
	function funmonthly()
	{
		$("#bdate").show();
		$("#name").hide();
		document.getElementById("result").innerHTML="";
	
	}
		function funName()
	{
		$("#bdate").hide();
		$("#name").show();
		document.getElementById("result").innerHTML="";
	
	}
	function getInvigilationDuties()
	{
		var re=document.getElementById("bda").value;
	//alert(re);
		var url="getReportOnDate.php";
		$.post(url,{r:re},function(data){
		//alert('hai');
		document.getElementById("result").innerHTML=data;
		
		});
	
	}
	
		function getNameInvigilation()
	{
		var se=document.getElementById("InName").value;
	//alert(re);
		var url="getReportOnName.php";
		$.post(url,{s:se},function(data){
		//alert('hai');
		document.getElementById("result").innerHTML=data;
		
		});
	
	}

</script>
<div class="container" style="min-height:600px;">
	<div>
		<input type="button" name="date" value="Date" onclick="funmonthly()" class="btn btn-info">
		<input type="button" name="date" value="Name" onclick="funName()" class="btn btn-info">
		<div id="bdate" style="display:none;margin-top:40px;">
			<input type="date" class="form-control" id="bda" onchange="getInvigilationDuties()" style="width:50%" >
		
		</div>
		<div id="name" style="display:none;margin-top:40px;">
			<input type="text" id="InName" class="form-control" placeholder="Staff Name" onkeyup="getNameInvigilation()" style="width:50%">
		</div>

	</div>
	<div id="result"></div>

</div>
<?php
include("footer.php")
?>