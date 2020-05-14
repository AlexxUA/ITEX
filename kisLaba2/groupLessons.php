<?php
 
    include_once("connect.php");
    $action = $_REQUEST['groups'];
                $stmt = $dbh->prepare("SELECT ID_Lesson AS 'Lesson ID', week_day 
                                                        AS 'Day of the week', lesson_number 
                                                        AS 'Lesson number', auditorium 
                                                        AS 'Audience number', disciple 
                                                        AS 'Subject', lesson.type 
                                                        AS 'Lesson type' 
                                         FROM `lesson` INNER JOIN lesson_groups ON lesson.ID_Lesson = lesson_groups.FID_Lesson2
                                                     INNER JOIN `groups` ON lesson_groups.FID_Groups = groups.ID_Groups
                                         WHERE groups.title = ? ");

    $stmt->execute(array($action));
    $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);

    if($result == null)
    {
        exit("Group data not found or does not exist");
    }

    print "<table border=\"1\">\n";
    print "<tr>\n";

    foreach($result[0] as $key => $useless)
    {
        print "<th>$key</th>";
    }
    print "</tr>";

    foreach($result as $row)
    {
        print "<tr>";
        
        foreach($row as $key => $val)
        {
            print "<td>$val</td>";
        }
        print "</tr>";
    }
    print "</table>";
?>