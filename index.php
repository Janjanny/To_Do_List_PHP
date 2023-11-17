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
  <link rel="stylesheet" href="./assets/styles/style.css">

  <title>To Do List</title>
</head>

<body>
  <div class="task-board">
    <div class="header">
      <form action="./includes/task.inc.php" method="post" autocomplete="off" id="addTaskForm">
        <input type="text" name="newTask" id="text-input" placeholder="What would you like to do ?">
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

  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {

      // for delete function
      $(".delete").click(function() {
        const $this = $(this);
        const id = $(this).attr('id');


        // send an ajax request
        $.ajax({
          type: "POST",
          url: "./includes/remove_task.inc.php",
          data: {
            id: id
          },
          success: function(data) {
            if (data == 'success') {
              // Remove the task from DOM on success
              $this.closest(".to-do").fadeOut(500, function() {
                $(this).remove;
              });
            } else {
              alert("Failed to delete the task");
            }
          },
          error: function(error) {
            alert("AJAX Request failed: ", error);
          }
        })

      })
    });
  </script>

</body>

</html>