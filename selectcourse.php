
<p>SELECT YOUR COURSE</p>
<form name='courseselect' action='feedbackform.php' method='POST'>
    
<label for='course'>Hi <?php echo $_SESSION['username']; ?>, Select any of your course</label><br><br>

<?php
    //echo "<p> select any course</p>";
    while($courses_enrolled=mysqli_fetch_array($result,MYSQLI_ASSOC))
    {
        $course=$courses_enrolled["cname"];
        echo "<input type='radio' name='course' value='$course'>$course <br><br>";
        //echo "<p>$course</p>";
    }
?>
<input type='submit' name='submit' id='submit'>
</form>