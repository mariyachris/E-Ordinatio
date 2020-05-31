<?php
include("subhead.php");
?>
<p style="font-size:x-large;color:#3366CC;text-align:center;padding-bottom:10px;"></p>
<?php
//$sem=$_GET['examsem'];
//$count=$_GET['count'];

include '../connect.php';
$wwd=$_GET['date1'];

//$wwd="2018-11-02";
$t=$_GET['t'];
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
 $nominal=mysql_query("select * from tb_nominalroll where nr_course in($fdep) and nr_sem in($fsem)");
 $nominalnum=mysql_num_rows($nominal);
 if($nominalnum>0)
 {
if($t=="m")
{
    $tim="10:00";
    $ftime="10:00:00";
    $ttime="12:30:00";
}
else {
    $tim="2:00";
    $ftime="10:00:00";
    $ttime="12:30:00";
}



/*--------------------EXAMPLE CODE-----------------------------*/

 $f=0;
   
   $var=array();
   $varsub=array();
   
        while($fet=mysql_fetch_row($sel))
        {
            $i=0;
            $c=0;
           $rom=$fet[0];
           $roomno=$fet[1];
          // echo "<br>$rom<br>";
           $center= round($roomno/3);
           $side= round($roomno-$center);
           $spdepsem=explode("|",$sem);
          // echo "<br>side :::::::::::::$side<br>";
          // echo "<br>center :::::::::::::$center<br>";
          // echo "<br>-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------<br>";
                foreach ($spdepsem as $sds)
                {
                    
                    $semdep= explode(":", $sds);
                    $department=$semdep[0];
                    $semester=$semdep[1];
                  //echo "<br>Enter foreach first:::::$semdep[0]<br>";
                    for ($k=0;$i<$side;$k++)
                    {
                     // echo "<br>Enter k :$k<br>";
                    //  echo "<br>i value : $i";
                        $a=mysql_query("select * from tb_nominalroll where nr_course='$department' and nr_sem='$semester' and nr_nominalroll_id not in (select nr_nominalroll_id from tb_seat_arr where date='$wwd')  limit 1 ");
                        $fe=mysql_fetch_row($a); 
                        $fenu=mysql_num_rows($a);
                        if($i==$side)
                        {
                           // echo "<br>i:$i==side:$side :::::Break<br>";
                            break;
                        }
                        if($fenu>0)
                        {
                            $sqlsub="SELECT `tt_subject` FROM `tb_timetable` WHERE `tt_sem`='$semester' AND `dept_id`=(SELECT `dept_id` FROM `tb_department` WHERE `dept_name`='$department') and tt_date='$wwd'";
                            $sqsub=mysql_query($sqlsub);
                            $ssub=mysql_fetch_row($sqsub);
                            if(empty($varsub))
                            {
                                $varsub[]=$ssub[0];
                            }
                            else 
                            {
                                 if(!in_array($ssub[0], $varsub))
                                {
                                    $varsub[]=$ssub[0];
                                }
                            }
                            if(empty($var))
                            {
                                $var[]=$department;
                            }
                            else
                            {
                                if(!in_array($department, $var))
                                {
                                    $var[]=$department;
                                }
                            }
                        $regno=$fe[0];
                        $i++;
                        $ins=mysql_query("insert into tb_seat_arr(`nr_nominalroll_id`,`rh_room_no`,date,`time`)values('$regno','$rom','$wwd','$tim')");
                        }
                        else 
                        {
                            //echo "<br>fenu::$fenu>0else::::::Break<br>";
                            break;
                        }
                        $f=1;
                    }

                }
                // echo "<br>i value : $i<br>";
                if($f==1)
                {
                   // echo "<br>-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------<br>";
                    //echo "<br>Enter $f<br>";
                    if(empty($var))
                    {
                        $var[]= array();
                    }
                   // print_r($var);
                    foreach ($spdepsem as $sds)
                    {
                       
                    $semdep= explode(":", $sds);
                    $department=$semdep[0];
                    $semester=$semdep[1];
                    // echo "<br>Enter foreach $f loop:::::$semdep[0]<br>";
                        if(!in_array($department, $var))
                        {
                            /*echo "<br>Enter:$department<br>";
                            echo "<br>Center:$center<br>";*/
                            $sqlsub="SELECT `tt_subject` FROM `tb_timetable` WHERE `tt_sem`='$semester' AND `dept_id`=(SELECT `dept_id` FROM `tb_department` WHERE `dept_name`='$department') and tt_date='$wwd'";
                            $sqsub=mysql_query($sqlsub);
                            $ssub=mysql_fetch_row($sqsub);
                            if(!in_array($ssub[0], $varsub))
                            {
                                for ($l=0;$c<$center;$l++)
                                {
                                   // echo "<br>Enter L:$l<br>";
                                    $a1=mysql_query("select * from tb_nominalroll where nr_course='$department' and nr_sem='$semester' and nr_nominalroll_id not in (select nr_nominalroll_id from tb_seat_arr where date='$wwd')  limit 1 ");
                                    $fe1=mysql_fetch_row($a1); 
                                    $fenu1=mysql_num_rows($a1);
                                    if($c==$center)
                                    {
                                       // echo "<br>i:$i==Center:$side :::::Break<br>";
                                        break;
                                    }
                                    if($fenu1>0)
                                    {
                                    $regno1=$fe1[0];
                                    $c++;
                                    $ins1=mysql_query("insert into tb_seat_arr(`nr_nominalroll_id`,`rh_room_no`,date,`time`)values('$regno1','$rom','$wwd','$tim')");
                                   // echo "insert into tb_seat_arr(`nr_nominalroll_id`,`rh_room_no`,date,`time`)values('$regno1','$rom','$wwd','$tim')";

                                    }
                                    else 
                                    {
                                         //echo "<br>fenu::$fenu>0else::::::Break<br>";
                                        break;
                                    }
                                    $f=0;
                                }
                            }
                        }  
                    }
                    unset($var);
                    unset($varsub);
                }
                // echo "<br>c value : $c<br>";
                $tot=$i+$c;
               // echo "<br>TOTAL:$tot<br>";
                if($tot==$roomno)
                {
                    // echo "<br>TOT:::$tot==ROOMNO:::$roomno::::::::::continue<br>";
                    continue;
                }
                else 
                {
                 //   echo "<br>-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------<br>";
                   // echo "<br>TOT:::$tot==ROOMNO:::$roomno::::::::::Else<br>";
                    foreach ($spdepsem as $sds)
                    {
                        
                        $semdep= explode(":", $sds);
                        $department=$semdep[0];
                        $semester=$semdep[1];
                        /*echo "<br>Enter foreach $f loop:::::$semdep[0]<br>";
                        echo "<br>Enter:$department<br>";
                        echo "<br>Center:$center<br>";*/
                        
                        for ($l=0;$l<$center;$l++)
                        {
                           // echo "<br>Enter L::::$l<br>";
                            $a1=mysql_query("select * from tb_nominalroll where nr_course='$department' and nr_sem='$semester' and nr_nominalroll_id not in (select nr_nominalroll_id from tb_seat_arr where date='$wwd')  limit 1 ");
                            $fe1=mysql_fetch_row($a1); 
                            $fenu1=mysql_num_rows($a1);
                            if($c==$center)
                            {
                               // echo "<br>Break<br>";
                                break;
                            }
                            if($fenu1>0)
                            {
                            $regno1=$fe1[0];
                            $c++;
                            $ins1=mysql_query("insert into tb_seat_arr(`nr_nominalroll_id`,`rh_room_no`,date,`time`)values('$regno1','$rom','$wwd','$tim')");
                           // echo "insert into tb_seat_arr(`nr_nominalroll_id`,`rh_room_no`,date,`time`)values('$regno1','$rom','$wwd','$tim')";

                            }
                            else 
                            {
                             //  echo "<br>fenu::$fenu>0else::::::Break<br>";
                                break;
                            }
                            $f=0;
                        }  
                    }
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
                for ($l=1;$l<100;$l++)
                {
                    
                    //$as=$l-1;
                    
                    $facu1="SELECT * FROM `tb_faculty_register` where  invstat=$l";
                     //echo $facu1;
                    
                    $fac1=mysql_query($facu1);
                    $fn1=mysql_num_rows($fac1);
                    
                    if($fn1>0)
                    {
                        if($tim=="2:00" && date('N', strtotime($wwd)) == 5)
                        {
                          //  echo 'Enter afternoon';
                            while ($fid=mysql_fetch_array($fac1))
                            {
                            $fidsql=mysql_query("SELECT * FROM `tb_invigilation` INNER JOIN `tb_faculty_register` ON `tb_invigilation`.`f_id`=`tb_faculty_register`.`f_email` WHERE `tb_invigilation`.`f_id`='$fid[4]' AND `tb_faculty_register`.`invstat`=$l");
                            $fidsq=mysql_fetch_row($fidsql);
                                $fidate=$fidsq['date'];
                                if(date('N', strtotime($fidate)) == 5)
                                {
                                continue;
                                }
                                else
                                {
                                    $fidf=$fidsq[1];
                                }
                             }
                            $insinv1="INSERT INTO `tb_invigilation`(`f_id`,`rh_room_no`,`date`,`ftime`,`ttime`)VALUES('$fidf','$rom[0]','$wwd','$ftime','$ttime')";
                            $iniv1=mysql_query($insinv1);
                            if($iniv1>0)
                            {
                                $s=$l+1;
                                $updatef="UPDATE `tb_faculty_register` SET `invstat`=$s WHERE `f_email`='$fidf'";
                                $upda=mysql_query($updatef);
                                break;
                            }
                           
                        }
                        else
                        {
                            $fidsql1=mysql_query("SELECT * FROM `tb_invigilation` INNER JOIN `tb_faculty_register` ON `tb_invigilation`.`f_id`=`tb_faculty_register`.`f_email` WHERE `tb_faculty_register`.`invstat`=$l");
                            $fidsq1=mysql_fetch_row($fidsql1);
                            $fidf1=$fidsq1[1];
                            $insinv1="INSERT INTO `tb_invigilation`(`f_id`,`rh_room_no`,`date`,`ftime`,`ttime`)VALUES('$fidf1','$rom[0]','$wwd','$ftime','$ttime')";
                            $iniv1=mysql_query($insinv1);
                            if($iniv1>0)
                            {
                                $s=$l+1;
                                $updatef="UPDATE `tb_faculty_register` SET `invstat`=$s WHERE `f_email`='$fidf1'";
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
    
    
        $timetable="UPDATE `tb_timetable` SET `tt_status`='complete' WHERE `tt_date`='$wwd'";
        $timetab=mysql_query($timetable);
        if($timetab>0)
        {
            echo "<script>alert('Allocate successfully');window.location.href='seatarrangement.php'</script>";
        }
        else
        {
            echo "<script>alert('Error');window.location.href='seatarrangement.php'</script>";
        }
    
 }
 else 
 {
     echo "<script>alert('No nominal roll added');window.location.href='seatarrangement.php'</script>";
 }
?>
<?php
include("footer.php");
?>