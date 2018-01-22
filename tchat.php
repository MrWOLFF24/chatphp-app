<?php
    //secure data
    session_start();
    if (!isset($_SESSION['pseudo']) || empty($_SESSION['pseudo'])) {
        header('Location:index.php');
    }
    include 'connectTobdd.php';
    $title = "Mini - chat";
    include 'inc/head.php';
?>

        <div class="container_chat">
            <h1>Mini Chat</h1>

            <!-- Chat window -->
            <div class="chat_window">
                <div class="top_menu">
                    <p>Bienvenu sur le chat : <?php echo $_SESSION['pseudo']; ?></p>
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
            </div>

            <div class="send_message">
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
        </div>
<?php include ("inc/footer.php"); ?>