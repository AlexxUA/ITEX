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
            $stmt = $dbh->prepare("SELECT DISTINCT(week_day), 
                                                   lesson_number,
                                                   auditorium, 
                                                   disciple, 
                                                   lesson.type 
                                   FROM `lesson`
                                   WHERE auditorium = ?");

$auditorium = $_GET['auditorium'];
$stmt->execute(array($auditorium));

print "<table border='1'>
        <tr><caption>Расписание для $auditorium</caption>
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