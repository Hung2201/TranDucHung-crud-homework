<?php require_once('partial/header.php'); ?>
    <div class="container p-4">
        <div class="d-flex justify-content-end p-2">
            <a href="./create_html.php" class="btn btn-primary">Add +</a>
        </div>
        
        <?php
        // Fetch all students
        require_once('../crud_homework/database/database.php');
        $students = selectAllStudents();

        // Check if there are any students
        if ($students) {
            foreach ($students as $student) {
                ?>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="card-image mr-3">
                                <img class="img-fluid" width="200" src="<?php echo $student['profile']; ?>" alt="Student">
                            </div>
                            <div class="info">
                                <h1 class="display-4">Name: <?php echo $student['name']; ?> </h1>
                                <strong>Age: <?php echo $student['age']; ?></strong> 
                                <p>Email: <?php echo $student['email']; ?></p>
                            </div>
                        </div>
                        <div class="action d-flex justify-content-end">
                            <a href="../crud_homework/update_html.php?id=<?php echo $student['id']; ?>" class="btn btn-primary btn-sm mr-2"><i class="fa fa-pencil"></i></a>
                            <a href="../crud_homework/delete_model.php?id=<?php echo $student['id']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            // Display a message if there are no students
            echo "<p>No students found.</p>";
        }
    ?>
    </div>
<?php require_once('partial/footer.php');
 ?>
<?php 



?>