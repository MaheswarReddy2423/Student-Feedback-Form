<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            FEEDBACK FORM
        </title>
        <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $_SESSION['username']=$_POST['username'];
                echo $_SESSION['username'];
                if(!$_SESSION['username'])
                {
                    echo "not there";
                }
            }
        ?>
    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']))
    {
        $conn = mysqli_connect('localhost','root','','dbms_project_part1') or die("Connection Failed:".mysqli_connect_error());
        if(isset($_POST['username']) && isset($_POST['password']))
        {
            
            $username=$_POST['username'];
            $password=$_POST['password'];
            $sql="SELECT * from `student` where `username`='$username' and `password`='$password'";
            $result=mysqli_query($conn,$sql);
            
            $rows=mysqli_fetch_array($result,MYSQLI_ASSOC);
            $count=mysqli_num_rows($result);
            if($count==1)
            {
                //echo "<h1>LOGIN Successful</h1><br> <p>HI,$name</p>";
                $sidquery="SELECT `id` FROM `STUDENT` WHERE USERNAME='$_SESSION[username]'";
                $sidqr=mysqli_query($conn,$sidquery);
                if(mysqli_num_rows($sidqr)==1)
                {
                    $_SESSION['sid']=mysqli_fetch_array($sidqr,MYSQLI_ASSOC);
                    echo $_SESSION['sid']['id'];
                }
                $name=$rows["name"];
                $id=$rows["id"];
                $sql="SELECT `CO`.cname FROM (`STUDENT` S JOIN `CLASS` C ON `S`.SECTION=`C`.CLNAME) NATURAL JOIN COURSE CO WHERE S.ID='$id'";
                $result=mysqli_query($conn,$sql);
                if ($result) {
                    /*echo "<b>YOUR CoURSES</b><br>";
                    while($courses_enrolled=mysqli_fetch_array($result,MYSQLI_ASSOC))
                    {
                        $course=$courses_enrolled["cname"];
                        echo "<p>$course</p>";
                    }*/
                    include('selectcourse.php');
                }
                else{
                    echo "sorry";
                }
                
            }
            else{
                echo "<h1>invalid credentials</h1>";
            }
            /*if($query)
            {
                echo "Entry Successful";
            }
            else{
                echo "error occurred";
            }*/
        }
    }
    ?>
    
    
</html>