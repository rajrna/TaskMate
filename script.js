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

  
// ...........................Select My Day 
  function selectMyDay(){
    document.getElementsById("myDayContainer").style.display = "block";
    document.getElementsById("tomorrowContainer").style.display = "none";
    document.getElementsById("thisWeekContainer").style.display = "none";
  }

  function selectTomorrow(){
    document.getElementsById("myDayContainer").style.zIndex= '-1';
    document.getElementsById("tomorrowContainer").style.zIndex = '0';
    document.getElementsById("thisWeekContainer").style.zIndex = '0';
  }

  function selectThisWeek(){
    document.getElementsById("myDayContainer").style.display = "none";
    document.getElementsById("tomorrowContainer").style.display = "none";
    document.getElementsById("thisWeekContainer").style.display = "block";
  }
