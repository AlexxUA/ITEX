<!DOCTYPE html>
<html>
<head>
    <title>KisLaba2</title>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="style/coding.png">
    <script>
        const ajax = new XMLHttpRequest();

        function getGroup(){
            let groups =  document.getElementById("groups").value;
            ajax.open("GET","groupLessons.php?groups=" + groups);
            ajax.onreadystatechange = updateGroup;
            ajax.send();
        }

        function updateGroup(){
            if(ajax.readyState === 4){
                if(ajax.status === 200){
                    document.getElementById('bodyGroup').innerHTML = ajax.responseText;
                }
            }
        }

        function getTeacher(){
            let teachers = document.getElementById('teachers').selectedOptions[0].text;
            ajax.open("GET","teacherLessons.php?teachers=" + teachers);
            ajax.onreadystatechange = updateTeacher;
            ajax.send();
        }

        function updateTeacher(){
            if(ajax.readyState === 4){
                if(ajax.status === 200){
                    var res = document.getElementById('bodyTeacher'); 
                    var result = "";
                    if(ajax.responseXML == null){
                        result += "<p>Data not found or does not exist</p>"
                    }
                    else{
                        var rows = ajax.responseXML.firstChild.children;
                        result += "<table border=\"1\">\n"
                        for (var i = 0; i < rows.length; i++) {
                            if(i == rows[0]){
                                result += "<tr>";
                                for(var y = 0; y < rows[0].children.length; y++){
                                    result += "<th>"+rows[0].children[y].textContent+"</th>"
                                }
                                result += "</tr>";
                            }
                            else{
                                result += "<tr>";
                                for(var y = 0; y < rows[i].children.length; y++){
                                    result += "<td>"+rows[i].children[y].textContent+"</td>"
                                }
                                result += "</tr>";
                            }
                        }
                        result += "</table>";
                    }
                }
                res.innerHTML = result;
            }
        }

        function getAud(){
            let aud = document.getElementById('aud').value;
            ajax.open("GET","classRoom.php?aud="+aud);
            ajax.onreadystatechange = updateAud;
            ajax.send();
        }

        function updateAud(){
            if(ajax.readyState === 4){
                var bodyAud = document.getElementById("bodyAud");
                if(ajax.status === 200){
                    let result = JSON.parse(ajax.responseText);

                    var columns = [];

                    for(var i = 0; i < result.length; i++){
                        for(var key in result[i]){
                            if(columns.indexOf(key) === -1){
                                columns.push(key);
                            }
                        }
                    }

                    var table = document.createElement("table");
                    table.setAttribute('border', '1');
                    var tr = table.insertRow(-1);
                    for(var i = 0; i < columns.length; i++){
                        var thead = document.createElement("th");
                        thead.innerHTML = columns[i];
                        tr.appendChild(thead);
                    }
                    for(var i = 0; i < result.length; i++){
                        var trow = table.insertRow(-1);
                        for(var j = 0; j < columns.length; j++){
                            var cell = trow.insertCell(-1);
                            cell.innerHTML = result[i][columns[j]];
                        }
                    }
                    var bodyAud = document.getElementById("bodyAud");
                    bodyAud.innerHTML = "";
                    bodyAud.appendChild(table);
                }
            }
        }

    </script>
</head>
<body>
    <h3>First task. Pасписание занятий для произвольной группы из списка</h3>
    <label for="groups">Выберите группу:</label>
    <select name='groups' id="groups">
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
            $sqlGroups = "SELECT `title` FROM `groups`";
            foreach($dbh->query($sqlGroups) as $row)
            {
                 echo "<option value=$row[0]>$row[0]</option>";
            }
        ?>
    </select>
    <input type="button" value="Просмотреть расписание" onclick="getGroup()">
    <div id="bodyGroup"></div>

    <h3>Second task. Pасписание занятий для произвольного преподавателя из списка</h3>
    <label for = "teachers">Выберите преподавателя:</label>
    <select name = "teachers" id="teachers">
        <?php
          
            $sqlTeachers = "SELECT teacher.name FROM teacher";
            foreach($dbh->query($sqlTeachers) as $row)
            {
                echo "<option value=$row[0]>$row[0]</option>";
            }
        ?>
    </select>
    <input type="button" value="Просмотреть расписание" onclick="getTeacher()">
    <div id="bodyTeacher"></div>

    <h3>Third task. Pасписание занятий для аудитории из списка</h3>
    <label for = "aud">Выберите номер аудитории:</label>
    <select name = "aud" id="aud">
        <?php
          
            $sqlTeachers = "SELECT DISTINCT auditorium FROM lesson";
            foreach($dbh->query($sqlTeachers) as $row){
                echo "<option value=$row[0]>$row[0]</option>";
            }
        ?>
    </select>
    <input type="button" value="Просмотреть расписание" onclick="getAud()">
    <div id="bodyAud"></div>

</body>
</html>