<?php

      $dbh = new PDO('mysql:host=localhost;dbname=iteh2lb1var2', "root", "root");

        try
        {
            $dbh=new PDO($dsn,$username,$password);
        }
        catch(PDOException $e)
        {
            echo "Database aren`t connected! Error! $e->getMessage()";
            die();
        }
    ?>