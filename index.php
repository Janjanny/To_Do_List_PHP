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

      <!-- <div class='to-do'>
        <p>asdsssssa</p>
        <div class='buttons'>
          <button class='complete' id='1'><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' style='fill: rgba(0, 0, 0, 1);'>
              <path d='m10 15.586-3.293-3.293-1.414 1.414L10 18.414l9.707-9.707-1.414-1.414z'></path>
            </svg></button>
          <button class='delete' id='1'><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' style='fill: rgba(0, 0, 0, 1);'>
              <path d='M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z'></path>
              <path d='M9 10h2v8H9zm4 0h2v8h-2z'></path>
            </svg></button>
        </div>
      </div> -->


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

      // for mark as done function
      $(".complete").click(function() {
        const $this = $(this);
        const id = $(this).attr('id');

        // send an ajax request
        $.ajax({
          type: "POST",
          url: "./includes/complete_task.inc.php",
          data: {
            id: id
          },
          success: function(data) {
            // add a class
            if (data == 'success') {
              $this.closest(".to-do").addClass("done");
            } else {
              alert("Something went wrong")
            }
          },
          error: function(error) {
            alert("AJAX request failed", error);
          }
        })
      })
    });
  </script>

</body>

</html>