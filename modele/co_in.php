<?php

function inscription($login,$pass,$mail){
		global $bdd;
		$role = 0;
		$regex = preg_match("#[^a-zA-Z0-9-]#",$login); // A voir expresiion régulière
		if ($regex == 0){
			if(!GetIdByLogin($login)["user_id"]){ // on vérifie si le login n'est pas déjà pris
				$passhash = password_hash($pass,PASSWORD_DEFAULT);
				$req = $bdd->prepare('INSERT INTO t_user (user_login,user_password,user_email,user_role) VALUES(:login, :pass, :mail, :role)');
				$req->execute(array(
				'login' => $login,
    			'pass' => $passhash,
    			'mail' => $mail,
    			'role' => $role
    			)) or die ( print_r($req->errorInfo()) );
    			$commande = "./scripts/script_chat.sh 1 ".$login." ".$pass;
    			exec($commande);
    			$val = GetIdByLogin($login)["user_id"];
    			var_dump($val);
    		}else{
    			$val = "Ce login est déjà utilisé";
    			echo $val;
    		}
    	}else{
    		$val = "Caractère spéciaux interdits dans le login";
    	}
    	return $val;
}

function connexion($login,$pass){
	global $bdd;
	$infos = GetIdByLogin($login);
	$passhash = password_verify($pass,$infos["user_password"]);
	if($passhash){
		return $infos["user_id"];
	}else
		return $passhash;
}



function GetIdByLogin($login){
	global $bdd;
	$donnees = 0;
	$req = $bdd->prepare('SELECT user_id, user_password FROM t_user WHERE user_login = ?');
	$req->execute(array($login));
	$donnees = $req->fetch();
	return $donnees;
}


function GetLoginById($id){
	global $bdd;
	$donnees = 0;
	$req = $bdd->prepare('SELECT user_login FROM t_user WHERE user_id = ?');
	$req->execute(array($login));
	$donnees = $req->fetch();
	return $donnees;
}