<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Google Drive Api</title>
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
        <link href="estilo.css" rel="stylesheet">
    </head>
    <body>
    <header>
        <div id="titulo">ApiDrive Grupo 21</div>
    </header>
    <div  id="lista">
        <?php
        if (count($archivos->getItems()) == 0) {
             print "No existen archivos.\n";
        } else {
            foreach ($archivos->getItems() as $e) {
                $titulo = $e->getTitle();
                $url = $e->getwebContentLink();
                    echo "<br>";
                    print ("<a href =".$url.">".$titulo."</a>");
                    echo "<br>";
            }          
        }
        ?>
    </div>
    </body>
</html>
