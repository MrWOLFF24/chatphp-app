<?php
    //secure data
    if (!empty($_POST) && isset($_POST['pseudo']) && !empty($_POST['pseudo'])) {
        session_start();
        $_SESSION['pseudo'] = $_POST['pseudo'];
        header('Location:tchat.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Bienvenue sur le chat</title>
        <!-- Stylesheet CSS -->
        <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>

    <body>
        <div class="container">
            <h1>Bonjour et bienvenue sur mon mini Chat.</h1>
            <p>Pour commencer a tchatter veillez rentrer votre pseudo!</p>
        </div>

            <!-- pseudo form -->
            <form method="post" action="index.php">
                <div class="bottom_wrapper bottom_wrapper_1">

                    <div class="message_input_wrapper">
                        <input class="message_input" type="text" name="pseudo" id="pseudo"  placeholder="Entrer votre pseudo ..." required />
                    </div>

                        <input class="send-message" type="submit" value="Envoyer" />
                </div>
            </form>
        </div>

        <!-- JavaScript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" rel="script" src="js/chat_app.js"></script>
    </body>
</html>