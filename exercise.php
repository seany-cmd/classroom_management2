<?php
  //backend code

  // 1. collect database info
  $host = "127.0.0.1";
  $database_name = "todoapp";
  $database_user = "root";
  $database_password = "";

  //2. connect to database PDO - PHP database object)
  $database = new PDO(
   "mysql:host=$host;dbname=$database_name",
   $database_user,
   $database_password 
  );

  //3. get students data from the database
  // 3.1 SQL command
  $sql = "SELECT * FROM tasks";
  // 3.2 - prepare SQL query (prepare your material)
  $query = $database->prepare($sql);
  // 3.3 - execute SQL query (to cook)
  $query->execute();
  // 3.4 - fetch all the results (eat)
  $tasks = $query->fetchALL();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>TODO App</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
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
    <div
      class="card rounded shadow-sm"
      style="max-width: 500px; margin: 60px auto;"
    >
      <div class="card-body">
        <h3 class="card-title mb-3">My Todo List</h3>
        <ul class="list-group">
          <li
            class="list-group-item d-flex justify-content-between align-items-center"
          >
            <div>
              <button class="btn btn-sm btn-success">
                <i class="bi bi-check-square"></i>
              </button>
              <span class="ms-2 text-decoration-line-through">Task 1</span>
            </div>
            <div>
              <button class="btn btn-sm btn-danger">
                <i class="bi bi-trash"></i>
              </button>
            </div>
          </li>
          <li
            class="list-group-item d-flex justify-content-between align-items-center"
          >
            <div>
              <button class="btn btn-sm btn-light">
                <i class="bi bi-square"></i>
              </button>
              <span class="ms-2">Task 2</span>
            </div>
            <div>
              <button class="btn btn-sm btn-danger">
                <i class="bi bi-trash"></i>
              </button>
            </div>
          </li>
          <li
            class="list-group-item d-flex justify-content-between align-items-center"
          >
            <div>
              <button class="btn btn-sm btn-light">
                <i class="bi bi-square"></i>
              </button>
              <span class="ms-2">Task 3</span>
            </div>
            <div>
              <button class="btn btn-sm btn-danger">
                <i class="bi bi-trash"></i>
              </button>
            </div>
          </li>
        </ul>
        <div class="mt-4">
          <form class="d-flex justify-content-between align-items-center">
            <input
              type="text"
              class="form-control"
              placeholder="Add new item..."
              required
            />
            <button class="btn btn-primary btn-sm rounded ms-2">Add</button>
          </form>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
