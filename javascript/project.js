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

/*########### boxes ########""*/
document.getElementById("addBox").addEventListener("click", () => {
    //const container = document.querySelector(".container");

    // Create a new box
    //const newBox = document.createElement("div");
    //newBox.classList.add("box", "new-box");
    //newBox.textContent = "Project " + container.children.length; // Numbered Boxes

    // Insert new box after the addBox
    //container.insertBefore(newBox, container.children[1]);

    window.location.href = "creationProjet.php";
});



