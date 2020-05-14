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
    header('Content-Type: application/json');
    header("Cache-Control: no-cache, must-revalidate");

  

    $action = $_REQUEST['aud'];

                            $stmt=$dbh->prepare("SELECT L.ID_Lesson AS 'Lesson id', L.week_day
                                                                    AS 'Day of the week', L.lesson_number 
                                                                    AS 'Lesson number', L.auditorium 
                                                                    AS 'Audience number', L.disciple 
                                                                    AS 'Subject', L.type 
                                                                    AS 'Lesson type'
                                                  FROM `LESSON` AS L
                                                  WHERE L.auditorium = ?");

    $stmt->execute(array($action));
    $result=$stmt->fetchAll(PDO::FETCH_OBJ);

    echo json_encode($result);
?>