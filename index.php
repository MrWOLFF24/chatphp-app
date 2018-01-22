<?php   $title = "Bienvenue sur le chat";
        include ("inc/head.php");
?>

        <div class="container">
            <h1>Bienvenue sur le mini Chat.</h1>
            <p>Pour commencer a tchatter veillez rentrer votre pseudo!</p>
            <div class="index-form">
                <!-- pseudo form -->
                <form method="post" action="index.php">
                    <div class="message_input_wrapper--index">
                        <input class="message_input--index" type="text" name="pseudo" id="pseudo" minlength="3"  placeholder="Entrer votre pseudo ..." required />
                    </div>
                    <input class="send-message--index" type="submit" value="Entrer" />
                </form>
            </div>
        </div>
<?php include ("inc/footer.php"); ?>