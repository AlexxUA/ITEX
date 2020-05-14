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
      // require_once("connect.php");
    header('Content-Type: text/xml');
    header("Cache-Control: no-cache, must-revalidate");
 

    $action = $_REQUEST["teachers"];
 

                    $stmt=$dbh->prepare("SELECT TEACHER.ID_Teacher AS 'Teacher ID', TEACHER.name 
                                                                   AS 'Teacher name', LESSON.ID_Lesson 
                                                                   AS 'Lesson id', LESSON.week_day
                                                                   AS 'Day of the week', LESSON.lesson_number 
                                                                   AS 'Lesson number', LESSON.auditorium 
                                                                   AS 'Audience number', LESSON.disciple 
                                                                   AS 'Subject', LESSON.type 
                                                                   AS 'Lesson type'
                                          FROM `LESSON` INNER JOIN LESSON_TEACHER ON LESSON.ID_Lesson = LESSON_TEACHER.FID_Lesson1 
                                                        INNER JOIN `TEACHER` ON LESSON_TEACHER.FID_Teacher = TEACHER.ID_Teacher
                                          WHERE TEACHER.name  = ? ");

    $stmt->execute(array($action));
    $result=$stmt->fetchAll(PDO::FETCH_ASSOC);

    if($result == null)
    {
        exit("Teacher data not found or does not exist");
    }

    header('Content-Type: text/xml');
    header("Cache-Control: no-cache, must-revalidate");
    echo '<?xml version="1.0" encoding="utf8" ?>';
    echo "<query2>";
    print "<row>\n";

    foreach($result[0] as $key => $useless)
    {
        print "<headers>$key</headers>";
    }

    echo "</row>";

    foreach($result as $row)
    {
        print "<row>";

        foreach($row as $key => $val)
        {
            print "<def>$val</def>";
        }
        print "</row>";
    }
    echo "</query2>"
?>