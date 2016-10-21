<?php
                    $QuestionTitle = $_GET["QTitle"];
                    $QuestionBody = $_GET["QBody"];
                    
                    mysql_connect("localhost", "root", "");
                    mysql_select_db("Questions");
                    mysql_query("insert into Questions values('$QuestionTitle', '$QuestionBody')");
?>

