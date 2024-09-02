<?php
  // backend code

  // 1. collect database info
  $host = "127.0.0.1";
  $database_name = "todoapp"; 
  $database_user = "root";
  $database_password = "";

  
  $database = new PDO(
    "mysql:host=$host;dbname=$database_name",
    $database_user,
    $database_password 
  );

  $sql = "SELECT * FROM students";
  $query = $database->prepare($sql); 
  $query->execute();
  $students = $query->fetchAll();


?>
<!DOCTYPE html>
<html>
  <head>
    <title>Classroom Management</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
    />
    <style type="text/css">
      body {
        background: #f1f1f1;
      }
    </style>
  </head>
  <body>
    <div class="card rounded shadow-sm mx-auto my-4" style="max-width: 500px">
      <div class="card-body">
        <h3 class="card-title mb-3">My Classroom</h3>
        <form method="POST" action="add_student.php">
          <div class="mt-4 d-flex justify-content-between align-items-center">
            <input
              type="text"
              class="form-control"
              placeholder="Add new student..."
              name="student_name"
              required
            />
            <button class="btn btn-primary btn-sm rounded ms-2">Add</button>
          </div>
        </form>
      </div>
    </div>

    <div class="card rounded shadow-sm mx-auto my-4" style="max-width: 500px">
      <div class="card-body">
        <h3 class="card-title mb-3">Students</h3>
        
        <?php foreach ($students as $index => $student) : ?>
          <div class="d-flex justify-content-between align-items-center mt-3">
            <h5 class="mb-0"><?= $index+1; ?>. <?= $student["name"]; ?></h5>
            
            <form
                method="POST"
                action="update_student.php"
                >
                <input type="text" name="student_name" value="<?= $student["name"]; ?>"   />
                <input type="hidden" name="student_id" value="<?= $student["id"]; ?>" />
                <button class="btn btn-success btn-sm">Update</button>
              </form>
              <!-- DELETE -->
              <form
                method="POST"
                action="delete_student.php"
                >
                <input type="hidden" name="student_id" value="<?= $student["id"]; ?>" />
                <button class="btn btn-danger btn-sm">Delete</button>
              </form>  
          </div>
        <?php endforeach; ?>
      </div>
    </div>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
