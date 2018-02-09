<?php
session_start();
if(isset($_POST['LogOut'])||$_SESSION['LS_ACCESS']['LS_USER']['ID'] == null)
{
    $_SESSION['LS_ACCESS']['LS_USER']['ID'] = null;
    header("Location: index.php");
}
include "obj/files.php";
$Files = new Files();
if(isset($_POST['btn-upload'])){
    if($_FILES['file']['name'] != ""){
        $NAME = $_FILES['file']['name'];
        $FILE = $_FILES['file']['tmp_name'];
        $TYPE = $_FILES['file']['type'];
        $SIZE = $_FILES['file']['size'];
        $USER_ID = $_SESSION['LS_ACCESS']['LS_USER']['ID'];
        if ($SIZE < MAX_UPLOD_FILE_SIZE) {
            $Files->UploadFile($NAME, $FILE, $TYPE, $SIZE, $USER_ID);
        } else {
            $error = "File is larger than 16MB!";
        }
    } else {
        $error = "The file is not selected!";
    }
}
?>

<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
<link rel="stylesheet" href="css/style.css" type="text/css">

<script src="js/bootstrap.js"></script>
<script src="js/jquery.js"></script>

<div class="container">
    <?if(isset($error)){echo "<div id='file_name' style=color:red>$error</div>";}?>
    <form action="main.php" method="post" enctype="multipart/form-data">
        <label class="btn btn-default btn-file">
            Browse <input type="file" id="file" name="file" style="display: none;">
        </label>
        <button class="btn" type="submit" name="btn-upload">Upload</button>
        <button class="btn" type="submit" name="LogOut">LogOut</button>
    </form>

    <?
    echo "<table class='filetable'><thead><tr><th>ID</th><th>NAME</th><th></th></tr></thead><tbody>";
    $file_list = $Files->GetFilesByUser($_SESSION['LS_ACCESS']['LS_USER']['ID']);
    if($file_list != null)
    {
        foreach ($file_list as $row) {
            $show = "<tr><td>$row[0]</td><td>$row[1]</td><td><a href=\"download.php?file=$row[0]\">Скачать</a></td></tr>";
            echo $show;
        }
    } else {
        $show = "<tr><td colspan='3'>Файлов нет</td></tr>";
        echo $show;
    }
    echo "</tbody></table>";
    ?>

</div>
<script>
    $(function(){
        $('#file').change(function(){
            $('#file_name').text($(this).val());
        });
    });
</script>