<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="module.css" />
        <title>Connexion</title>
    </head>

    <body class="bodyinscription">

        <header class="header_ins">
            <h1>Connexion</h1>
        </header>

        <main class="main_ins">
            <section class="boite_ins">
                <form class="form_ins" action="connexion.php" method="post">
                    <article class="pseudo_ins">
                        <label for="pseudo">Votre pseudo :</label>
                        <input type="text" id="pseudo" name="login" required>
                    </article>
                    <article class="mp_ins">
                        <label for="motdepasse">Votre mot de passe :</label>
                        <input type="password" id="motdepasse" name="password" required>
                    </article>
                    <article class="button_ins">
                        <button type="submit">Valider</button>
                    </article>
                </form>
                    <article class="linkcreate">
                        <a href="inscription.html">Créer un compte</a>
                        <a href="motdepasse.html">Mot de passe oublié</a>
                    </article>
            </section>
        </main>

        <footer class="footer_ins">
            <p>Yaya-production™️</p>
        </footer>

    </body>
</html>