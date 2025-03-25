<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Title</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="css/Mainpage.css">
        <script type="text/javascript" src="javascript/Mainpage.js"></script>
    </head>
    <body>
        <?php include 'Backend/Mainpage2Server.php' ?>



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
                    <span class="username"><?php echo htmlspecialchars($_SESSION['username']); ?></span> 
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
            <li><a href="#"><img src="images/board.png" class="dashicon">My board</a></li>
            <li><a href="project.php"><img src="images/projets.png" class="dashicon">Projects</a></li>
        </ul>
    </div>




    <div class="table-container" id="tableContainer">
        <h1>Tableur</h1><br>
        <table>
            <thead>
                <tr>
                    <th>Card</th>
                    <th>Project</th>
                    <th>Status</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                
            </thead>
            <tbody>
                <?php if (!empty($resultats)): ?>
                <?php foreach ($resultats as $row): ?>     
                <?php    
                    $isChef = false;
                    if (isset($_SESSION['username'])) {
                        $query = "SELECT COUNT(*) as count FROM projects 
                        WHERE name = :projectname AND chef = :userid";
                        
                        $stmt = $conn->prepare($query);
                        $stmt->execute([
                        ':projectname' => $row['name'],
                        ':userid' => $_SESSION['iduser'],
                    ]);
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    $isChef = ($result['count'] > 0);
                }
                ?>          
                <tr>
                    <td><a href="#"><?= htmlspecialchars($row['title'])?></a></td>
                    <td><?= htmlspecialchars($row['name']); ?></td>
                    <td><?= htmlspecialchars($row['status']); ?></td>
                    <td>
                        <?php if ($row['status'] === 'todo'): ?>
                        <form method="POST" action="" style="display:inline;">
                            <input type="hidden" name="updatestart_title" value="<?= $row['title'] ?>">
                            <button type="submit" id="bouttonstart" class="btn btn-primary">start</button>
                        </form>
                        <?php endif; ?>
                    </td>
                    
                    <td>
                        <?php if ($row['status'] === 'todo' || $row['status'] === 'in_progress'): ?>
                            <form method="POST" action="" style="display:inline;">
                                <input type="hidden" name="update_title" value="<?= $row['title'] ?>">
                                <button type="submit" id="bouttonupdate" class="btn btn-success">done</button>
                            </form>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if($isChef): ?>
                            <form method="POST" action="" style="display:inline;">
                                <input type="hidden" name="delete_title" value="<?= $row['title'] ?>">
                                <input type="hidden" name="delete_name" value="<?= $row['idproject'] ?>">
                                <button type="submit" id="bouttondelete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                            </form>
                        <?php endif; ?>    
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

         
     



    </body>
</html>
