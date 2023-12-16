<?php
$host     = 'localhost'; // Because MySQL is running on the same computer as the web server
$database = 'web_a'; // Name of the database you use (you need first to CREATE DATABASE in MySQL)
$user     = 'root'; // Default username to connect to MySQL is root
$password = 'mysql'; // Default password to connect to MySQL is empty

// TO DO: CREATE CONNECTION TO DATABASE
// Read file: https://www.w3schools.com/php/php_mysql_connect.asp
try {
    $db = new PDO("mysql:host=$host;dbname=$database", $user, $password);
    // set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }

function db() {
  global $db;
  return $db;
}

/**
 * Create new student record
 */
function createStudent($name, $age, $email, $profile) {
  try {
    $statement = db() -> prepare("Insert into student(name, age, email, profile) values (:name, :age, :email, :profile)");
    $statement ->bindParam(':name', $name);
    $statement ->bindParam(':age', $age);
    $statement ->bindParam(':email', $email);
    $statement ->bindParam(':profile', $profile);
    $statement ->execute();
    echo "Create new student record successfull!";
  } catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
  }
}

/**
 * Get all data from table student
 */
function selectAllStudents() {
  try {
     $statement = db() -> query("Select * from student");
     
     return $statement ->fetchAll(PDO::FETCH_ASSOC);
     
  } catch(PDOException $e){
    echo "Error: " . $e->getMessage();
  }
}

/**
 * Get only one on record by id 
 */
function selectOnestudent($id) {
  try {
      $statement = db()->prepare("SELECT * FROM student WHERE id = :id");
      $statement->bindParam(':id', $id, PDO::PARAM_INT); // Assuming 'id' is an integer
      $statement->execute();
      return $statement->fetchAll(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
  }
}



/**
 * Delete student by id
 */
function deleteStudent($id)
{
    try{
        
        $stmt = db()->prepare("DELETE FROM `student` WHERE id = :id ");
        $stmt->bindParam(':id', $id);
        $stmt ->execute();
      //  echo "dELETE 1 student successful";
    }
    catch (PDOException $e) {
        echo "Error delete 1 students: " . $e->getMessage();
    }
}


/**
 * Update students
 * 
 */
function updateStudent($id, $name, $age, $email, $profile) {
  try{
    $statement = db()->prepare("UPDATE student SET name = :name, age = :age, email = :email, profile = :profile WHERE id = :id");
        $statement->bindParam(':id', $id);
        $statement->bindParam(':name', $name);
        $statement->bindParam(':age', $age);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':profile', $profile);
        $statement->execute();
        
  } catch (PDOException $e){
    echo "Error: " . $e->getMessage();
  }
}
