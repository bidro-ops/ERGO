<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href = "css/admin.css" rel="stylesheet">
</head>
<body>
    <?php include "Backend/AdminServer.php" ?>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="javascript:void(0);" class="nav-link">
                        <img src="images/notification.png" class="nav-icon">
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="settingsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="images/settings.png" class="nav-icon">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="settingsDropdown">
                        <li>
                            <a class="dropdown-item" href="#">
                                <img src="images/theme.png" alt="Theme">
                                Toggle Dark/Light Mode
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <img src="images/preferences.png" alt="Preferences">
                                Preferences
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <img src="images/help.png" alt="Help">
                                Help & Support
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="images/user.png" class="nav-icon">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">

                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item text-danger" href="Backend/logout.php">
                                <img src="images/logout.png" alt="Logout">
                                Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <div class="main-container">


        <div class="table-container">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="scrollable-box">
                        <h3 class="mb-4">Active Projects</h3>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Project ID</th>
                                    <th>Project Name</th>
                                    <th>Status</th>
                                    <th>Creation date</th>
                                    <th>Creator</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if( !empty($listeprojects) ): ?>
                            <?php foreach($listeprojects as $row): ?>    
                                <tr>
                                    <td><?= htmlspecialchars($row['idproject']) ?></td>
                                    <td><?= htmlspecialchars($row['name']) ?></td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td><?= htmlspecialchars($row['created_at']) ?></td>
                                    <td><?= htmlspecialchars($row['chef']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="scrollable-box">
                        <h3 class="mb-4">User Management</h3>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>Username</th>
                                    <th>Join_date</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if( !empty($listeusers) ): ?>
                            <?php foreach($listeusers as $row): ?>    
                            <tr>
                                <td><?= htmlspecialchars($row['iduser']) ?></td>
                                <td><?= htmlspecialchars($row['username']) ?></td>
                                <td><?= htmlspecialchars($row['creationdate']) ?></td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>