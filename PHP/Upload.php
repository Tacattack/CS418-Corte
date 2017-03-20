<?php
include("PHP/Connect.php");
start_session();

if(isset($_POST['submit']))
{
    $pictureUploader = $_SESSION["USER"];
    
    if (getimagesize($FILES['image']['tmp_name']) == false)
    {
        echo "Please select an image.";
    }
    else
    {
        $image = addslashes($_FILES['image']['tmp_name']);
        $name = addslashes($_FILES['image']['name']);
        $image = file_get_contents($image);
        $image = base64_encode($image);
        saveimage($name, $image);
    }
}

function saveimage($name, $image)
{
    $qry = "insert into UserPictures (user, pictureName, picture)
            VALUES ('{$pictureUploader}','{$name}','{$image}')";
            
    $result = mysqli_query($qry, $conn);
    if($result)
        echo "<br />Image Uploaded";
    else
        echo "<br />Image Not Uploaded";
}

header("Location: ../profile.php?id=".$_SESSION["USERID"]);
?>