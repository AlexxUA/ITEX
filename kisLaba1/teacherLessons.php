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
             $stmt = $dbh->prepare("SELECT DISTINCT l.week_day, 
                                                    l.lesson_number,
                                                    l.auditorium, 
                                                    l.disciple,
                                                    l.type 
                                    FROM `lesson` AS l inner JOIN `lesson_teacher` 
                                                  AS lT ON l.ID_Lesson = lT.FID_Lesson1 
                                                  INNER JOIN teacher AS t ON lT.FID_Teacher = (SELECT teacher.ID_Teacher
                                                  FROM teacher WHERE teacher.name = ?) ");
                                                  
$teacher = $_GET['teacher'];
$stmt->execute(array($teacher));

        print "<table border='1'>
               <tr><caption>Расписание для $teacher</caption>
               <th>Day</th>
               <th>Lesson number</th>
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