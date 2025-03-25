/*############## mobile view ############*/ 
function dropdownMenu() {
        var x = document.getElementById("dropdownClick");
        if (x.className === "topnav") {
            x.className += " responsive"; /* Change topnav to topnav responsive */
        } else {
            x.className = "topnav";
        }
    }

/*############### Dashboard   ################*/
function Dashboard() {
    // Toggle the 'active' class on the dashboard
    var dashboard = document.getElementById("dashboard");
    dashboard.classList.toggle("active");
}
/*################### user panel ######################*/
 //  User Panel
function toggleUserPanel() {
    let panel = document.getElementById("userPanel");
    panel.classList.toggle("visible");
}
/*panel disappears when click any where */
document.addEventListener("click", function(event) {
    let panel = document.getElementById("userPanel");
    let userIcon = document.querySelector(".usericon");

    if (!panel.contains(event.target) && !userIcon.contains(event.target)) {
        panel.classList.remove("visible");
    }
});

function logoutUser() {
    alert("Logging out...");
   
}
/*##########Setting panel########*/

function toggleThemePanel() {
    let panel = document.getElementById("themePanel");
    panel.classList.toggle("visible");
}
/*panel disappears when click any where */
document.addEventListener("click", function(event) {
    let panel = document.getElementById("themePanel");
    let settIcon = document.querySelector(".sett-icon");

    if (!panel.contains(event.target) && !settIcon.contains(event.target)) {
        panel.classList.remove("visible");
    }
});


// Function to switch between dark and light mode
function toggleTheme() {
    let body = document.body;
    let themeLabel = document.getElementById("themeLabel");

    body.classList.toggle("light-mode");

    if (body.classList.contains("light-mode")) {
        themeLabel.textContent = "Light Mode";
        localStorage.setItem("theme", "light");
    } else {
        themeLabel.textContent = "Dark Mode";
        localStorage.setItem("theme", "dark");
    }
}

// Load theme on page refresh
window.onload = function () {
    let savedTheme = localStorage.getItem("theme");
    if (savedTheme === "light") {
        document.body.classList.add("light-mode");
        document.getElementById("themeLabel").textContent = "Light Mode";
        document.getElementById("themeToggle").checked = true;
    }
};


/*############## Plus icon ###############""*/
function showDropdown(element) {
    let selectBox = element.nextElementSibling; // Get the dropdown
    selectBox.style.display = "inline-block"; // Show dropdown
    selectBox.focus(); // Auto-focus
    element.style.display = "none"; // Hide plus icon
}

function saveSelection(select) {
    let selectedText = select.options[select.selectedIndex].text;
    let textSpan = select.nextElementSibling; // Get the saved text span
    
    if (select.value) {
        textSpan.textContent = selectedText; // Show selected text
        textSpan.style.display = "inline"; // Display text
    } else {
        select.previousElementSibling.style.display = "inline"; // Show plus icon again
    }
    select.style.display = "none"; // Hide dropdown
}

function editSelection(span) {
    let selectBox = span.previousElementSibling; // Get the dropdown
    selectBox.style.display = "inline-block"; // Show dropdown
    span.style.display = "none"; // Hide text span
}


function saveText(input) {
    let text = input.value.trim();
    let textSpan = input.nextElementSibling; // Get the saved text span
    if (text !== "") {
        textSpan.textContent = text; // Show entered text
        textSpan.style.display = "inline"; // Display text
    } else {
        input.previousElementSibling.style.display = "inline"; // Show plus icon again
    }
    input.style.display = "none"; // Hide input box
}

function handleKeyPress(event, input) {
    if (event.key === "Enter") {
        saveText(input);
    }
}

function editText(span) {
    let input = span.previousElementSibling; // Get the input box
    input.style.display = "inline-block"; // Show input box
    input.value = span.textContent; // Load the existing text
    input.focus();
    span.style.display = "none"; // Hide text span
}


document.addEventListener("DOMContentLoaded", () => {
    const cellules = document.querySelectorAll("td");
    cellules.forEach((cell) => {
      const text = cell.textContent.trim().toLowerCase();
      if (text === "todo") {
        cell.style.color = "blue";
      } else if (text === "in_progress") {
        cell.style.color = "#FFCC80";
      } else if(text === "done"){
        cell.style.color = "green";
      }
    });
  });
  

      document.addEventListener("DOMContentLoaded", function () {
      const rows = document.querySelectorAll("td[Status]");

      rows.forEach(row => {
        const status = row.getAttribute("data-status");

        if (status === "todo" || status === "in_progress") {
          const actionCell = row.querySelector("td:last-child");
          const button = document.createElement("button");
          button.className = "btn btn-primary btn-action";
          button.textContent = status === "todo" ? "Start Task" : "Mark Done";
          actionCell.appendChild(button);
        }
      });
    });




/*
const buttondel = document.getElementById('bouttondelete')
const toasts = document.getElementById('toasts')



const types = ['info', 'success', 'error']

buttondel.addEventListener('click', () => createNotification())

function createNotification(message = null, type = null) {
    const notif = document.createElement('div')
    notif.classList.add('toast')
    notif.classList.add('success')

    notif.innerText = "notification has been deleted successfully"

    toasts.appendChild(notif)

    setTimeout(() => {
        notif.remove()
    }, 3000)
}
*/


