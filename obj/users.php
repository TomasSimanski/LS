<?php
class Users{

    public $ID;
    public $PASSWORD;
    public $EMAIL;

    function GetUserId($EMAIL,$PASSWORD)
    {
        $mysqli = new mysqli(SQL_HOST, SQL_USERNAME, SQL_PASSWORD,SQL_DB);
        $stmt = $mysqli->prepare("SELECT ID FROM USERS WHERE EMAIL = ? && PASSWORD = ?");
        $stmt->bind_param('ss', $EMAIL, $PASSWORD);
        $stmt->execute();
        $stmt->bind_result($ID);
        $stmt->fetch();
        $stmt->close();
        return $ID;
    }

    function CreateUser($EMAIL,$PASSWORD)
    {
        $mysqli = new mysqli(SQL_HOST, SQL_USERNAME, SQL_PASSWORD,SQL_DB);
        $stmt = $mysqli->prepare("INSERT INTO USERS(EMAIL,PASSWORD) VALUES(?,?)");
        $stmt->bind_param("ss",$EMAIL,$PASSWORD);
        $stmt->execute();
        $stmt->close();
        $this->ID = $this->GetUserId($EMAIL,$PASSWORD);
        return $this->ID;
    }
}