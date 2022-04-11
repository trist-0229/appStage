<?php 
	require 'inc/bootstrap.php';
	require 'inc/header.php';
/*
	********************************************************************************************
	CONFIGURATION
	********************************************************************************************
*/
// destinataire est votre adresse mail. Pour envoyer à plusieurs à la fois, séparez-les par une virgule
$destinataire = 'tristan.souillard76@gmail.com';

// copie ? (envoie une copie au visiteur)
$copie = 'oui';

// Action du formulaire (si votre page a des paramètres dans l'URL)
// si cette page est index.php?page=contact alors mettez index.php?page=contact
// sinon, laissez vide
$form_action = '';

// Messages de confirmation du mail
$message_envoye = "Votre message nous est bien parvenu !";
$message_non_envoye = "L'envoi du mail a échoué, veuillez réessayer SVP.";

// Message d'erreur du formulaire
$message_formulaire_invalide = "Vérifiez que tous les champs soient bien remplis et que l'email soit sans erreur.";

/*
	********************************************************************************************
	FIN DE LA CONFIGURATION
	********************************************************************************************
*/

/*
 * cette fonction sert à nettoyer et enregistrer un texte
 */
function Rec($text)
{
	$text = htmlspecialchars(trim($text), ENT_QUOTES);
	if (1 === get_magic_quotes_gpc())
	{
		$text = stripslashes($text);
	}

	$text = nl2br($text);
	return $text;
};

/*
 * Cette fonction sert à vérifier la syntaxe d'un email
 */
function IsEmail($email)
{
	$value = preg_match('/^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!\.)){0,61}[a-zA-Z0-9_-]?\.)+[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!$)){0,61}[a-zA-Z0-9_]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/', $email);
	return (($value === 0) || ($value === false)) ? false : true;
}

// formulaire envoyé, on récupère tous les champs.
$nom     = (isset($_POST['nom']))     ? Rec($_POST['nom'])     : '';
$email   = (isset($_POST['email']))   ? Rec($_POST['email'])   : '';
$objet   = (isset($_POST['objet']))   ? Rec($_POST['objet'])   : '';
$message = (isset($_POST['message'])) ? Rec($_POST['message']) : '';

// On va vérifier les variables et l'email ...
$email = (IsEmail($email)) ? $email : ''; // soit l'email est vide si erroné, soit il vaut l'email entré
$err_formulaire = false; // sert pour remplir le formulaire en cas d'erreur si besoin

if (isset($_POST['envoi']))
{
	if (($nom != '') && ($email != '') && ($objet != '') && ($message != ''))
	{
		// les 4 variables sont remplies, on génère puis envoie le mail
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'From:'.$nom.' <'.$email.'>' . "\r\n" .
				'Reply-To:'.$email. "\r\n" .
				'Content-Type: text/plain; charset="utf-8"; DelSp="Yes"; format=flowed '."\r\n" .
				'Content-Disposition: inline'. "\r\n" .
				'Content-Transfer-Encoding: 7bit'." \r\n" .
				'X-Mailer:PHP/'.phpversion();

		// envoyer une copie au visiteur ?
		if ($copie == 'oui')
		{
			$cible = $destinataire.';'.$email;
		}
		else
		{
			$cible = $destinataire;
		};

		// Remplacement de certains caractères spéciaux
		$message = str_replace("&#039;","'",$message);
		$message = str_replace("&#8217;","'",$message);
		$message = str_replace("&quot;",'"',$message);
		$message = str_replace('<br>','',$message);
		$message = str_replace('<br />','',$message);
		$message = str_replace("&lt;","<",$message);
		$message = str_replace("&gt;",">",$message);
		$message = str_replace("&amp;","&",$message);

		// Envoi du mail
		$num_emails = 0;
		$tmp = explode(';', $cible);
		foreach($tmp as $email_destinataire)
		{
			if (mail($email_destinataire, $objet, $message, $headers))
				$num_emails++;
		}

		if ((($copie == 'oui') && ($num_emails == 2)) || (($copie == 'non') && ($num_emails == 1)))
		{
			echo '<div class="w-screen mt-16"><p class="block text-gray-700 text-sm font-bold mb-2">'.$message_envoye.'</p></div>';
		}
		else
		{
			echo '<div class="w-screen mt-16"><p class="block text-gray-700 text-sm font-bold mb-2">'.$message_non_envoye.'</p></div>';
		};
	}
	else
	{
		// une des 3 variables (ou plus) est vide ...
		echo '<div class="w-screen mt-16"> <p class="text-center block text-gray-700 text-sm font-bold mb-2">'.$message_formulaire_invalide.'</p></div>';
		$err_formulaire = true;
	};
}; // fin du if (!isset($_POST['envoi']))

if (($err_formulaire) || (!isset($_POST['envoi'])))
{
	// afficher le formulaire
	echo '
	<div>
	<form id="contact" method="post" action="'.$form_action.'">
	<fieldset class="mt-16 max-w-md mx-auto rounded-lg overflow-hidden md:max-w-lg"><legend>Vos coordonnées</legend>
		<p class="mt-4"><label class="block text-gray-700 text-sm font-bold mb-2 text-center" for="nom">Nom :</label><input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" id="nom" name="nom" value="'.stripslashes($nom).'" tabindex="1" /></p>
		<p class="mt-4"><label class="block text-gray-700 text-sm font-bold mb-2 text-center" for="email">Email :</label><input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" id="email" name="email" value="'.stripslashes($email).'" tabindex="2" /></p>
	</fieldset>

	<fieldset class="mt-16 max-w-md mx-auto rounded-lg overflow-hidden md:max-w-lg"><legend>Votre message :</legend>
		<p class="mt-4"><label class="block text-gray-700 text-sm font-bold mb-2 text-center" for="objet">Objet :</label><input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" id="objet" name="objet" value="'.stripslashes($objet).'" tabindex="3" /></p>
		<p class="mt-4"><label class="block text-gray-700 text-sm font-bold mb-2 text-center" for="message">Message :</label><textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="message" name="message" tabindex="4" cols="30" rows="8">'.stripslashes($message).'</textarea></p>
	</fieldset>

	<div style="text-align:center;"><input class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mt-4" type="submit" name="envoi" value="Envoyer le formulaire !" /></div>
	</form>
	</div>';
};
?>