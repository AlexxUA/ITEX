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
         $stmt = $dbh->prepare("SELECT DISTINCT(l.week_day), 
                                                l.lesson_number, 
                                                l.auditorium, 
                                                l.disciple, 
                                                l.type 
                                FROM `lesson` AS l inner JOIN `lesson_groups` 
                                              AS lg ON l.ID_Lesson = lg.FID_Lesson2 
                                              INNER JOIN `groups` AS g ON lg.FID_Groups = 
                                              (SELECT groups.ID_Groups FROM `groups` 
                                                                       WHERE groups.title = ?) ");

$group = $_GET['title'];

$stmt->execute(array($group));
            print "<table border='1'>
                   <tr><caption>Расписание для $group</caption>
                   <th>Day</th><th>Lesson number</th>
                   <th>Auditorium</th>
                   <th>Discipline</th>
                   <th>Type</th></tr>";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
    {

   echo "<tr>
            <td>$row[week_day]</td>
            <td>$row[lesson_number]</td>
            <td>$row[auditorium]</td>
            <td>$row[disciple]</td>
            <td>$row[type]</td>
        </tr>";
    }

    print "</table>";
?>