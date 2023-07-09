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


  // Task input script

  const form = document.getElementById("form");
  const input = document.getElementById("input");
  const todosList = document.getElementById("todos");
  const todos = JSON.parse(localStorage.getItem("todos"));
  
  const updateLocalStorage = () => {
    const todosElements = document.querySelectorAll("li");
    const todos = [];
    todosElements.forEach((todoElement) => {
      todos.push({
        text: todoElement.innerText,
        completed: todoElement.classList.contains("completed"),
      });
    });
    localStorage.setItem("todos", JSON.stringify(todos));
  };
  
  const addTodo = (todo) => {
    let todoText = input.value;
    if (todo) todoText = todo.text;
    if (todoText) {
      const todoElement = document.createElement("li");
      if (todo && todo.completed) {
        todoElement.classList.add("completed");
      }
      todoElement.innerText = todoText;
      todoElement.addEventListener("click", () => {
        todoElement.classList.toggle("completed");
        updateLocalStorage();
      });
      todoElement.addEventListener("contextmenu", (e) => {
        e.preventDefault();
        todoElement.remove();
        updateLocalStorage();
      });
      todosList.appendChild(todoElement);
      input.value = "";
      updateLocalStorage();
    }
    e.preventDefault();
  };
  
  if (todos) {
    todos.forEach((todo) => addTodo(todo));
  }
  
  // form.addEventListener("submit", (e) => {
  //   e.preventDefault();
  //   // addTodo();
  // });

  //..............................Task create button script..........................................
  
  function openForm() {
    document.getElementById("myModal").style.display = "block";
  }

  function closeForm() {
    document.getElementById("myModal").style.display = "none";
  }
  // ..............................................................................................

  // .............................Task Update

  function openUpdateForm(){
    document.getElementById("updateForm").style.display = "block";
  }
  function closeUpdateForm() {
    document.getElementById("updateForm").style.display = "none";
  }
  // .

  
