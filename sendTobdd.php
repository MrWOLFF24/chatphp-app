<?php
session_start();
include 'connectTobdd.php';
/**********
 *
 *  send all data to data base
 */
            //set timezone at Paris
            date_default_timezone_set('Europe/Paris');

    $pseudo = htmlspecialchars($_SESSION['pseudo']);
    $message = htmlspecialchars($_POST['message']);

            $date_message = new DateTime("NOW"); //new DateTime
            $date_message = $date_message->format('Y-m-d H:i:s'); //convert to french format

        //send data with sql request
        $req = $bdd->prepare("INSERT INTO messages 
                            (pseudo, message, date_message) 
                            VALUES('$pseudo', '$message', '$date_message')");

        //execute the request and send data
        $req->execute(array(
            'pseudo' => $pseudo,
            'message' => $message,
            'date_message' => $date_message
        ));

    header('Location:tchat.php'); //redirect to tchat.php