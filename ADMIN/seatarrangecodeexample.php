<?php
//include("subhead.php");
?>
<p style="font-size:x-large;color:#3366CC;text-align:center;padding-bottom:10px;"></p>
<?php
//$sem=$_GET['examsem'];
//$count=$_GET['count'];

include '../connect.php';
$wwd=$_GET['date1'];
$t="m";
$select="select * from tb_room_hall";
$sel=mysql_query($select);


$sql="SELECT tt_sem,`dept_name` FROM `tb_timetable` INNER JOIN `tb_department` ON `tb_timetable`.`dept_id`=`tb_department`.`dept_id` WHERE `tt_date`='$wwd'";
$sq=mysql_query($sql);
$count=0;
$checkdetails="SELECT * FROM `tb_nominalroll` WHERE `nr_sem` IN (SELECT `tt_sem` FROM `tb_timetable` WHERE `tt_date`='$wwd') AND `nr_course` IN (SELECT `dept_name` FROM `tb_department` WHERE `dept_id` IN (SELECT  `dept_id` FROM `tb_timetable` WHERE `tt_date`='$wwd'))";
$chedeta=mysql_query($checkdetails);
$numcheck=mysql_num_rows($chedeta);
$fdep="'";
$fsem="'";
while($s=mysql_fetch_array($sq))
{
    $se.=$s[1].":".$s[0]."|";
    $fdep1.=$s[1]."','";
    $fsem1.=$s[0]."','";
    $count++;
}
$sem=trim($se,"|");
$fdep="'".rtrim($fdep1,",'")."'";
$fsem="'".rtrim($fsem1,",'")."'";
//echo "SEM :".$sem;
//echo "<br>COUNT :".$count;
if($t=="m")
{
    $tim="10:00";
    $ftime="10:00:00";
    $ttime="12:30:00";
}
else {
    $tim="2:00";
}



/*--------------------EXAMPLE CODE-----------------------------*/


while($fet=mysql_fetch_row($sel))
{
    $i=0;
    $f=0;
    $roomno=$fet[0];
    //echo "<br>Room no:$roomno<br>";
    $seat=$fet[1];
    //echo "<br>No seat:$seat<br>";
    $alo= round($seat/2);
    $spdepsem=explode("|",$sem);
    $check="SELECT * FROM `tb_nominalroll` WHERE `nr_sem` IN($fsem) and `nr_course` in($fdep) and `nr_nominalroll_id` NOT IN (SELECT `nr_nominalroll_id` FROM `tb_seat_arr` WHERE `date`='$wwd')";
   // echo $check;
    $chec=mysql_query($check);
    $chenum=mysql_num_rows($chec);
    //echo "<br>Checknum:$chenum<br>";
    if($chenum>0)
    {
        if($f==0)
        {
            foreach ($spdepsem as $sds)
            {
                $semdep= explode(":", $sds);
                for ($j=0;$j<$alo;$j++)
                {
                    $department=$semdep[0];
                    $semester=$semdep[1];
                    $a=mysql_query("select * from tb_nominalroll where nr_course='$department' and nr_sem='$semester' and nr_nominalroll_id not in (select nr_nominalroll_id from tb_seat_arr where date='$wwd')  limit 1 ");
                   // echo "select * from tb_nominalroll where nr_course='$department' and nr_sem='$semester' and nr_nominalroll_id not in (select nr_nominalroll_id from tb_seat_arr where date='$wwd')  limit 1 ";
                    $fe=mysql_fetch_row($a); 
                    $fenu=mysql_num_rows($a);
                   // echo "<br>Count:".$fenu."<br> j:$j<br>";
                    $regno=$fe[0];
                    if($i==$seat)
                    {
                     //   echo '<br>Enter i brak if';
                        break;
                    }
                    if($fenu>0)
                    {
                    $i++;
                    $ins=mysql_query("insert into tb_seat_arr(`nr_nominalroll_id`,`rh_room_no`,date,`time`)values('$regno','$roomno$department','$wwd','$tim')");
                  //  echo 'REG:'.$regno."<br>";
                    }
                    else {
                     //   echo '<br>Enter no fenu break';
                        break;
                    }
                }
            }
        }
    }
 else {
        break;
    }
}



/*---------------------END EXAMPLE CODE-----------------------*/




/*----------------------------------- Start Invigilation duties ------------------------------------*/
 //  echo "daf";
    $roomno="SELECT `rh_room_no`,COUNT(*) FROM `tb_seat_arr` where date='$wwd' GROUP BY `rh_room_no`";
 //   echo "$roomno";
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
           // echo $facultyno;
           // echo $fnumber;
            if($fnumber>0)
            {
                $facu="SELECT * FROM `tb_faculty_register` where  invstat=0 limit 1";
                $fac=mysql_query($facu);
                $fa=mysql_fetch_row($fac);
                $insinv="INSERT INTO `tb_invigilation`(`f_id`,`rh_room_no`,`date`,`ftime`,`ttime`)VALUES('$fa[4]','$rom[0]','$wwd','$ftime','$ttime')";
               // echo "$insinv";
                $iniv=mysql_query($insinv);
                if($iniv>0)
                {
                    $updatef="UPDATE `tb_faculty_register` SET `invstat`=1 WHERE `f_email`='$fa[4]'";
                    $upda=mysql_query($updatef);
                }
            }
            else
            {
                /*$now = strtotime("now");
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
               // print_r($arr);*/
                for ($l=1;$l<100;$l++)
                {
                    
                    $as=$l-1;
                    
                    $facu1="SELECT * FROM `tb_faculty_register` where  invstat=$l";
                    // echo $facu1;
                    $fac1=mysql_query($facu1);
                    $fn1=mysql_num_rows($fac1);
                    if($fn1==1)
                    {
                        if($tim=="2:00")
                        {
                            $gsql="SELECT * FROM `tb_invigilation` INNER JOIN `tb_faculty_register` ON `tb_faculty_register`.`f_email`=`tb_invigilation`.`f_id` WHERE invstat=1";
                            $gsq=mysql_query($gsql);
                            while($fa1=mysql_fetch_row($fac1))
                            {
                                $sdate=$fa1[4];
                                
                            }
                        }
                        else
                        {
                           
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
?>
<?php
//include("footer.php");
?>