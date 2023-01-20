<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            FEED BACK FORM DISPLAY
        </title>
    </head>
    <h1>
        YOUR FEEDBACK
    </h1>
    <body>
        <?php

        if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['submit']))
        {
            $conn = mysqli_connect('localhost','root','','dbms_project_part1') or die("Connection Failed:".mysqli_connect_error());
            if(isset($_POST['syllabus']) && isset($_POST['Technical_content']) && isset($_POST['Communication_skills']) && isset($_POST['Availability']) && isset($_POST['Pace']) && isset($_POST['Overall_effectiveness']) && isset($_POST['cirricular_content']) && isset($_POST['lab_experiments']))
            {
                $syllabus=$_POST['syllabus'];
                $tc=(int)$_POST['Technical_content'];
                $cs=(int)$_POST['Communication_skills'];
                $avail=(int)$_POST['Availability'];
                $pace=(int)$_POST['Pace'];
                $oe=(int)$_POST['Overall_effectiveness'];
                $cc=(int)$_POST['cirricular_content'];
                $le=(int)$_POST['lab_experiments'];
                if(isset($_POST['remarks']))
                {
                    $remark=$_POST['remarks'];
                }
                else{
                    $remark=NULL;
                }
                $sid=$_SESSION['sid']['id'];
                $cid=$_SESSION['cid']['cid'];
                $sql="INSERT INTO `STU_FEED` (`sid`,`cid`,`syllabus`,`ef_technical`,`ef_communication`,`ef_availability`,`ef_pace`,`ef_overall`,`cirricular_cont`,`lab_experiments`,`remarks`) VALUES ('$sid','$cid','$syllabus','$tc','$cs','$avail','$pace','$oe','$cc','$le','$remark')";
                $query=mysqli_query($conn,$sql);
                if($query)
                {
                    echo "Entry successful<br>";
                    echo "<b>syllabus covered? </b>$syllabus<br><br>";
                    echo "<b>effectiveness in technical content? </b>$tc<br><br>";
                    echo "<b>effectiveness in communication skills? </b>$cs<br><br>";
                    echo "<b>effectiveness in teaching pace? </b>$pace<br><br>";
                    echo "<b>overall effectiveness? </b>$oe<br><br>";
                    echo "<b>effectiveness in cirricular content? </b>$cc<br><br>";
                    echo "<b>effectiveness in lab experimnets? </b>$le<br><br>";
                    if($remark)
                    {
                        echo "<b>remarks:  </b>$remark<br><br>";
                    }
                    else
                    {
                        echo "<b>remarks: </b>no reamrks given<br><br>";
                    }
                }
                else
                {
                    echo "error occured"; 
                }   
            }
            else{
                echo "value missing somewhere";
            }
            /*if(isset($_POST['syllabus']) && isset($_POST['Technical']))
            {
                $syllabus=$_POST['syllabus'];
                if(isset($_POST['remarks']))
                {
                    $remark=$_POST['remarks'];
                }
                else{
                    $remark=NULL;
                }
                $tc=(int)$_POST['Technical'];
                /*if(isset($_POST['remarks']))
                {
                    $remark=$_POST['remarks'];
                }
                else{
                    $remark=NULL;
                }
                $sid=$_SESSION['sid']['id'];
                $cid=$_SESSION['cid']['cid'];
                $sql="INSERT INTO `stu_feed`(`sid`,`cid`,`syllabus`,`rating`,`remarks`) VALUES('$sid','$cid','$syllabus','$tc','$remark')";
                $query=mysqli_query($conn,$sql);
                if($query)
                {
                    echo "Entry successful".$_POST['Technical']."<br><br>";
                    echo "<b>syllabus covered? $syllabus</b><br><br>";
                    echo "<b>rating? $tc</b><br><br>";
                    echo "<b>remark? $remark</b><br><br>";
                }
                else
                {
                    echo "error occured";
                }   
            }
            else{
                echo "empty value somewhere ".$_POST['Technical'];
            }*/
        }


        ?>

    </body>

</html>
