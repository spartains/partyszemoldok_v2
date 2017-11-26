<?
mysql_connect("127.0.0.1", "partyszemoldok", "party666");
mysql_select_db("partyszemoldok");

$suti = $_COOKIE['suti'];

// Bejelentkezés
if ($ertek == "login")
{
	if ($nevemail != "")
	{
		if ($password != "")
		{
			$kapcsolat = mysql_query("SELECT * FROM users WHERE username = '$nevemail' OR email = '$nevemail'");
			$adat = mysql_fetch_array($kapcsolat);
			
			if ($nevemail == $adat['username'] OR $nevemail == $adat['email'])
			{
				$password2 = md5($adat['username'] . $password);
				if ($password2 == $adat['password'])
				{
					setcookie("suti", $adat['username']);
					header('Location: support.php');
				}
				else header('Location: support.php?login=jelszonemjo');
			}
			else header('Location: support.php?login=nevemailnemegyezik');
		}
		else header('Location: support.php?login=uresjelszo');
	}
	else header('Location: support.php?login=uresnevemail');
}

//Szabályzat módosítása
if ($ertek == "szabalyzat2")
{
	if ($szabaly != "")
	{
		mysql_query("UPDATE suppszabalyzat SET szabalyzat = '$szabaly'");
		header('Location: support.php?szabalyok=sikeres');
	}
	echo header('Location: support.php?szabalyok=uresmezo');
}

//Supporter módosítása
if ($ertek == "supportermod")
{
	mysql_query("UPDATE users SET supporter = '$supporter' WHERE id = '$id'");
	header('Location: support.php?ertek=supportertagok&supp=sikeres');
}

// Kijelentkezés
if ($ertek == "logout")
{
	setcookie("suti", "", time()-1);
	header('Location: support.php?logout=kilep');
}
?>
