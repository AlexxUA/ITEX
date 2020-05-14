<html>
    <head>
     <title>Message</title>
    </head>
<body>  
    <?php
    $dbhost = 'localhost';
    $dbport = '27017';
    $dbname = 'dbItex';
    $c_users = 'dbItex.itech';

    $conn = new MongoDB\Driver\Manager("mongodb://$dbhost:$dbport");

    $filter = ['auditorium' => $_GET['auditorium']];
    $option = [];
    $read = new MongoDB\Driver\Query($filter, $option);
    $users = $conn->executeQuery($c_users , $read);
    print "<table border='1'><tr><th>Аудитория</th>
                                 <th>Предмет</th>
                                 <th>Пара</th>
                                 <th>День недели</th>
                                 <th>Преподаватель</th>
                                 <th>Группа</th></tr>";
        foreach($users as $user)
        {
            echo "<tr>
            <td>$user->auditorium</td>
            <td>$user->disciple</td>
            <td>$user->lesson_number</td>
            <td>$user->week_day</td>
            <td>$user->teacher</td>
            <td>$user->group</td>
            </tr>";
       }
    ?>
</body>
</html>