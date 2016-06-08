<?php

function inscription($login,$pass,$mail){
		$role = 0;
		$regex = preg_match("#[^a-zA-Z0-9-]#",$login); // A voir expresiion régulière
		if ($regex == 0){
			if(!GetIdByLogin($login)){ // on vérifie si le login n'est pas déjà pris
				$passhash = password_hash($pass,PASSWORD_DEFAULT);
				$req = $bdd->prepare('INSERT INTO t_user(user_login,user_pasword,user_mail,user_role) VALUES(:login, :pass, :mail, :role)');
				$req->execute(array(
				'login' => $login,
    			'pass' => $pass,
    			'mail' => $mail,
    			'role' => $role
    			));
    			$commande = "../../scripts/script_chat.sh 1 ".$login." ".$pass;
    			exec($commande);
    			$val = GetIdByLogin($login)["user_id"];
    		}else{
    			$val = "Ce login est déjà utilisé";
    		}
    	}else{
    		$val = "Caractère spéciaux interdits dans le login";
    	}
    	return $val;
}

function connexion($login,$pass){
	$donnees = 0;
	$pass = password_hash($pass,PASSWORD_DEFAULT);
	$req = $bdd->prepare('SELECT login FROM t_user WHERE login= ? AND pass= ?');
	$req->execute(array($login,$pass));
	$donnees = $req->fetch();
	if($donnees !=0 ){
		return GetIdByLogin($login);
	}else{
		return 0;
	}
}



function GetIdByLogin($login){
	$donnees = 0;
	$req = $bdd->prepare('SELECT user_id FROM t_user WHERE login = ?');
	$req->execute(array($login));
	$donnees = $req->fetch();
	return $donnees;
}