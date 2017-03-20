<?php

ini_set('mysqli.connect_timeout', 300);
ini_set('default_socket_timeout', 300);
?>
<html>
    <?php
    echo '<form method="post" enctype="multipart/form-data">';
    echo 'Select a profile image:';
    echo '<input type="file" name="image" id="fileToUpload">';
    echo '<input type="submit" value="Upload Image" name="submit">';
    echo '</form>';
    
    if(isset($_POST['submit']))
    {
        if (getimagesize($_FILES['image']['tmp_name']) == FALSE)
        {
            echo "Please select an imaage";
        }
        else
        {
            $image = addslashes($_FILES['image']['tmp_name']);
            $name = addslashes($_FILE['image']['name']);
            $image = file_get_contents($image);
            $image = base64_encode($image);
            saveimage($name,$image);
        }
    }
    function saveimage($name,$image)
    {
        $conn = mysqli_connect("localhost", "root", "");
        mysqli_select_db("QuestionAnswer",$conn);
        $qry = "INSERT INTO UserPictures(user, pictureName, picture)
                VALUES ('user','$name','$image')";
        $result = mysqli_qu($qry,$conn);
        if ($result)
        {
            echo "<br/>IMAGE UPLOADED";
        }
        else
        {
            echo "<br/>IMAGE NOT UPLOADED";
        }
    }
    
    
    
    mysqli_close($conn);
    ?>
            
</html>