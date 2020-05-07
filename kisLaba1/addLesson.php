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
        $stmt = $dbh->prepare("INSERT INTO lesson (lesson.ID_Lesson ,
                                                   lesson.week_day, 
                                                   lesson.lesson_number, 
                                                   esson.auditorium, 
                                                   lesson.disciple, 
                                                   lesson.type)
    VALUES ((SELECT max(FID_Lesson2) from lesson_groups) +1 , ?, ?, ?, ?, ?) ");

    $group = $_GET['title'];
    $teacher = $_GET['teacher'];
    $aud = $_GET['auditorium'];
    $type = $_GET['type'];
    $disciple = $_GET['disciple'];
    $day = $_GET['day'];
    $number = $_GET['number'];

$stmt->execute(array($day, $number, $aud, $disciple, $type));
$stmt = $dbh->prepare("INSERT INTO lesson_groups (FID_Lesson2, FID_Groups)

                  VALUES ((SELECT MAX(ID_Lesson) 
                           FROM lesson), (
                           SELECT ID_Groups 
                           FROM groups 
                          WHERE title = ?)); ");

$stmt->execute(array($group));

$stmt = $dbh->prepare("INSERT INTO lesson_teacher (FID_Teacher, FID_Lesson1)

               VALUES ((SELECT ID_Teacher 
                        FROM teacher 
                        WHERE name = ?), (
                        SELECT MAX(ID_Lesson) 
                         FROM lesson)); ");

$stmt->execute(array($teacher));

print "Занятие добавлено";

?>