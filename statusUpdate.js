function updateStatus(taskId, currentStatus) {
  // Calculate the new status by toggling the current status (0 to 1 or 1 to 0)
  var newStatus = currentStatus === 0 ? 1 : 0;

  // Send an AJAX request to update the task status
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'toggle_status.php', true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  
  // Define the data to send to the server
  var data = 'task_id=' + taskId + '&task_status=' + newStatus;
  
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Update the task_status in the database was successful
      if (xhr.responseText === 'success') {
        // Update the current status with the new status
        currentStatus = newStatus;
        
        // Update the checkbox's checked state
        var checkbox = document.getElementById('taskComplete_' + taskId);
        checkbox.checked = newStatus === 1;
      } else {
        // Handle any errors from the server
        console.error('Error updating task status');
      }
    }
  };
  
  // Send the AJAX request with the data
  xhr.send(data);
}