<?php
include("../crud_homework/database/database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST["name"], $_POST["age"], $_POST["email"], $_POST["image_url"])) {
        
        $name = htmlspecialchars($_POST["name"]);
        $age = intval($_POST["age"]); 
        $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
        $profile = htmlspecialchars($_POST["image_url"]);

        
        if ($name !== false && $age !== false && $email !== false && $profile !== false) {
            
            createStudent($name, $age, $email, $profile);
            
        }
    }
}
header("Location:index.php");
?>
