<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    
    <?php include 'Backend/signupServer.php' ?>    

    <div class="wrapper">
        <form action="" method="post">
            <h1>Create a New Account</h1>

            <div class="input-box">
                <input type="text" id="fullname" name="fullname" required>
                <label>    
                    <span style="transition-delay: 0ms">f</span>
                    <span style="transition-delay: 50ms">u</span>
                    <span style="transition-delay: 100ms">l</span>
                    <span style="transition-delay: 150ms">l</span>
                    <span style="transition-delay: 200ms">n</span>
                    <span style="transition-delay: 250ms">a</span>
                    <span style="transition-delay: 300ms">m</span>
                    <span style="transition-delay: 350ms">e</span>
                </label>
            </div>

            <div class="input-box">
                <input type="text" id="username" name="username"  required>
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
                <input type="email" id="email" name="email"  required>
                <label>
                    <span style="transition-delay: 0ms">e</span>
                    <span style="transition-delay: 50ms">m</span>
                    <span style="transition-delay: 100ms">a</span>
                    <span style="transition-delay: 150ms">i</span>
                    <span style="transition-delay: 200ms">l</span>
                </label>
            </div>

            <div class="input-box">
                <input type="password" id="password" name="password" minlength="6" required>
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


            <div class="role-box">
                <label>Role</label>
                <div class="role">
                    <input type="radio" id="etudiant" name="role" value="Etudiant" required>
                    <label for="etudiant">Étudiant</label>

                    <input type="radio" id="professionnel" name="role" value="profesionnal">
                    <label for="professionnel">Professionnel</label>
                </div>
            </div>

           <br> 
           <div class="btn">
                <button type="submit" class="btn">Sign Up</button>
            </div>
 
           <span>already have an account ? <a href="authent.php"> sign in now</a></span>
        </form>
    </div>

        <script src="javascript/login.js"></script>

   


</body>
</html>
