<?php
session_start();
?>
<h1>
    STUDENT REGISTRATION FORM
</h1>
<body>
    <?php
    include('authenticate.php');
    if(isset($_POST['course']))
    {
        $course=$_POST['course'];
        echo "<b>$course</b>";
        $coursequery="SELECT `cid` FROM `COURSE` WHERE CNAME='$course'";
        $courseqr=mysqli_query($conn,$coursequery);
        //$courserows=mysqli_fetch_array($courseqr,MYSQLI_ASSOC);
        if(mysqli_num_rows($courseqr)==1)
        {
            $_SESSION['cid']=mysqli_fetch_array($courseqr,MYSQLI_ASSOC);;
            echo "<br>".$_SESSION['cid']['cid'];
        }
    }
    ?>
    <p>
        Rate your <?php echo $course ?> teacher
        
    </p>
    <br>

    1-Poor.<br>
    2-average<br>
    3-good<br>
    4-very good<br>
    5-excellent<br>
    
    <form name='feedback' action='insert.php' method='POST'>
        
    <label for="syllabus_covered">Has the Teacher covered entire Syllabus as prescribed by University?  </label>
            <input type="radio" name="syllabus" value="Y">YES
            <input type="radio" name="syllabus" value="N">NO
            <br>
            <br>
            <label for="Technical content">
                Effectiveness of Teacher in terms of Technical content:  
            </label>
            <input type="radio" name="Technical_content" value=1>1
            <input type="radio" name="Technical_content" value=2>2
            <input type="radio" name="Technical_content" value=3>3
            <input type="radio" name="Technical_content" value=4>4
            <input type="radio" name="Technical_content" value=5>5
            <br>
            <br>
            <label for="Communication skills">
                Effectiveness of Teacher in terms of Communication skills:  
            </label>
            <input type="radio" name="Communication_skills" value=1>1
            <input type="radio" name="Communication_skills" value=2>2
            <input type="radio" name="Communication_skills" value=3>3
            <input type="radio" name="Communication_skills" value=4>4
            <input type="radio" name="Communication_skills" value=5>5
            <br>
            <br>
            <label for="Availability">
                Availability beyond normal classes and co-operation to solve individual problems  
            </label>
            <input type="radio" name="Availability" value=1>1
            <input type="radio" name="Availability" value=2>2
            <input type="radio" name="Availability" value=3>3
            <input type="radio" name="Availability" value=4>4
            <input type="radio" name="Availability" value=5>5
            <br>
            <br>
            <label for="Pace">
                Effectiveness of Teacher in terms of "Pace on which contents were covered":  
            </label>
            <input type="radio" name="Pace" value=1>1
            <input type="radio" name="Pace" value=2>2
            <input type="radio" name="Pace" value=3>3
            <input type="radio" name="Pace" value=4>4
            <input type="radio" name="Pace" value=5>5
            <br>
            <br>
            <label for="Overall effectiveness">
                Overall effectiveness:  
            </label>
            <input type="radio" name="Overall_effectiveness" value=1>1
            <input type="radio" name="Overall_effectiveness" value=2>2
            <input type="radio" name="Overall_effectiveness" value=3>3
            <input type="radio" name="Overall_effectiveness" value=4>4
            <input type="radio" name="Overall_effectiveness" value=5>5
            <br>
            <br>
            <label for="cirricular content">
                How do you rate the contents of the curricular ?:  
            </label>
            <input type="radio" name="cirricular_content" value=1>1
            <input type="radio" name="cirricular_content" value=2>2
            <input type="radio" name="cirricular_content" value=3>3
            <input type="radio" name="cirricular_content" value=4>4
            <input type="radio" name="cirricular_content" value=5>5
            <br>
            <br>
            <label for="lab experiments">
                How do you rate lab experiments, if applicable?  
            </label>
            <input type="radio" name="lab_experiments" value=1>1
            <input type="radio" name="lab_experiments" value=2>2
            <input type="radio" name="lab_experiments" value=3>3
            <input type="radio" name="lab_experiments" value=4>4
            <input type="radio" name="lab_experiments" value=5>5
            <br>
            <br>
            <label for="remarks">
                REMARKS(if any):
            </label>
            <br>
            <input type="text" name="remarks" id="remarks">

            <br>
            <br>
            <input type="submit" id="submit" name="submit">
    </form>
</body>