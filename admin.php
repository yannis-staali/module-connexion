<?php
session_start();

if(!isset($_SESSION['admin']))
{
    header('location: connexion.php');
    exit();
}

else $connexion = mysqli_connect('localhost', 'root', '', 'moduleconnexion');
    $requete = 'SELECT * FROM utilisateurs';
    $query = mysqli_query($connexion, $requete);

    $champs = mysqli_fetch_fields($query);
    
    $resultat = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="module.css" />
        <title>Admin</title>
    </head>  

    <body class="bodyinscription">
        <header class="header_ins">
            <h1>Page Admin</h1>
        </header>

        <main class="admin_page">
            <section class="boite_admin">
                <h1 class="head_admin">Toutes les infos de la base de donnée</h2>
                <?php 
                echo "<table style=width='300px;' class='liste'>";
                echo '<tr>';
                foreach ($champs as $champ ) 
                {
                echo "<td> $champ->name </td>" ;
                }
                echo '</tr>';
                
                while(($resultat = mysqli_fetch_assoc($query))!=null)
                {
                    echo '<tr>';
                    foreach ($resultat as $value)
                    {
                    echo '<td>' . $value . '</td>';
                    }
                    echo '</tr>';
                }
                echo '</table>';
                ?>
                <a style="color:white; text-decoration:none;" href="deconnexion.php">Deconnexion</a>
            </section>
        </main>

        <footer class="footer_ins">
            <p>Yaya-production™️</p>
        </footer>
        
    
    </body>
</html>

<style>
.liste tr td{
    color: white;
    border: 1px solid white;
    border-collapse: collapse;
}
</style>