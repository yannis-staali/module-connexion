<?php 
session_start();

if(!isset($_SESSION['connexion']))
{
    header('location: connexion.php');
    exit();
}

if(isset($_POST['submit']))
{
    if(!empty($_POST))
    {   
        $login= $_POST['login'];
        $prenom= $_POST['prenom'];
        $nom= $_POST['nom'];
        $password = $_POST['password'];
        $password2= $_POST['password2'];

        if($password==$password2)
        {
            $connexion = mysqli_connect("localhost","root","","moduleconnexion") or die('erreur');
            $requete = ("UPDATE `utilisateurs` SET login = '$login', prenom = '$prenom', nom = '$nom', password = '$password' WHERE login = '$login' ");
            $query = mysqli_query($connexion, $requete);
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="module.css" />
        <title>Profil</title>
    </head>  

    <body class="bodyinscription">
        <header class="header_ins">
            <h1>Profil</h1>
        </header>

        <main class="main_ins">
            <section class="boite_ins">
                <form class="form_ins" action="profil.php" method="post">
                <h1 class="head_profile">Modifiez vos informations</h2>
                    <article class="pseudo_ins">
                        <label for="login">Votre pseudo :</label>
                        <input type="text" id="login" name="login" required>
                    </article>
                    <article class="firstName_ins">
                        <label for="enterFirstName">Prénom :</label>
                        <input type="text" id="enterFirstName" name="prenom" required>
                    </article>
                    <article class="lastName_ins">
                        <label for="enterLastName">Nom :</label>
                        <input type="text" id="enterLastName" name="nom" required>
                    </article>
                    <article class="mp_ins">
                        <label for="enterMp">Votre mot de passe (au moins 8 caractères) : </label>
                        <input pattern=".{8,}" type="password" id="enterMp" name="password" required>
                    </article>
                    <article class="mp_ins">
                        <label for="confirmMp">Confirmez votre mot de passe :</label>
                        <input pattern=".{8,}" type="password" id="confirmMp" name="password2" >
                    </article>      
                    <article class="button_ins">
                        <button type="submit" name="submit">Valider</button>
                    </article>
                    <a href="deconnexion.php">Deconnexion</a>
                </form>
            </section>
        </main>

        <footer class="footer_ins">
            <p>Yaya-production™️</p>
        </footer>
        
    
    </body>
</html>