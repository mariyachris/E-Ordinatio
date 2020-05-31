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
			<li class="breadcrumb-item active">Add Seat Arrangement</li>
		</ol>

	<!--//banner-->
<div class="form-style-5">
    <form action="" method="post">
        <fieldset>
            <legend><span class="number">1</span> Seat arrangement</legend>
            <input type="date" name="ed" required="required" min="<?php echo date("Y-m-d",strtotime("+1 days"))?>">
           	<label for="semester">From Time:</label>
            <input type="time" name="ftime" required="required" > 
           	<label for="department">To Time:</label>
            <input type="time" name="ttime" required="required">
        </fieldset>
        <input type="submit" value="Save" name="submit"  />
    </form>
</div>
<div id="snackbar">..Timetable added successfuly..</div>
<?php
if(isset($_POST['Submit1']))
{
$ed=$_POST['ed'];
$ftime=$_POST['ftime'];
$ttime=$_POST['ttime'];
$f=0;
include '../connect.php';
/*----------------------------------- Start Invigilation duties ------------------------------------*/
echo "daf";
$roomno="SELECT `rh_room_no`,COUNT(*) FROM `tb_seat_arr` where date='$ed' and time<='$ftime' GROUP BY `rh_room_no`";
echo $roomno;
echo "$roomno";
$roomn=mysql_query($roomno);



    while($rom=mysql_fetch_array($roomn))
    {
          //  echo "dsf";
        $numseat=round($rom[1]/6);
        for($k=0;$k<$numseat;$k++)
        {
            $facultyno="SELECT * FROM `tb_faculty_register` WHERE `f_email` NOT IN (SELECT `f_id` FROM `tb_invigilation`)";
            $facuno=mysql_query($facultyno);
            $fnumber=mysql_num_rows($facuno);
            echo $facultyno;
            echo $fnumber;
            if($fnumber>0)
            {
                $facu="SELECT * FROM `tb_faculty_register` where  invstat=0 limit 1";
                $fac=mysql_query($facu);
                $fa=mysql_fetch_row($fac);
                $insinv="INSERT INTO `tb_invigilation`(`f_id`,`rh_room_no`,`date`,`ftime`,`ttime`)VALUES('$fa[4]','$rom[0]','$ed','$ftime','$ttime')";
                $iniv=mysql_query($insinv);
                if($iniv>0)
                {
                    $updatef="UPDATE `tb_faculty_register` SET `invstat`=1 WHERE `f_email`='$fa[4]'";
                    $upda=mysql_query($updatef);
                }
            }  
            else 
            {
                $now = strtotime("now");
                $end_date = strtotime("+1 year");
                
                while (date("Y-m-d", $now) != date("Y-m-d", $end_date)) {
                    $day_index = date("w", $now);
                    if ($day_index == 5) {
                        // Print or store the weekends here
                      //  echo date("Y-m-d",$now)."<br>";
                        $arr[]=date("Y-m-d",$now);
                   }
                    $now = strtotime(date("Y-m-d", $now) . "+1 day");
                }
                //print_r($arr);
                for ($l=1;$l<100;$l++)
                {
                    
                    
                    $facu1="SELECT * FROM `tb_faculty_register` where  invstat=$l";
                    echo $facu1;
                    $fac1=mysql_query($facu1);
                    $fn1=mysql_num_rows($fac1);
                    if($fn1==1)
                    {
                        while($fa1=mysql_fetch_row($fac1))
                        {
                            
                        }
                        $insinv1="INSERT INTO `tb_invigilation`(`f_id`,`rh_room_no`,`date`,`ftime`,`ttime`)VALUES('$fa1[4]','$rom[0]','$ed','$ftime','$ttime')";
                        $iniv1=mysql_query($insinv1);
                        if($iniv1>0)
                        {
                            $s=$l+1;
                            $updatef="UPDATE `tb_faculty_register` SET `invstat`=$s WHERE `f_email`='$fa1[4]'";
                            $upda=mysql_query($updatef);
                            break;
                        }
                    }
                    else 
                    {
                        continue;
                    }
                }
            }
        }
    
    }

/*----------------------------------- End Invigilation duties --------------------------------------*/


}
?>
<?php
include("footer.php");
?>
