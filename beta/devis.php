<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        Merci pour votre soumission !
        <?php
        
        $recapOptions = array();
        $recapLocation = array();
        $recapUser = array();
        //Type of event/Options
        if (isset($_POST['event'])) {
            $event = htmlspecialchars($_POST['event']);
            array_push($recapOptions, "<li>Evenement : <b>" . $event . "</b></li>");
        }
	
	if (isset($_POST['BarmanSeul'])) {
            $barmanSeul = "BarmanSeul";
            array_push($recapOptions, "<li><b>Barman seul</b></li>");
        }
	
	if (isset($_POST['BarLumineux'])) {
            $barLumineux = "BarLumineux";
            array_push($recapOptions, "<li><b>Bar lumineux</b></li>");
        }
	
	if (isset($_POST['Verrerie'])) {
            $verrerie = "Verrerie";
            array_push($recapOptions, "<li><b>Verrerie</b></li>");
        }
	
	if (isset($_POST['Soft'])) {
            $soft = "Soft";
            array_push($recapOptions, "<li><b>Soft</b></li>");
        }

	if (isset($_POST['Flair'])) {
            $flair = "Flair";
            array_push($recapOptions, "<li><b>Flair</b></li>");
        }
	
	if (isset($_POST['MachineFumee'])) {
            $machinefumee = "MachineFumee";
            array_push($recapOptions, "<li><b>Machine à fumée</b></li>");
        }
	
	if (isset($_POST['Japonais'])) {
            $jap = "Japonais";
            array_push($recapOptions, "<li><b>Traiteur japonais</b></li>");
        }
	
	if (isset($_POST['Cupcake'])) {
            $cup = "Cupcake";
            array_push($recapOptions, "<li><b>Traiteur cupcake</b></li>");            
        }
	
	if (isset($_POST['Luminaire'])) {
            $luminaire = "Luminaire";
            array_push($recapOptions, '<li><b>Luminaire</b></li>');
        }
	//Location
	if (isset($_POST['Date']) && !empty($_POST['Date'])) {
            $date = $_POST['Date'];
            array_push($recapLocation, "<li>Date : <b>" . htmlspecialchars($_POST['Date']) . "</b></li>");
	}
	
	if (isset($_POST['Duree'])) {
            $duree = $_POST['Duree'];
            array_push($recapLocation, "<li>Durée : <b>" . $duree . "</b></li>");
	}
        
	if (isset($_POST['Lieu']) && !empty($_POST['Lieu'])) {
            $lieu = $_POST['Lieu'];
            array_push($recapLocation, "<li>Lieu : <b>" . $lieu . "</b></li>");
	}
        //User info
	if (isset($_POST['Lastname']) && !empty($_POST['Lastname'])) {
            $lastname = $_POST['Lastname'];
	}
	if (isset($_POST['Firstname']) && !empty($_POST['Firstname'])) {
            $firstname = ' ' . $_POST['Firstname'];
	}
	if (isset($_POST['Email']) && !empty($_POST['Email'])) {
            $email = $_POST['Email'];
	}
	if (isset($_POST['Phonenumber']) && !empty($_POST['Phonenumber'])) {
            $phonenumber = $_POST['Phonenumber'];
            $phoneHTML = "Vous avez indiqué votre numéro de téléphone : <b>" . $phonenumber . "</b><span style=\"font-style:italic;\"></span><br>Si celui-ci est erroné, veillez à nous le signaler au 06.18.94.19.81 ou <a href=\"mailto:info_cocktailadom@gmail.com\">info_cocktailadom@gmail.com</a>";
	}
        
        
	
        $mail_title = "Cocktailadom a bien reçu votre demande de devis.";
        $mail_body = file_get_contents('./email.html');
        $mail_body = str_replace('__FIRST_NAME__', $firstname, $mail_body);
        $mail_body = str_replace('__PHONE_NUMBER__', $phoneHTML, $mail_body);
        $mail_body = str_replace('__OPTIONS__', implode($recapOptions), $mail_body);
        $mail_body = str_replace('__LOCATION__', implode($recapLocation), $mail_body);
        $headers =  'MIME-Version: 1.0' . "\r\n" .
                    'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
                    'From: Cocktailadom' . "\r\n" .//Cocktailadom <info_cocktailadom@gmail.com> --> Seems to be excluded by gmail
                    'Reply-To: info_cocktailadom@gmail.com';
//        $headers = '';
	mail($email, $mail_title, $mail_body, $headers);
//        echo "<br>email:" . $email;
//        echo "<br>mail_title:" . $mail_title;
//        echo "<br>mail_body:" . $mail_body;
//        echo "<br>headers:" . $headers;
        echo "<br>un récapitulatif vous a été envoyé par e-mail (<b>" . $email . "</b>). Nous vous contacterons directement afin de vous proposer un devis détaillé.";
        echo "<br>Si vous n'avez pas reçu de confirmation, pensez à vérifier votre dossier spam.";
        echo "<br><br><a href='http://www.cocktailadom.com'>Retour au site</a>";
        ?>

    </body>
</html  