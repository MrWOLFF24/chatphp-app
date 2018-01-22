<?php
session_start();
include 'connectTobdd.php';
/**********
 *
 *  send all data recive from form to data base
 */
            //set paris timezone
            date_default_timezone_set('Europe/Paris');

    $pseudo = htmlspecialchars($_SESSION['pseudo']);
    $message = htmlspecialchars($_POST['message']);

            $date_message = new DateTime("NOW"); //new DateTime
            $date_message = $date_message->format('Y-m-d H:i:s'); //convert to french format

        //send data with request sql
        $req = $bdd->prepare("INSERT INTO messages 
                            (pseudo, message, date_message) 
                            VALUES('$pseudo', '$message', '$date_message')");

        //execute the request and send data to data base
        $req->execute(array(
            'pseudo' => $pseudo,
            'message' => $message,
            'date_message' => $date_message
        ));

    header('Location:tchat.php'); //redirect to tchat.php