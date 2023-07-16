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
  }
  function closeUpdateForm() {
    document.getElementById("updateForm").style.display = "none";
  }
  // .

  
// ...........................Select My Day 
document.addEventListener("DOMContentLoaded", function() {
 // Get references to the buttons and divs
 const btn1 = document.getElementById('btn1');
 const btn2 = document.getElementById('btn2');
 const btn3 = document.getElementById('btn3');
 const div1 = document.getElementById('myDayContainer');
 const div2 = document.getElementById('tomorrowContainer');
 const div3 = document.getElementById('thisWeekContainer');

 // Add event listeners to the buttons
 btn1.addEventListener('click', () => {
   div1.style.display = 'block';
   div2.style.display = 'none';
   div3.style.display = 'none';
 });

 btn2.addEventListener('click', () => {
   div1.style.display = 'none';
   div2.style.display = 'block';
   div3.style.display = 'none';
 });
 
 btn3.addEventListener('click', () => {
   div1.style.display = 'none';
   div2.style.display = 'none';
   div3.style.display = 'block';
 });

});

//  

  // -----------------checkbox css-----------------

