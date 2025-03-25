<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Project Creation</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/creationproject.css">

</head>
<body>
    <?php include 'Backend/creationprojetServer.php' ?> 

  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="#">
        <svg width="30" height="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="me-2">
          <path d="M12 2L2 7L12 12L22 7L12 2Z" fill="#7952b3"/>
          <path d="M2 17L12 22L22 17" stroke="#7952b3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M2 12L12 17L22 12" stroke="#7952b3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <span class="fw-bold">ERGO</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" href="#">Projects</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="form-container">
          <div class="text-center mb-4">
            <div class="card-icon mx-auto">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 5V19M5 12H19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
            <h2 class="form-title text-center">Create New Project</h2>
            <p class="text-muted">Start your journey by creating a new project</p>
          </div>
          
          <form action="" method="post">
            <div class="mb-4">
              <label for="projectName" class="form-label">Project Name</label>
              <input type="text" class="form-control" name="projectName" placeholder="Enter project name" required>
            </div>
            
            <div class="mb-4">
              <label for="projectDescription" class="form-label">Project Description</label>
              <textarea class="form-control" name="projectDescription" rows="5" placeholder="Describe your project" required></textarea>
            </div>
            
            <div class="mb-4">
              <label class="form-label">Project Category</label>
              <select class="form-select form-control" name="projectType"> 
                <option selected>Select a category</option>
                <option value="projetprofessionel">professional project</option>
                <option value="projetetudiant">student project</option>
              </select> 
            </div>
            
            
            <div class="d-grid gap-2">
              <button type="submit" class="btn btn-primary">Create Project</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

 
  <div class="bg-light-purple py-5">
    <div class="container">
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
              <div class="rounded-circle bg-primary bg-opacity-10 p-3 d-inline-flex mb-3">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M2 17L12 22L22 17M2 12L12 17L22 12M2 7L12 2L22 7L12 12L2 7Z" stroke="#7952b3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </div>
              <h5>Organize</h5>
              <p class="text-muted">Keep your projects well-organized and easily accessible.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
              <div class="rounded-circle bg-primary bg-opacity-10 p-3 d-inline-flex mb-3">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M17 21V19C17 16.7909 15.2091 15 13 15H5C2.79086 15 1 16.7909 1 19V21M23 21V19C23 16.7909 21.2091 15 19 15H18M13 7C13 9.20914 11.2091 11 9 11C6.79086 11 5 9.20914 5 7C5 4.79086 6.79086 3 9 3C11.2091 3 13 4.79086 13 7ZM19 11C19 12.1046 18.1046 13 17 13C15.8954 13 15 12.1046 15 11C15 9.89543 15.8954 9 17 9C18.1046 9 19 9.89543 19 11Z" stroke="#7952b3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </div>
              <h5>Collaborate</h5>
              <p class="text-muted">Work with your team in real-time for better productivity.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
              <div class="rounded-circle bg-primary bg-opacity-10 p-3 d-inline-flex mb-3">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M9 12L11 14L15 10M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="#7952b3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </div>
              <h5>Complete</h5>
              <p class="text-muted">Track your progress and get things done efficiently.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

 
  <footer class="bg-white py-4 mt-5">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <p class="mb-0">© 2025 Project Hub. All rights reserved.</p>
        </div>
        <div class="col-md-6 text-md-end">
          <a href="#" class="text-decoration-none text-muted me-3">Privacy Policy</a>
          <a href="#" class="text-decoration-none text-muted">Terms of Service</a>
        </div>
      </div>
    </div>
  </footer>

 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>