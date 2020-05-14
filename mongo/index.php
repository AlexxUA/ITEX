<html>
	<head>
		<title>Main</title>
	</head>
	<body>
	<form method="GET" action="group.php">
        <label>Группа:</label>
        <select name="group">
            <?php
            $dbhost = 'localhost';
            $dbport = '27017';
            $dbname = 'dbItex';
            $lessons = 'dbItex.itech';

            $conn = new MongoDB\Driver\Manager("mongodb://$dbhost:$dbport");

            $read = new MongoDB\Driver\Query([], []);
            $lesson = $conn->executeQuery($lessons , $read);

            foreach ($lesson as $l) {
                echo "<option>";
                echo $l->group;
                echo "</option>";
            }
            ?>
        </select>
        <input type="submit" value="Ok"/>
	</form>

	
	<form method="GET" action="teacher.php">
		<label>Преподаватель:</label>
		<select name="teacher">
			<?php
            $dbhost = 'localhost';
            $dbport = '27017';
            $dbname = 'dbItex';
            $lessons = 'dbItex.itech';

            $conn = new MongoDB\Driver\Manager("mongodb://$dbhost:$dbport");

            $read = new MongoDB\Driver\Query([], []);
            $lesson = $conn->executeQuery($lessons , $read);

            foreach ($lesson as $l) {
                echo "<option>";
                echo $l->teacher;
                echo "</option>";
            }
			?>
		</select>
		<input type="submit" value="Ok"/>
	</form>

	
	<form method="GET" action="auditorium.php">
        <label>Аудитория:</label>
        <select name="auditorium">
            <?php
            $dbhost = 'localhost';
            $dbport = '27017';
            $dbname = 'dbItex';
            $lessons = 'dbItex.itech';

            $conn = new MongoDB\Driver\Manager("mongodb://$dbhost:$dbport");

            $read = new MongoDB\Driver\Query([], []);
            $lesson = $conn->executeQuery($lessons , $read);

            foreach ($lesson as $l) {
                echo "<option>";
                echo $l->auditorium;
                echo "</option>";
            }
            ?>
        </select>
        <input type="submit" value="Ok"/>
	</form>

    <input type="button" onclick="funct()">
    <div id="table">

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>$( document ).ready(()=> {
            var auditorium =$("#auditorium").val();
            $.ajax({
                url: "schedule.php",
                method: "GET",
                data: "auditorium=" +auditorium,
                success: function(data) {
                    var result = JSON.parse(data);
                    var html="<table border='1'>";
                    for(var i = 0; i<result.length;i++){
                        html+="<tr>";
                        html+="<td>"+result[i]["auditorium"]+"</td>";
                        html+="<td>"+result[i]["disciple"]+"</td>";
                        html+="<td>"+result[i]["lesson_number"]+"</td>";
                        html+="<td>"+result[i]["week_day"]+"</td>";
                        html+="<td>"+result[i]["teacher"]+"</td>";
                        html+="<td>"+result[i]["group"]+"</td>";
                        html+="</tr>";
                    }
                    html+="</table>";
                    localStorage.setItem("schedule", html);
                },
                error: function(){alert("Not found");}

            });})

            function funct() {
                let schedule  = localStorage.getItem("schedule");
                $("#table").html(schedule);
            }
    </script>

	</body>
</html>