<?php
    ini_set('session.gc_maxlifetime',60);
    session_start();
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $attempts=0;
        if(isset($_POST['resposta'])){
            $resposta=$_POST['resposta'];
            $resposta=strtolower($resposta);
            $capcha_value=$_SESSION['capcha'];
            $capcha_resposta= str_replace(".png","",$capcha_value);

                if($attempts==11){
                    $_SESSION['error']="Masses intents fallits";
                }else{
                    if($resposta===$capcha_resposta){
                        header("Location: acces.php");
                    }else{                  
                        $_SESSION['error']="Capcha incorrecte";
                        header("Location: index.php");
                        $attempts++;
                    }
                }             
        }else{
            header("Location: index.php");
        }            
    
    }

    


?>