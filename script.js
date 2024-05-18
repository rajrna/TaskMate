// Dark mode toggle
const body = document.body;

// Function to toggle dark mode
function toggleDarkMode() {
  body.classList.toggle("dark-mode");
}

// You can call this function based on user interaction or system settings.
// For example, if you have a dark mode toggle button:
const darkModeToggle = document.getElementById("dark-mode-toggle");
darkModeToggle.addEventListener("click", toggleDarkMode);




// Dropdown table
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function dropDown() {
    document.getElementById("myDropdown").classList.toggle("show");
  }
  
  // Close the dropdown menu if the user clicks outside of it
  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }
// ...........................change button color...........................

const buttons = document.querySelectorAll('.day_select');

buttons.forEach(button => {
    button.addEventListener('click', () => {
        // Remove 'clicked' class from all buttons
        buttons.forEach(b => b.classList.remove('clicked'));
        
        // Add 'clicked' class to the clicked button
        button.classList.add('clicked');
    });
});


  
  //..............................Task create button script..........................................
  
  function openForm() {
    document.getElementById("myModal").style.display = "block";
    document.getElementById("taskForm").style.display = "block";
  }

  function closeForm() {
    document.getElementById("myModal").style.display = "none";
  }
  // For tomorrow-------------------------------------------------------------
  function openTomorrowForm() {
    document.getElementById("myModalTomorrow").style.display = "block";
    document.getElementById("taskFormTomorrow").style.display = "block";
  }

  function closeTomorrowForm() {
    document.getElementById("myModalTomorrow").style.display = "none";
  }



  // ..............................................................................................

  // .............................Task Update

  function openUpdateForm(){
    document.getElementById("updateForm").style.display = "block";
    document.getElementById('task_id').value = task_id;
    document.getElementById('task_name').value = task_name;
    document.getElementById('task_description').value = task_description;
  }
  function closeUpdateForm() {
    document.getElementById("updateForm").style.display = "none";
  }
  function openUpdateFormTom(){
    document.getElementById("updateFormTomorrow").style.display = "block";
    document.getElementById('task_id').value = task_id;
    document.getElementById('task_name').value = task_name;
    document.getElementById('task_description').value = task_description;
  }
  function closeUpdateFormTom() {
    document.getElementById("updateFormTomorrow").style.display = "none";
  }

  
// ...........................Select My Day 
document.addEventListener("DOMContentLoaded", function() {
 // Get references to the buttons and divs
 const btn1 = document.getElementById('btn1');
 const btn2 = document.getElementById('btn2');
 const btn3 = document.getElementById('btn3');
 const div1 = document.getElementById('myDayContainer');
 const div2 = document.getElementById('tomorrowContainer');
 const div3 = document.getElementById('thisWeekContainer');
 const rightC = document.getElementsByClassName("right_container");

 // Add event listeners to the buttons
 btn1.addEventListener('click', () => {
   div1.style.display = 'block';
   div2.style.display = 'none';
   div3.style.display = 'none';
   rightC.style.display = 'inline-block';
 });

 btn2.addEventListener('click', () => {
   div1.style.display = 'none';
   div2.style.display = 'block';
   div3.style.display = 'none';
   rightC.style.display = 'inline-block';
 });
 
 btn3.addEventListener('click', () => {
   div1.style.display = 'none';
   div2.style.display = 'none';
   div3.style.display = 'block';
   rightC.style.display = 'none';
 });

});

//  Form handling script
document.getElementById("addTaskForm").addEventListener("submit", function(event) {
  event.preventDefault(); // Prevent the default form submission

  // Get the form data
  const formData = new FormData(this);

  // Perform the AJAX request
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "./addTasks/add_task.php", true);
  xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
              // Handle the response here if needed
              console.log(xhr.responseText);

              // Optionally, display a success message to the user
              const successMessage = document.createElement("div");
              successMessage.textContent = "Task added successfully!";
              successMessage.style.color = "green";
              document.body.appendChild(successMessage);

              // Optionally, update the task list on the page without reloading
              // For example, if you have a function to refresh the task list:
              // refreshTaskList();
          } else {
              // Handle any errors that occurred during the request
              console.error("Error: " + xhr.status);

              // Optionally, display an error message to the user
              const errorMessage = document.createElement("div");
              errorMessage.textContent = "Failed to add task. Please try again later.";
              errorMessage.style.color = "red";
              document.body.appendChild(errorMessage);
          }
      }
  };
  xhr.send(formData);
});

//Tomorrow form handling script

document.getElementById("addTaskFormTomorrow").addEventListener("submit", function(event) {
  event.preventDefault(); // Prevent the default form submission

  // Get the form data
  const formData = new FormData(this);

  // Perform the AJAX request
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "./addTasks/addTomorrowTask.php", true);
  xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
              // Handle the response here if needed
              console.log(xhr.responseText);

              // Optionally, display a success message to the user
              const successMessage = document.createElement("div");
              successMessage.textContent = "Task added successfully!";
              successMessage.style.color = "green";
              document.body.appendChild(successMessage);

              // Optionally, update the task list on the page without reloading
              // For example, if you have a function to refresh the task list:
              // refreshTaskList();
          } else {
              // Handle any errors that occurred during the request
              console.error("Error: " + xhr.status);

              // Optionally, display an error message to the user
              const errorMessage = document.createElement("div");
              errorMessage.textContent = "Failed to add task. Please try again later.";
              errorMessage.style.color = "red";
              document.body.appendChild(errorMessage);
          }
      }
  };
  xhr.send(formData);
});

// // Task update handler
// document.getElementById("updateForm").addEventListener("submit", function(event) {
//   event.preventDefault(); // Prevent the default form submission

//   // Get the form data
//   const formData = new FormData(this);

//   // Perform the AJAX request
//   const xhr = new XMLHttpRequest();
//   xhr.open("POST", "update_task.php", true);
//   xhr.onreadystatechange = function() {
//       if (xhr.readyState === XMLHttpRequest.DONE) {
//           if (xhr.status === 200) {
//               // Handle the response here if needed
//               console.log(xhr.responseText);

//               // Optionally, display a success message to the user
//               const successMessage = document.createElement("div");
//               successMessage.textContent = "Task updated successfully!";
//               successMessage.style.color = "green";
//               document.body.appendChild(successMessage);

//               // Optionally, update the task list on the page without reloading
//               // For example, if you have a function to refresh the task list:
//               // refreshTaskList();
//           } else {
//               // Handle any errors that occurred during the request
//               console.error("Error: " + xhr.status);

//               // Optionally, display an error message to the user
//               const errorMessage = document.createElement("div");
//               errorMessage.textContent = "Failed to add task. Please try again later.";
//               errorMessage.style.color = "red";
//               document.body.appendChild(errorMessage);
//           }
//       }
//   };
//   xhr.send(formData);
// });


  // -----------------checkbox css-----------------

// -------------------date-----------------------
document.addEventListener("DOMContentLoaded", function () {
  var currentDateElement = document.getElementById("currentDate");
  var currentDate = new Date();
  var options = { month: 'long', day: 'numeric' };
  var formattedDate = currentDate.toLocaleDateString(undefined, options);
  currentDateElement.innerText = formattedDate;
});



// function updateStatus(taskId, currentStatus) {
//   // Toggle the current status value (0 to 1, or 1 to 0)
//   const newStatus = currentStatus ? 0 : 1;

//   // Make a POST request to the PHP script using fetch
//   fetch('login_form.php', {
//     method: 'POST',
//     headers: {
//       'Content-Type': 'application/x-www-form-urlencoded'
//     },
//     body: `update_id=${taskId}&completed=${newStatus}`
//   })
//   .then(response => {
//     if (response.ok) {
//       // Update the view with the new status if needed
//       // For example, you can change the style of the task element based on the new status
//       const taskElement = document.getElementById(`task_${taskId}`);
//       if (taskElement) {
//         taskElement.classList.toggle('completed', newStatus === 1);
//       }
//     } else {
//       console.error('Error updating task status.');
//     }
//   })
//   .catch(error => {
//     console.error('Fetch error:', error);
//   });
// }

// ......................Populate form


