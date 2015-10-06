<html>
    <body>
        Merci pour votre soumission, un récapitulatif vous a été envoyé par e-mail. Nous vous contacterons directement afin de vous proposer un devis détaillé.
        <?php
        
        $recapOptions = array();
        $recapLocation = array();
        $recapUser = array();
        //Type of event/Options
        if (isset($_POST['event'])) {
            $event = htmlspecialchars($_POST['event']);
            array_push($recapOptions, "<li>Evenement : " . $event . "</li>");
        }
	
	if (isset($_POST['BarmanSeul'])) {
            $barmanSeul = "BarmanSeul";
            array_push($recapOptions, "<li>Barman seul</li>");
        }
	
	if (isset($_POST['BarLumineux'])) {
            $barLumineux = "BarLumineux";
            array_push($recapOptions, "<li>Bar lumineux</li>");
        }
	
	if (isset($_POST['Verrerie'])) {
            $verrerie = "Verrerie";
            array_push($recapOptions, "<li>Verrerie</li>");
        }
	
	if (isset($_POST['Soft'])) {
            $soft = "Soft";
            array_push($recapOptions, "<li>Soft</li>");
        }

	if (isset($_POST['Flair'])) {
            $flair = "Flair";
            array_push($recapOptions, "<li>Flair</li>");
        }
	
	if (isset($_POST['MachineFumee'])) {
            $machinefumee = "MachineFumee";
            array_push($recapOptions, "<li>Machine à fumée</li>");
        }
	
	if (isset($_POST['Japonais'])) {
            $jap = "Japonais";
            array_push($recapOptions, "<li>Traiteur japonais</li>");
        }
	
	if (isset($_POST['Cupcake'])) {
            $cup = "Cupcake";
            array_push($recapOptions, "<li>Traiteur cupcake</li>");            
        }
	
	if (isset($_POST['Luminaire'])) {
            $luminaire = "Luminaire";
            array_push($recapOptions, '<li>Luminaire</li>');
        }
	//Location
	if (isset($_POST['Date'])) {
            $date = $_POST['Date'];
            array_push($recapLocation, "<li>Date : " . htmlspecialchars($_POST['Date'] . "</li>"));
	}
	
	if (isset($_POST['Duree'])) {
            $duree = $_POST['Duree'];
            array_push($recapLocation, "<li>Durée : " . $duree . "</li>");
	}
        
	if (isset($_POST['Lieu'])) {
            $lieu = $_POST['Lieu'];
            array_push($recapLocation, "<li>Lieu : " . $lieu . "</li>");
	}
        //User info
	if (isset($_POST['Lastname'])) {
            $lastname = $_POST['Lastname'];
	}
	if (isset($_POST['Firstname'])) {
            $firstname = ' ' . $_POST['Firstname'];
	}
	if (isset($_POST['Email'])) {
            $email = $_POST['Email'];
	}
	if (isset($_POST['Phonenumber'])) {
            $phonenumber = $_POST['Phonenumber'];
	}
        
        
	
        $mail_title = "Cocktailadom a bien reçu votre demande de devis.";
        $mail_body = file_get_contents('./email.html');
        $mail_body = str_replace('__FIRST_NAME__', $firstname, $mail_body);
        $mail_body = str_replace('__PHONE_NUMBER__', $phonenumber, $mail_body);
        $mail_body = str_replace('__OPTIONS__', implode($recapOptions), $mail_body);
        $mail_body = str_replace('__LOCATION__', implode($recapLocation), $mail_body);
        $headers =  'MIME-Version: 1.0' . "\r\n" .
                    'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
                    'From: info_cocktailadom@gmail.com';
//        $headers = '';
	mail($email, $mail_title, $mail_body, $headers);
        ?>

    </body>
</html  