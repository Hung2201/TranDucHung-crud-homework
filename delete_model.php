<?php
require_once("../crud_homework/database/database.php");
    $id=intval($_GET['id']);
    deleteStudent($id);
    header("Location:index.php");
?>
