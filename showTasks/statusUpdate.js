
function updateStatus(taskId, currentStatus) {
    // Toggle the current status value (0 to 1, or 1 to 0)
    const newStatus = currentStatus ? 0 : 1;
  
    // Make a POST request to the PHP script using fetch
    fetch('showTasks/show_task.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      body: `update_id=${taskId}&completed=${newStatus}`
    })
    .then(response => {
      if (response.ok) {
        // Update the view with the new status if needed
        // For example, you can change the style of the task element based on the new status
        const taskElement = document.getElementById(`task_${taskId}`);
        if (taskElement) {
          taskElement.classList.toggle('completed', newStatus === 1);
        }
      } else {
        console.error('Error updating task status.');
      }
    })
    .catch(error => {
      console.error('Fetch error:', error);
    });
  }
  
