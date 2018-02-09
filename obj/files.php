<?php
include "config.php";
class Files{

    public $ID;
    public $NAME;
    public $FILE;
    public $USER_ID;

    function GetFilesByUser($USER_ID)
    {
        $mysqli = new mysqli(SQL_HOST, SQL_USERNAME, SQL_PASSWORD,SQL_DB);
        $query = "SELECT ID,NAME FROM FILES WHERE USER_ID = $USER_ID";
        $result = $mysqli->query($query);
        while( $row = mysqli_fetch_row($result)){
            $array[]= $row;
        }
        return $array;
    }

    function UploadFile($NAME,$FILE,$TYPE,$SIZE,$USER_ID)
    {
        $mysqli = new mysqli(SQL_HOST, SQL_USERNAME, SQL_PASSWORD,SQL_DB);
        $stmt = $mysqli->prepare("INSERT INTO FILES(NAME,FILE,TYPE,SIZE,USER_ID) VALUES (?,?,?,?,?)");
        $NULL=NULL;
        $stmt->bind_param('sbsii', $NAME, $NULL, $TYPE, $SIZE, $USER_ID);
        $stmt->send_long_data(1, file_get_contents($FILE));
        $stmt->execute();
    }

    function DownloadFile($ID)
    {
        $mysqli = new mysqli(SQL_HOST, SQL_USERNAME, SQL_PASSWORD,SQL_DB);
        $query = "SELECT NAME,FILE,TYPE,SIZE FROM FILES WHERE ID = $ID";
        $result = mysqli_query($mysqli,$query);
        list($NAME,$FILE,$TYPE,$SIZE) = mysqli_fetch_array($result);
        header("Content-length: $SIZE");
        header("Content-type: $TYPE");
        header("Content-Disposition: attachment; filename=$NAME");
        ob_clean();
        flush();
        echo $FILE;
        mysqli_close($mysqli);
    }
}
