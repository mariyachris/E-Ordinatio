<?php
include 'subhead.php';
?>
<script src="../js/jquery-2.2.3.min.js"></script>
<script>
function fungetstud()
{
	var d=document.getElementById("dept").value;
	var s=document.getElementById("sem").value;
	//alert(d);
	var url="viewstud.php";
	$.post(url,{d:d,s:s},function(data){
		//alert(data);
		document.getElementById("Details").innerHTML=data;	
	});	

}
function chnagesem()
{
	document.getElementById("sem").value="";
}
</script>
<select id="dept" name="dept" onchange="chnagesem()">
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
<select id="sem" name="sem" onchange="fungetstud()">
              <option value="">--Select Semester--</option>
           	  <option>I Sem</option>
           	  <option>II Sem</option>
           	  <option>III Sem</option>
           	  <option>IV Sem</option>
           	  <option>V Sem</option>
           	  <option>VI Sem</option>
            </select>
            
<div id="Details"></div>