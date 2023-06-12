<?php
    session_start();

     if (isset($_SESSION['error'])) {
        echo '<h2 class="error">' . $_SESSION['error'] . '</h2>';
        unset($_SESSION['error']);
    }

?>


<!DOCTYPE html>
<html lang="ca">
<head>
    <title>Accés</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="container" id="container">
    <div class="form-container sign-up-container">
        <form action="process.php" method="post">
            <h1>Registra't</h1>
            <span>crea un compte d'usuari</span>
            <input type="hidden" name="method" value="signup"/>
            <input type="text" placeholder="Nom" />
            <input type="email" placeholder="Correu electronic" />
            <input type="password" placeholder="Contrasenya" />
            <button>Registra't</button>
        </form>
    </div>
    <div class="form-container sign-in-container">
        <form action="process.php" method="post">
            <h1>Ets humà?</h1>
            <br>
            <span>Introdueix els caràcters presents a la imatge</span>
            <input type="text" name="resposta" placeholder="Caràcters" />
            <button name="boto">Continua</button>
        </form>
    </div>
    
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-right">
                <div class="capcha-container">
                    <button class="capcha-refresh" onClick="
                    <?php 
                        $dir_path="capcha";
                        $files=scandir($dir_path);
                        $rand=rand(2,count($files)-1);
                    ?>">
                    <i class="fa fa-refresh"></i></button>
                    <img src="
                    <?php 
                        echo $dir_path."/".$files[$rand];
                        $_SESSION['capcha']=$files[$rand];
                    ?>" >
                 </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

