<?php
require_once "./includes/dbh.inc.php";
require_once "./includes/tasks_model.inc.php";
require_once "./includes/tasks_view.inc.php";
require_once "./includes/tasks_controller.inc.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>To Do List</title>
</head>

<body>
  <div class="task-board">
    <div class="header">
      <form action="./includes/task.inc.php" method="post" autocomplete="off">
        <input type="text" name="addTask" id="">
        <button type="submit">Add</button>
      </form>
    </div>
    <div class="task">
      <?php
      $tasks = fetchTasks($pdo);
      showTasks($tasks)

      ?>
    </div>

  </div>

</body>

</html>