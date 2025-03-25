<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Title</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="css/project.css">
        
    </head>
    <body>
        <?php include "Backend/projectServer.php" ?>
        <nav>
            <ul class="topnav" id="dropdownClick">
                
                <li class="topnav-left">
                <a href="javascript:void(0);" onclick="Dashboard()">
                    <img src="images/dash.png" class="dash-icon">
                </a>
            </li>
                <li class="topnav-right">
                <a href="javascript:void(0);" onclick="toggleUserPanel()">
                    <img src="images/user.png" class="usericon">
                </a>
               </li> 
                <li class="topnav-right">
                    <a href="javascript:void(0);" onclick="toggleThemePanel()">
                        <img src="images/settings.png" class="sett-icon">
                    </a>
                </li>
                <li class="topnav-right"><a href="#"><img src="images/notification.png" class="not-icon"> </a></li>
                
                <li class="icon">
                    <a href="javascript:void(0);" onclick="dropdownMenu()">&#9776;</a>
                </li>
            </ul>
        </nav>
        
  
    <div id="userPanel" class="hidden-panel">
        <ul>
            <li class="profile">
                <a href="#">
                    <img src="images/user.png" class="profil-icon">
                    <span class="username">User Name</span> 
                </a>
            </li>
            <hr>

            <li>
                <a href="Backend/logout.php">
                    <img src="images/logout.png" class="log-icon">
                    Logout
                </a>
            </li>
        </ul>
    </div>

    
    <div id="themePanel" class="theme-panel">
        <h3>Theme Settings</h3>
        <label class="switch">
            <input type="checkbox" id="themeToggle" onchange="toggleTheme()">
            <span class="slider"></span>
        </label>
        <p id="themeLabel">Dark Mode</p>
    </div>

        
        <div class="main-container">
    <div class="dash-board" id="dashboard">
        <ul class="dashboard">
            <li><a href="Mainpage2.php"a><img src="images/board.png" class="dashicon">My board</a></li>
            <li><a href="#"><img src="images/projets.png" class="dashicon">Projects</a></li>
        </ul>
    </div>

    <div class="Boxes" >
         <h1>Current Projects</h1>
        
            <div class="container">
                <a href="creationProjet.php" class="box add-box" id="addBox">
                    <span class="plus">+</span>
                </a>
                 
                <?php if (!empty($resultatProjets)): ?>
                <?php foreach ($resultatProjets as $row): ?>     
                    <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($row['name']);?></h5>
                        <p class="card-text"><?= htmlspecialchars($row['description']);?></p>
                        <a href="infoProject.php?project_id=<?php echo $row['idproject']; ?> class="card-link" >Navigate</a>
                        <?php if($_COOKIE['iduser'] == $row['chef']):?>
                            <form method="POST" action="" style="display:inline;">
                                <input type="hidden" name="delete_project" value="<?= $row['idproject'] ?>">
                                <button type="submit" id="bouttondelete" class="btn btn-danger" style="float: right;" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                            </form>
                        <?php endif; ?>
                    </div>
                    </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
        
    </div>
</div>

    <script type="text/javascript" src="javascript/project.js"></script>
    </body>
</html>
