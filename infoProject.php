<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Title</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="css/infoProject.css">
        <script type="text/javascript" src="javascript/Mainpage.js"></script>
    </head>
    <body>
        <?php 
        include 'Backend/infoProjectServer.php'; 
        include 'Backend/chatServer.php';
        include 'Backend/exitProjectServer.php';
        ?>




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
            <li><a href="Mainpage2.php"><img src="images/board.png" class="dashicon">My board</a></li>
            <li><a href="project.php"><img src="images/projets.png" class="dashicon">Projects</a></li>
        </ul>
    </div>


 
<div class="container-fluid mt-4">
    <div class="row mb-3">

    </div>        
    <div class="row">
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Project Chat</h5>
                    <button class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#addUserModal">
                        <i class="fas fa-user-plus"></i> Add User
                    </button>
                </div>
                <div class="card-body chat-area" id="chatArea" style="height: 400px; overflow-y: auto;">
                    
                    <?php if(!empty($fetchmessages)): ?>
                    <?php foreach($fetchmessages as $row): ?> 
                    <?php if($row['idsender'] == $_COOKIE['iduser']): ?>
                        <div class="chat-message sent">
                            <strong><?= htmlspecialchars($row['username']) ?> :</strong> <?= htmlspecialchars($row['message']) ?>
                        </div>
                   <?php else: ?>
                        <div class="chat-message received">
                            <strong><?= htmlspecialchars($row['username']) ?> : </strong> <?= htmlspecialchars($row['message']) ?>
                        </div>
                    

                    <?php endif; ?>
                    <?php endforeach; ?>
                    <?php endif; ?>

                        
                </div>
                <div class="card-footer">
                    <div class="input-group">
                        <form action="" method="post">
                           
                            <input type="text" name="message" class="form-control" placeholder="Type your message...">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </form>
                    </div>
                </div>
            </div>
                    <?php if($isChef): ?>
                        <div class="card mt-3">
                <div class="card-header bg-secondary text-white">
                    <h5 class="mb-0">Create New Task</h5>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="taskTitle" class="form-label">Task Title</label>
                            <input type="text" class="form-control" name="Title" required>
                        </div>
                        <div class="mb-3">
                            <label for="taskDescription" class="form-label">Description</label>
                            <textarea class="form-control"  name="Description" rows="3" required></textarea>
                        </div>
                        <input type="hidden" name="project_id" value="<?php echo $project_id; ?>">
                        <button type="submit" name="add_task" class="btn btn-success w-100">Create Task</button>
                    </form>
                </div>
            </div>
                    <?php endif; ?>
        </div>
        
     
        <div class="col-md-8">
          
            <div class="card mb-3">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">Team Members</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($contributors)): ?>
                                <?php foreach ($contributors as $row): ?>     
                                <tr>
                                    <td><?= htmlspecialchars($row['username']) ?></td>
                                </tr>
                                <?php endforeach; ?>
                                <?php endif;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
           
            <div class="card mb-3">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Current Tasks</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Task</th>
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
                                    <td><?= htmlspecialchars($row['title']); ?></td>
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
            </div>
            
          
            <div class="card">
                <div class="card-header bg-warning text-dark">
                    <h5 class="mb-0">Project Timeline</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Milestone</th>
                                    <th>Deadline</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Planning Phase</td>
                                    <td>March 30, 2025</td>
                                </tr>
                                <tr>
                                    <td>Development</td>
                                    <td>April 15, 2025</td>
                                </tr>
                                <tr>
                                    <td>Testing</td>
                                    <td>April 25, 2025</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        
            <?php if($isChef) : ?>   
            <div class="card mt-3">
                <div class="card-header bg-purple text-white" style="background-color: #6f42c1;">
                    <h5 class="mb-0">Add Team Member</h5>
                </div>
                <div class="card-body">
                    <form method="post" action="" class="d-flex align-items-center">
                        <div class="flex-grow-1 me-2">
                            <input type="text" name="username" class="form-control" placeholder="Enter username" required>
                            <input type="hidden" name="project_id" value="<?php echo $project_id; ?>">
                        </div>
                        <button type="submit" name="add_user" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
            <?php endif; ?>



        
        </div>
    </div>

    <?php if(isset($_SESSION['error'])): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= htmlspecialchars($_SESSION['error']) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>
     


<div class="row mt-3">
    <div class="col-12 d-flex justify-content-end">
        <form method="post" action="">
            
            <input hidden name="idproject" value="<?php echo $project_id; ?>">
            <button type="submit" class="btn btn-danger">Exit Project</button>
        </form>
    </div>
</div>                                    
</div>

<!--
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">Add User to Project</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="userEmail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="userEmail" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="userRole" class="form-label">Role</label>
                        <select class="form-select" id="userRole">
                            <option value="member">Member</option>
                            <option value="admin">Admin</option>
                            <option value="viewer">Viewer</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Send Invitation</button>
            </div>
        </div>
    </div>
</div>

    -->

</div>

         
     



    </body>
</html>
