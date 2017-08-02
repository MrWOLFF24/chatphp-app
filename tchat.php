<?php
    //secure data
    session_start();
    if (!isset($_SESSION['pseudo']) || empty($_SESSION['pseudo'])) {
        header('Location:index.php');
    }
    include 'connectTobdd.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Mini Chat</title>
        <!-- Stylesheet CSS -->
        <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>

    <body>
        <div class="container">
            <h1>Mini Chat.</h1>
            <p>Bonjour, pour commencer a tchatter veillez rentrer votre message!</p>
            <p>Pas de pub, pas d'insultes, pas de flood sinon banni. Merci :) Lisez le règlement du chat <a href="rules.php">ici</a></p>
        </div>
        <!-- Chat window -->
        <div class="chat_window">
            <div class="top_menu">
                <div class="title">Chat</div>
                <p>Utilisateur : <?php echo $_SESSION['pseudo']; ?></p>
            </div>
            <!-- Show messages -->
            <ul class="messages">
                <?php
                /******* __ Collect last messages in the data base __ ********/

                $response = $bdd->query('SELECT pseudo, message, DATE_FORMAT(date_message, "%d/%m/%Y %Hh %imin %ss") 
                                                          AS date_message FROM messages ORDER BY id DESC LIMIT 0, 5');

                while ($donnees = $response->fetch()) {

                    echo "<p class='chat_message'>" . "<em>" . $donnees['date_message'] . "</em> " . "<hr>" .
                        "<img src='img/boy.png'> " . "<strong>" . htmlspecialchars($donnees['pseudo']) .
                        "</strong> : " . htmlspecialchars($donnees['message']) . "</p>";
                }
                $response->closeCursor();
                ?>
            </ul>
            <!-- send data with post method -->
            <form method="post" action="sendTobdd.php">
                <div class="bottom_wrapper">

                    <div class="message_input_wrapper">
                        <input class="message_input_1" type="text" name="message" id="message"  placeholder="Tapez votre message ici ..." required />
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