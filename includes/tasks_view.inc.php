<?php

function showTasks(array $tasks)
{
  foreach ($tasks as $task) {
    echo "<div class='to-do'>
        <p>" . $task['task'] . "</p>
        <div class='buttons'>
        <button class='complete'>Done</button>
        <button class='delete'>Delete</button>
      </div>
      </div>";
  }
}
