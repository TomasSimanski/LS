<?php
include "obj/files.php";
$Files = new Files();
$Files->DownloadFile($_GET['file']);
