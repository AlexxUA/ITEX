<!DOCTYPE html>
<html lang="en">    
    <head>
	    <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title> Kis Laba 1</title>

    </head>
<body>

  <!--==================#GROUPLESSON#================-->
    <br>

     <form method="get" action="groupLessons.php">
<?php

    try
    { 
        $dbh = new PDO('mysql:host=localhost;dbname=iteh2lb1var2', "root", "root");
    
    }
    catch(PDOException $e)
    {
        print "ERROR!!!!!".$e->getMessage()."<br/>";
        die();
    }  

    echo '<p>Выберите группу</p>';

    $smnt = 'SELECT title FROM `groups`';
    
    print "<select name='title'>";

    foreach ($dbh->query($smnt) as $rows)
    {
    print "<option>$rows[title]</option>";
    }

    print "</select>";
?>
    <input type="submit" value="Ok">

    </form>

   <!--==================#TEACHERLESSON#================-->

	<br>

    <form method="get" action="teacherLessons.php">
<?php
        echo '<p>Выберите преподавателя</p>';

        $smnt = 'SELECT teacher.name from teacher';

        print "<select name='teacher'>";

        foreach ($dbh->query($smnt) as $rows)
        {   
            print "<option>$rows[name]</option>";
        }

        print "</select>";
?>
    <input type="submit" value="Ok">

    </form>
   <!--==================#CLASSROOM#================-->

	<br>

    <form method="get" action="classRoom.php">

    <?php 

    echo '<p>Выберите аудиторию</p>';

    $smnt = 'SELECT DISTINCT auditorium from lesson';

    print "<select name='auditorium'>";

    foreach ($dbh->query($smnt) as $rows)
    {
        print "<option>$rows[auditorium]</option>";
    }

    print "</select>";

    ?>
    <input type="submit" value="Ok">

    </form>

   <!--==================#ADDLESSON#================-->
	<br>
    
    <form method="get" action="addLesson.php">
    <?php 

      echo '<p>Добавьте занятие в рассписание</p>';

    $smnt = 'SELECT teacher.name from teacher';
    print "<select name='teacher'>";

    foreach ($dbh->query($smnt) as $rows)
    {
        print "<option>$rows[name]</option>";
    }

    print "</select>";
    $smnt = 'SELECT DISTINCT auditorium from lesson';
    
    print "<select name='auditorium'>";
    foreach ($dbh->query($smnt) as $rows)
    {
        print "<option>$rows[auditorium]</option>";
    }

    print "</select>";
    $smnt = 'SELECT title from groups';
    print "<select name='title'>";

    foreach ($dbh->query($smnt) as $rows)
    {
        print "<option>$rows[title]</option>";
    }

    print "</select>";
    $smnt = 'SELECT DISTINCT lesson.type from lesson';
    print "<select name='type'>";
    foreach ($dbh->query($smnt) as $rows)
    {
        print "<option>$rows[type]</option>";
    }

    print "</select>";

    $smnt = 'SELECT DISTINCT lesson.disciple from lesson';

    print "<select name='disciple'>";

    foreach ($dbh->query($smnt) as $rows)
    {
        print "<option>$rows[disciple]</option>";
    }

    print "</select>";
    ?>
    <select name="day">
        <option>Monday</option>
        <option>Tuesday</option>
        <option>Wednesday</option>
        <option>Thursday</option>
        <option>Friday</option>
    </select>
    <select name="number">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        <option>6</option>
    </select>
    <input type="submit" value="Ok">
</form>
</body>
</html>