<?
	mysql_connect("127.0.0.1", "partyszemoldok", "party666");
	mysql_select_db("partyszemoldok");

	$cookie = $_COOKIE["cookie"];

	if ($link == "login")
	{
		if ($usernameemail != "")
		{
			if ($password != "")
			{
				$connect = mysql_query("SELECT * FROM users WHERE username = '$usernameemail' OR email = '$usernameemail'");
				$data = mysql_fetch_array($connect);
				if ($usernameemail == $data["username"] OR $usernameemail == $data["email"])
				{
					$password2 = md5($data['username'] . $password);
					if ($password2 == $data["password"])
					{
						if ($check != "checked")
						{
							setcookie("cookie", $data["username"]);
							header("Location: index.php?link=myprofile");
						}
						else
						{
							setcookie("cookie", $data["username"], time()+(365*24*60*60));
							header("Location: index.php?link=myprofile");
						}
					}
					else header("Location: index.php?link=login&login=wrongpassword");
				}
				else header("Location: index.php?link=login&login=wrongusername");
			}
			else header("Location: index.php?link=login&login=nopassword");
		}
		else header("Location: index.php?link=login&login=nousername");
	}
	elseif ($link == "logup")
	{
		if ($username != "")
		{
			if ($email != "")
			{
				if ($password1 != "")
				{
					if ($password2 != "")
					{
						if ($password1 == $password2)
						{
							$connect = mysql_query("SELECT * FROM users WHERE username = '$username' OR email = '$email'");
							$data = mysql_fetch_array($connect);
							if ($username != $data["username"])
							{
								if ($email != $data["email"])
								{
									$date = time();
									$password = md5($username . $password1);
									$name = "";
									$birthyear = "";
									$birthmonth = "";
									$birthday = "";
									$home = "";
									$yourself = "";
									mysql_query("INSERT INTO users (name, username, password, email, type, birthyear, birthmonth, birthday, home, reg_date, yourself) VALUES ('$name', '$username', '$password', '$email', '3', '$birthyear', '$birthmonth', '$birthday', '$home', '$date', '$yourself')");
									header("Location: index.php?link=login&logup=successreg");
								}
								else header("Location: index.php?link=logup&logup=existemail");
							}
							else header("Location: index.php?link=logup&logup=existusername");
						}
						else header("Location: index.php?link=logup&logup=diffpassword");
					}
					else header("Location: index.php?link=logup&logup=nopassword2");
				}
				else header("Location: index.php?link=logup&logup=nopassword1");
			}
			else header("Location: index.php?link=logup&logup=noemail");
		}
		else header("Location: index.php?link=logup&logup=nousername");
	}
	elseif ($link == "profilechange")
	{
		if ($name != "")
		{
			$filedir = 'profile';
			move_uploaded_file($_FILES['userfile']['tmp_name'], $filedir.'/'.basename(time().$_FILES['userfile']['name']));
			$image = time().$_FILES['userfile']['name'];
			mysql_query("UPDATE users SET image = '$image' WHERE id = '$id'");
			mysql_query("UPDATE users SET name = '$name' WHERE id = '$id'");
			mysql_query("UPDATE users SET email = '$email' WHERE id = '$id'");
			mysql_query("UPDATE users SET gender = '$gender' WHERE id = '$id'");
			mysql_query("UPDATE users SET birthyear = '$birthyear' WHERE id = '$id'");
			mysql_query("UPDATE users SET birthmonth = '$birthmonth' WHERE id = '$id'");
			mysql_query("UPDATE users SET birthday = '$birthday' WHERE id = '$id'");
			mysql_query("UPDATE users SET home = '$home' WHERE id = '$id'");
			mysql_query("UPDATE users SET yourself = '$yourself' WHERE id = '$id'");
			header('Location: index.php?link=myprofile');
		}
		else header('Location: index.php?link=myprofile&change=change1');
	}
	elseif ($link == "profilevisibility")
	{
		if ($name_public_friends == "nopublic")
		{
		mysql_query("UPDATE users SET name_public_friends = 'nopublic' WHERE id = '$id'");
		header('Location: index.php?link=myprofile');
		}
		else
		{
			if ($name_public_friends == "friends")
			{
			mysql_query("UPDATE users SET name_public_friends = 'friends' WHERE id = '$id'");
			header('Location: index.php?link=myprofile');
			}
			else
			{
			mysql_query("UPDATE users SET name_public_friends = 'public' WHERE id = '$id'");
			header('Location: index.php?link=myprofile');	
			}
		}
		if ($email_public_friends == "nopublic")
		{
		mysql_query("UPDATE users SET email_public_friends = 'nopublic' WHERE id = '$id'");
		header('Location: index.php?link=myprofile');
		}
		else
		{
			if ($email_public_friends == "friends")
			{
			mysql_query("UPDATE users SET email_public_friends = 'friends' WHERE id = '$id'");
			header('Location: index.php?link=myprofile');
			}
			else
			{
			mysql_query("UPDATE users SET email_public_friends = 'public' WHERE id = '$id'");
			header('Location: index.php?link=myprofile');	
			}
		}
		if ($gender_public_friends == "nopublic")
		{
		mysql_query("UPDATE users SET gender_public_friends = 'nopublic' WHERE id = '$id'");
		header('Location: index.php?link=myprofile');
		}
		else
		{
			if ($gender_public_friends == "friends")
			{
			mysql_query("UPDATE users SET gender_public_friends = 'friends' WHERE id = '$id'");
			header('Location: index.php?link=myprofile');
			}
			else
			{
			mysql_query("UPDATE users SET gender_public_friends = 'public' WHERE id = '$id'");
			header('Location: index.php?link=myprofile');	
			}
		}
		if ($birthtime_public_friends == "nopublic")
		{
		mysql_query("UPDATE users SET birthtime_public_friends = 'nopublic' WHERE id = '$id'");
		header('Location: index.php?link=myprofile');
		}
		else
		{
			if ($birthtime_public_friends == "friends")
			{
			mysql_query("UPDATE users SET birthtime_public_friends = 'friends' WHERE id = '$id'");
			header('Location: index.php?link=myprofile');
			}
			else
			{
			mysql_query("UPDATE users SET birthtime_public_friends = 'public' WHERE id = '$id'");
			header('Location: index.php?link=myprofile');	
			}
		}
		if ($home_public_friends == "nopublic")
		{
		mysql_query("UPDATE users SET home_public_friends = 'nopublic' WHERE id = '$id'");
		header('Location: index.php?link=myprofile');
		}
		else
		{
			if ($home_public_friends == "friends")
			{
			mysql_query("UPDATE users SET home_public_friends = 'friends' WHERE id = '$id'");
			header('Location: index.php?link=myprofile');
			}
			else
			{
			mysql_query("UPDATE users SET home_public_friends = 'public' WHERE id = '$id'");
			header('Location: index.php?link=myprofile');	
			}
		}
		if ($yourself_public_friends == "nopublic")
		{
		mysql_query("UPDATE users SET yourself_public_friends = 'nopublic' WHERE id = '$id'");
		header('Location: index.php?link=myprofile');
		}
		else
		{
			if ($yourself_public_friends == "friends")
			{
			mysql_query("UPDATE users SET yourself_public_friends = 'friends' WHERE id = '$id'");
			header('Location: index.php?link=myprofile');
			}
			else
			{
			mysql_query("UPDATE users SET yourself_public_friends = 'public' WHERE id = '$id'");
			header('Location: index.php?link=myprofile');	
			}
		}
	}
	elseif ($link == "upload")
	{
		if ($username != "")
		{
			if ($title != "")
			{
				if ($userfile != "" OR $post != "")
				{
					$filedir = 'uploads';
					move_uploaded_file($_FILES['userfile']['tmp_name'], $filedir.'/'.basename(time().$_FILES['userfile']['name']));
					$date = time();
					$image = time().$_FILES['userfile']['name'];
					mysql_query("INSERT INTO posts (name, title, images, text, date, mod_date) VALUES ('$username', '$title', '$image', '$post', '$date', '')");
					header("Location: index.php");
				}
				else header("Location: index.php?link=upload&upload=noimageorpost");
			}
			else header("Location: index.php?link=upload&upload=notitle");
		}
		else header("Location: index.php?link=upload&upload=nousername");
	}
	elseif ($link == "adminok")
	{
		if ($admin != "")
		{
			if ($url != "")
			{
				if ($email != "")
				{
					$kapcsolat = mysql_query("SELECT * FROM adminok WHERE admin = '$admin'");
					$adat = mysql_fetch_array($kapcsolat);
					
					if (!$adat)
					{
						$kapcsolat = mysql_query("SELECT * FROM adminok WHERE url = '$url'");
						$adat2 = mysql_fetch_array($kapcsolat);
						
						if (!$adat2)
						{
							$kapcsolat = mysql_query("SELECT * FROM adminok WHERE email = '$email'");
							$adat3 = mysql_fetch_array($kapcsolat);
							
							if (!$adat3)
							{
								mysql_query("INSERT INTO adminok (admin, url, email) VALUES ('$admin', '$url', '$email')");
								header('Location: index.php?link=contact&contact=successadminok');
							}
							else header('Location: index.php?link=contact&contact=existemail');
						}
						else header('Location: index.php?link=contact&contact=existurl');
					}
					else header('Location: index.php?link=contact&contact=existadmin');
				}
				else header('Location: index.php?link=contact&contact=noemail');
			}
			else header('Location: index.php?link=contact&contact=nourl');
		}
		else header('Location: index.php?link=contact&contact=noadmin');
	}
	elseif ($link == "logout")
	{
		setcookie("cookie", "", time()-1);
		header("Location: index.php?link=login&logout=successlogout");
	}
?>
