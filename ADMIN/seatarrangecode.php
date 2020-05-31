<?php
//include("subhead.php");
?>
<p style="font-size:x-large;color:#3366CC;text-align:center;padding-bottom:10px;"></p>
<?php
//$sem=$_GET['examsem'];
//$count=$_GET['count'];

include '../connect.php';
$wwd=$_GET['date1'];
$t=$_GET['t'];
$select="select * from tb_room_hall";
$sel=mysql_query($select);


$sql="SELECT tt_sem,`dept_name` FROM `tb_timetable` INNER JOIN `tb_department` ON `tb_timetable`.`dept_id`=`tb_department`.`dept_id` WHERE `tt_date`='$wwd'";
$sq=mysql_query($sql);
$count=0;
$checkdetails="SELECT * FROM `tb_nominalroll` WHERE `nr_sem` IN (SELECT `tt_sem` FROM `tb_timetable` WHERE `tt_date`='$wwd') AND `nr_course` IN (SELECT `dept_name` FROM `tb_department` WHERE `dept_id` IN (SELECT  `dept_id` FROM `tb_timetable` WHERE `tt_date`='$wwd'))";
$chedeta=mysql_query($checkdetails);
$numcheck=mysql_num_rows($chedeta);

while($s=mysql_fetch_array($sq))
{
    $se.=$s[1].":".$s[0]."|";
    $count++;
}
$sem=trim($se,"|");
echo "SEM :".$sem;
echo "<br>COUNT :".$count;
if($t=="m")
{
    $tim="10.00";
}
else {
    $tim="12.00";
}

/*--------------------start Seat arrangement ----------------------------------------*/

$numss=0;
while($fet=mysql_fetch_row($sel))
{
   echo "<br>Enter:$fet[0]<br>";
    $classno=$fet[0];
    $seat=$fet[1];
    $spdepsem=explode("|",$sem);
    $j=0;

    echo "<br> For Enter:<br>";
            for($i=0;$i<$count;$i+=2)
            {
                
                echo "<br>$i";
               echo "<br>Enter for with i=$i<br>";
                $f=0;
               while($j<$seat)
                {
                    echo "Enter while with j=$j<br>";
                  
                   
                    if($f==0)
                    {
                       
                    $depsem=$spdepsem[$i];
                    $spdep=explode(":",$depsem);
                    $department=$spdep[0];
                    $semester=$spdep[1];
                   
                    $a=mysql_query("select * from tb_nominalroll where nr_course='$department' and nr_sem='$semester' and nr_nominalroll_id not in (select nr_nominalroll_id from tb_seat_arr where date='$wwd')  limit 1 ");
                    //echo "select * from tb_nominalroll where nr_course='$department' and nr_sem='$semester' and nr_nominalroll_id not in (select nr_nominalroll_id from tb_seat_arr where date='$wwd')  limit 1 ";
                    $num=mysql_num_rows($a);
                    if($num==0)
                    {
                        $numss++;
                    }
                    $f=1;
                    }
                    else 
                    {
                        if(($i+1)==$count)
                        {
                           
                            $depsem=$spdepsem[$i];
                            $spdep=explode(":",$depsem);
                            $department=$spdep[0];
                            $semester=$spdep[1];
                            
                            $a=mysql_query("select * from tb_nominalroll where nr_course='$department' and nr_sem='$semester' and nr_nominalroll_id not in (select nr_nominalroll_id from tb_seat_arr where date='$wwd')  limit 1 ");
                            //echo "select * from tb_nominalroll where nr_course='$department' and nr_sem='$semester' and nr_nominalroll_id not in (select nr_nominalroll_id from tb_seat_arr where date='$wwd')  limit 1 ";
                            $num=mysql_num_rows($a);
                            
                            if($num==0)
                            {
                                $numss++;
                            }
                           
                        }
                        else
                        {
                           
                        $depsem=$spdepsem[$i+1];
                        $spdep=explode(":",$depsem);
                        $department=$spdep[0];
                        $semester=$spdep[1];
                        
                        $a=mysql_query("select * from tb_nominalroll where nr_course='$department' and nr_sem='$semester' and nr_nominalroll_id not in (select nr_nominalroll_id from tb_seat_arr where date='$wwd')  limit 1 ");
                        //echo "select * from tb_nominalroll where nr_course='$department' and nr_sem='$semester' and nr_nominalroll_id not in (select nr_nominalroll_id from tb_seat_arr where date='$wwd')  limit 1 ";
                        $num=mysql_num_rows($a);
                        $f=0;
                        if($num==0)
                        {
                            $numss++;
                        }
                        }
                    }
                    if($j==$seat)
                    {
                        break;
                    }
                    else 
                    {
                       if($num>0)
                       {
                           $fe=mysql_fetch_row($a);         
                            $regno=$fe[0];
                            $ins=mysql_query("insert into tb_seat_arr(`nr_nominalroll_id`,`rh_room_no`,date,`time`)values('$regno','$classno','$wwd','$tim')");
                            $up=mysql_query("update tb_nominalroll set nr_status ='1' where `nr_nominalroll_id`='$regno'");
                            $j++;
                       } 
                  
                    }
                    if($numss>$numcheck)
                    {
                        break;
                    }
                } 
            }
    }



/*---------------------------------- End Seat arrangemnet ------------------------------------------*/


/*----------------------------------- Start Invigilation duties ------------------------------------*/
  /*  echo "daf";
    $roomno="SELECT `rh_room_no`,COUNT(*) FROM `tb_seat_arr` where date='$wwd' GROUP BY `rh_room_no`";
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
    */
    /*----------------------------------- End Invigilation duties --------------------------------------*/


?>
<?php
//include("footer.php");
?>
