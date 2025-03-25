<!DOCTYPE html>
<html  lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>ERGO</title>
        <script src="javascript/login.js"></script>
        <link rel="stylesheet" href="css/index.css">
    </head>
    <body>
        <?php include "Backend/authentServer.php" ?>
            <?php
                if (isset($_SESSION['error'])) {
                echo "<p style='color: red;'>" . $_SESSION['error'] . "</p>";
                unset($_SESSION['error']); 
            }
    ?>

        <div class="wrapper">
            <h1>Please log in</h1>
            <form action="" method="POST">
                <div class="input-box">
                    <input type="text"   name="username"  required>  
                    
                    <label>
                        <span style="transition-delay: 0ms">u</span>
                            <span style="transition-delay: 50ms">s</span>
                            <span style="transition-delay: 100ms">e</span>
                            <span style="transition-delay: 150ms">r</span>
                            <span style="transition-delay: 200ms">n</span>
                            <span style="transition-delay: 250ms">a</span>
                            <span style="transition-delay: 300ms">m</span>
                            <span style="transition-delay: 350ms">e</span>
                    </label>
                </div>  
                <div class="input-box">
                    <input type="password" name="password"  minlength="6" maxlength="20" required>
                    <label>
                        <span style="transition-delay: 0ms">p</span>
                        <span style="transition-delay: 50ms">a</span>
                        <span style="transition-delay: 100ms">s</span>
                        <span style="transition-delay: 150ms">s</span>
                        <span style="transition-delay: 200ms">w</span>
                        <span style="transition-delay: 250ms">o</span>
                        <span style="transition-delay: 300ms">r</span>
                        <span style="transition-delay: 350ms">d</span>
                    </label>
                </div>
                <button type="submit" class="btn"> Login </button>
                <p>don't have an account ? <a href="signup.php">sign up</a></p>
        </form>
    </div>
    


<script>
  if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
  }
</script>

</body>
    </html>