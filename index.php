<?
	mysql_connect("127.0.0.1", "partyszemoldok", "party666");
	mysql_select_db("partyszemoldok");
	
	$cookie = $_COOKIE["cookie"];
	$online = 0;
	
	if ($link == "")
	{
	$query="select * from posts";
	$table = mysql_query($query);
	$post = mysql_num_rows($table);
	}
	
	$connect = mysql_query("SELECT * FROM users");
	while ($data = mysql_fetch_array($connect))
	{
		if ($cookie == $data["username"])
		{
			$online = 1;
			$userid1 = $data['id'];
			$image1 = $data['image'];
			$name1 = $data['name'];
			$username1 = $data['username'];
			$email1 = $data['email'];
			$type1 = $data['type'];
			$gender1 = $data['gender'];
			$birthyear1 = $data['birthyear'];
			$birthmonth1 = $data['birthmonth'];
			$birthday1 = $data['birthday'];
			$home1 = $data['home'];
			$reg_date1 = $data['reg_date'];
			$yourself1 = $data['yourself'];
			$name_public_friends1 = $data['name_public_friends'];
			$email_public_friends1 = $data['email_public_friends'];
			$gender_public_friends1 = $data['gender_public_friends'];
			$birthtime_public_friends1 = $data['birthtime_public_friends'];
			$home_public_friends1 = $data['home_public_friends'];
			$yourself_public_friends1 = $data['yourself_public_friends'];
			
			$reg_date1 = date('Y.m.d. H:i:s', intval($reg_date1));
		}
	}
?>

<!DOCTYPE html>

<html lang="hu">
	<head>
		<title><? if ($online == 1) { echo "$username1 - "; } ?>PartySzemöldök^^</title>
		<meta charset="ISO-8859-2">
		<meta name="keywords" content="party, szemöldök, vicc, humor, poszt, blog">
		<meta name="description" content="Üdvözöllek a PartySzemöldök humorportálon. Rengeteg vicces és érdekes posztot találsz az oldalon. Semmi esetre se hagyd ki! ;)">
		<meta name="robots" content="index, follow">
		<meta name="revisit-after" content="2 days">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/bootstrap-grid.css" rel="stylesheet">
		<link href="css/bootstrap-reboot.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<link href="css/icon/icon.ico" rel="shortcut icon">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	</head>
	<body class="col-md-10">
		<script type="text/javascript">
			if (top.location != location)
			{
				top.location.href = document.location.href;
			}
		</script>
		<header class="row">
			<h1 class="col-md-8"><a href="index.php">PartySzemöldök^^</a></h1>
			<span class="col-md-3">Humor, post, blog</span>
		</header>
		<nav class="row bg-dark">
<?
			if ($online == 0)
			{
?>
				<a
<?
					if ($link == "")
					{
?>
						class="col-md-3 btn btn-secondary"
<?
					}
					else
					{
?>
						class="col-md-3 btn btn-dark"
<?
					}
?>
					href="index.php">PartySzemöldök
				</a>
				<a
<?
					if ($link == "login")
					{
?>
						class="col-md-3 btn btn-secondary"
<?
					}
					else
					{
?>
						class="col-md-3 btn btn-dark"
<?
					}
?>
					href="index.php?link=login">Bejelentkezés
				</a>
				<a
<?
					if ($link == "logup")
					{
?>
						class="col-md-3 btn btn-secondary"
<?
					}
					else
					{
?>
						class="col-md-3 btn btn-dark"
<?
					}
?>
					href="index.php?link=logup">Regisztráció
				</a>
				<a
<?
					if ($link == "contact")
					{
?>
						class="col-md-3 btn btn-secondary"
<?
					}
					else
					{
?>
						class="col-md-3 btn btn-dark"
<?
					}
?>
					href="index.php?link=contact">Kapcsolat
				</a>
<?
			}
			else
			{
?>
				<a
<?
					if ($link == "")
					{
?>
						class="col-md-3 btn btn-secondary"
<?
					}
					else
					{
?>
						class="col-md-3 btn btn-dark"
<?
					}
?>
					href="index.php">PartySzemöldök
				</a>
				<a
<?
					if ($link == "myprofile")
					{
?>
						class="col-md-2 btn btn-secondary"
<?
					}
					else
					{
?>
						class="col-md-2 btn btn-dark"
<?
					}
?>
					href="index.php?link=myprofile">Profil
				</a>
				<a
<?
					if ($link == "upload")
					{
?>
						class="col-md-2 btn btn-secondary"
<?
					}
					else
					{
?>
						class="col-md-2 btn btn-dark"
<?
					}
?>
					href="index.php?link=upload">Feltöltés
				</a>
				<a
<?
					if ($link == "contact")
					{
?>
						class="col-md-2 btn btn-secondary"
<?
					}
					else
					{
?>
						class="col-md-2 btn btn-dark"
<?
					}
?>
					href="index.php?link=contact">Kapcsolat
				</a>
				<a class="col-md-3 btn btn-danger" href="prog.php?link=logout">Kijelentkezés</a>
<?
			}
?>
		</nav>
		<div class="content row">
			<section class="col-md-12">
				<marquee>Reklám helye</marquee>
			</section>
			<main class="col-md-10">
<?
				if ($link == "")
				{
?>
					<div class="home col-md-11">
						<div class="sites">
							<a href="" class="btn btn-info">1</a>
							<a href="" class="btn btn-dark">2</a>
							<a href="" class="btn btn-dark">3</a>
							<a href="" class="btn btn-dark">4</a>
							<a href="" class="btn btn-dark">5</a>
							<a href="" class="btn btn-dark">...</a>
						</div>
						<?
							$adatok = mysql_query("SELECT * FROM posts ORDER by ID DESC");
							while ($data = mysql_fetch_array($adatok))
							{
								$name = $data['name'];
								$title = $data['title'];
								$images = $data['images'];
								$text = $data['text'];
								$bejegyzes = str_replace("\r\n", "<br />", $text);
								$date = $data['date'];
								$date0 = date('Y.m.d. H:i:s', intval($date));
								$mod_date = $data['mod_date'];
								$mod_date0 = date('Y.m.d. H:i:s', intval($mod_date));
								
								$post--;
						?>
						<div class="postes">
							<h2><? echo $title; ?></h2>
							<div class="uploadrow">Feltöltõ: <span class="name"><? echo $name; ?></span> &bull; Dátum: <span class="update"><? echo $date0; ?></span></div>
							<?
							if ($mod_date != "")
							{
							?>
							<div class="modrow">Moderálva: <span class="moddate"><? echo $mod_date0; ?></span></div>
							<?
							}
							?>
							<div><img class="col-md-10" src="uploads/<? echo $images; ?>"></div>
							<div class="post"><? echo $bejegyzes; ?></div>
						</div>
						<?
						if ($post > 0) echo "<hr>";
						?>
						<?
						}
						?>
					</div>
<?
				}
				elseif ($link == "login")
				{
?>
					<form class="login col-md-6" action="prog.php" method="post">
<?
						if ($logup == "successreg")
						{
							echo '<div class="success">Sikeres regisztráció!</div>';
						}
						if ($logout == "successlogout")
						{
							echo '<div class="success">Sikeres kijelentkezés!</div>';
						}
?>
						<input type="hidden" name="link" value="login">
						<div class="form-group">
							<label for="usernameemail">Felhasználónév, vagy e-mail cím</label>
							<input type="text" placeholder="felhasználónév" id="usernameemail" class="form-control" name="usernameemail">
						</div>
						<div class="form-group">
							<label for="password1">Jelszó</label>
							<input type="password" placeholder="jelszó" id="password1" class="form-control" name="password">
						</div>
						<div class="form-check">
							<label><input type="checkbox" class="form-check-input" name="check" value="checked">Maradjak bejelentkezve</label>
						</div>
						<button class="btn btn-info">Bejelentkezés</button>
<?
						switch ($login)
						{
							case "nousername":
								echo '<div class="error">Nincs megadva felhasználónév és email cím!</div>';
								break;
							case "nopassword":
								echo '<div class="error">Nincs megadva jelszó!</div>';
								break;
							case "wrongusername":
								echo '<div class="error">Hibás felhasználónév, vagy email cím!</div>';
								break;
							case "wrongpassword":
								echo '<div class="error">Hibás jelszó!</div>';
								break;
							default:
								break;
						}
?>
					</form>
<?
				}
				elseif ($link == "logup")
				{
?>
					<form class="logup col-md-6" action="prog.php" method="post">
						<input type="hidden" name="link" value="logup">
						<div class="form-group">
							<label for="username2">Felhasználónév</label>
							<input type="text" placeholder="felhasználónév" id="username2" class="form-control" name="username">
						</div>
						<div class="form-group">
							<label for="email1">E-mail</label>
							<input type="email" placeholder="e-mail" id="email1" class="form-control" name="email">
						</div>
						<div class="form-group">
							<label for="password2">Jelszó</label>
							<input type="password" placeholder="jelszó" id="password2" class="form-control" name="password1">
						</div>
						<div class="form-group">
							<label for="password3">Jelszó újra</label>
							<input type="password" placeholder="jelszó újra" id="password3" class="form-control" name="password2">
						</div>
						<button class="btn btn-danger">Regisztráció</button>
<?
						switch ($logup)
						{
							case "nousername":
								echo '<div class="error">Nincs megadva felhasználónév!</div>';
								break;
							case "noemail":
								echo '<div class="error">Nincs megadva e-mail cím!</div>';
								break;
							case "nopassword1":
								echo '<div class="error">Nincs megadva jelszó!</div>';
								break;
							case "nopassword2":
								echo '<div class="error">Nincs megismételve a jelszó!</div>';
								break;
							case "diffpassword":
								echo '<div class="error">Nem egyeznek a jelszavak!</div>';
								break;
							case "existusername":
								echo '<div class="error">Ez a felhasználónév már foglalt!</div>';
								break;
							case "existemail":
								echo '<div class="error">Ez az email cím már foglalt!</div>';
								break;
							default:
								break;
						}
?>
					</form>
<?
				}
				elseif ($link == "upload")
				{
?>
					<form class="upload col-md-6" enctype="multipart/form-data" action="prog.php" method="post">
						<input type="hidden" name="link" value="upload">
						<input type="hidden" name="username" value="<? echo $username1; ?>">
						<div class="form-group">
							<label for="title1">Cím</label>
							<input type="text" placeholder="cím" id="title1" class="form-control" name="title">
						</div>
						<div class="form-group">
							<label for="text1">Bejegyzés</label>
							<textarea placeholder="bejegyzés" id="text1" class="form-control" name="post"></textarea>
						</div>
						<div class="form-group">
							<label for="picture1">Kép csatolása</label>
							<input type="file" name="userfile" accept="image/*, .jpg, .jpeg, .bmp, .tif, .tiff, .gif, .png, .tga" class="form-control">
						</div>
						<button class="btn btn-success">Feltöltés</button>
<?
						if ($upload == "notitle")
						{
							echo '<div class="error">Nem adtál meg címet!</div>';
						}
?>
					</form>
<?
				}
				elseif ($link == "myprofile")
				{
					if ($change != "change1" && $change != "change2" && $change != "deactivation")
					{
?>
					<div class="myprofile col-md-10 table-info">
						<div class="profilehead row">
							<div class="col-md-4">
								<img src="profile/<? if ($image1 == "") { ?>1510154493alap.jpg<? } else { echo $image1; }?>" alt="profileimage" class="col-md-12">
							</div>
							<div class="userdata col-md-5 row">
								<div class="col-md-12"><h3><? echo $name1; ?></h3></div>
								<div class="username col-md-12"><? echo $username1; ?></div>
							</div>
							<div class="userbutton col-md-3">
								<a href="index.php?link=myprofile&change=change1" class="col-md-12 btn btn-success my-1">Módosítás</a>
								<a href="index.php?link=myprofile&change=change2" class="col-md-12 btn btn-warning my-1">Láthatóság</a>
								<!--<a href="index.php?link=myprofile&change=deactivation" class="col-md-12 btn btn-danger my-1">Deaktiválás</a>-->
								<button type="button" class="col-md-12 btn btn-danger my-1" data-toggle="modal" data-target="#exampleModal">
									Deaktiválás
								</button>
								<form action="prog.php" method="post">
									<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									  <div class="modal-dialog" role="document">
										<div class="modal-content">
										  <div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Felfüggesztés</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											  <span aria-hidden="true">&times;</span>
											</button>
										  </div>
										  <div class="modal-body">
											Biztos, hogy felfüggeszted a fiókodat?
										  </div>
										  <div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Mégsem</button>
											<input type="submit" href="" class="btn btn-primary" value="IGEN">
										  </div>
										</div>
									  </div>
									</div>
								</form>
								
							</div>
						</div>
						<div class="row">
							<div class="primarycolumn col-md-3">Regisztráció ideje:</div>
							<div class="secondarycolumn col-md-9"><? echo $reg_date1; ?></div>
						</div>
						<div class="row">
							<div class="primarycolumn col-md-3">Jog:</div>
							<div class="secondarycolumn col-md-9"><? echo $type1; ?></div>
						</div>
						<div class="row">
							<div class="primarycolumn col-md-3">E-mail:</div>
							<div class="secondarycolumn col-md-9"><? echo $email1; ?></div>
						</div>
						<div class="row">
							<div class="primarycolumn col-md-3">Nem:</div>
							<div class="secondarycolumn col-md-9"><? echo $gender1; ?></div>
						</div>
						<div class="row">
							<div class="primarycolumn col-md-3">Születési idõ:</div>
							<div class="secondarycolumn col-md-9"><? echo $birthyear1; ?> <? echo $birthmonth1; ?> <? echo $birthday1; ?></div>
						</div>
						<div class="row">
							<div class="primarycolumn col-md-3">Lakhely:</div>
							<div class="secondarycolumn col-md-9"><? echo $home1; ?></div>
						</div>
						<div class="row">
							<div class="primarycolumn col-md-3">Bemutatkozás:</div>
							<div class="secondarycolumn col-md-9"><? $message = str_replace("\r\n", "<br>", $yourself1); ?>
							<? echo $message; ?></div>
						</div>
					</div>
<?
					}
					if ($change == "change1")
					{
					?>
					<div class="myprofile col-md-10 table-info">
							<form enctype="multipart/form-data" action="prog.php" method="post">
							<input type="hidden" name="link" value="profilechange">
							<input type="hidden" name="id" value="<? echo $userid1; ?>">
						<div class="profilehead row">
							<div class="col-md-4">
								<img src="profile/<? if ($image1 == "") { ?>1510154493alap.jpg<? } else { echo $image1; } ?>" alt="profileimage" class="col-md-12">
							</div>
							<div class="userdata col-md-5 row">
								<div><h3><input type="text" name="name" value="<? echo $name1; ?>" class="col-md-12 text-center"></h3></div>
								<div class="username col-md-12"><? echo $username1; ?></div>
							</div>
							<div class="userbutton col-md-3">
								<a href="index.php?link=myprofile" class="col-md-12 btn btn-secondary my-1">Vissza</a>
								<input type="file" name="userfile" accept="image/*, .jpg, .jpeg, .bmp, .tif, .tiff, .gif, .png, .tga" class="form-control-file my-1">
								<input type="submit" value="Módosítás" class="btn btn-success col-md-12 my-1">
							</div>
						</div>
						<div class="row">
							<div class="primarycolumn col-md-3">Regisztráció ideje:</div>
							<div class="secondarycolumn col-md-9"><? echo $reg_date1; ?></div>
						</div>
						<div class="row">
							<div class="primarycolumn col-md-3">Jog:</div>
							<div class="secondarycolumn col-md-9"><? echo $type1; ?></div>
						</div>
						<div class="row">
							<div class="primarycolumn col-md-3">E-mail:</div>
							<div class="secondarycolumn col-md-9"><input type="text" name="email" value="<? echo $email1; ?>"></div>
						</div>
						<div class="row">
							<div class="primarycolumn col-md-3">Nem:</div>
                            <div class="secondarycolumn col-md-9">
						  <script language="javascript">
							function kivalaszt4()
							{
							document.getElementById("gender").value = document.getElementById("gender1").value;
							}
							</script>
							<select name="gender1" id="gender1" title="Nem" onChange="kivalaszt4()">
								<option value="" <? if ($gender1 == ""){ ?>selected<? } ?>></option>
								<?
								$adatok = mysql_query("SELECT * FROM gender");
								while ($data = mysql_fetch_array($adatok))
								{
									$gender = $data['gender'];
								?>
								<option value="<? echo $gender; ?>" <? if ($gender1 == $gender){ ?>selected<? } ?> name="gender"><? echo $gender; ?></option>
								<?
								}
								?>
							</select>
                            <input type="hidden" name="gender" id="gender" value="<? echo $gender1; ?>" class="col-md-12"></div>
						</div>
						<div class="row">
							<div class="primarycolumn col-md-3">Születési idõ:</div>
							<div class="secondarycolumn col-md-9">
							<script language="javascript">
							function kivalaszt1()
							{
							document.getElementById("birthyear").value = document.getElementById("ev1").value;
							}
							</script>
							<select id="ev1" name="ev1" onChange="kivalaszt1()" title="Év">
								<option value="" <? if ($birthyear1 == ""){ ?>selected<? } ?>></option>
								<?
								$adatok = mysql_query("SELECT * FROM year ORDER by ID DESC");
								while ($data = mysql_fetch_array($adatok))
								{
									$year = $data['year'];
								?>
								<option value="<? echo $year; ?>" <? if ($birthyear1 == $year){ ?>selected<? } ?> name="birthyear"><? echo $year; ?></option>
								<?
								}
								?>
							</select>
							<script language="javascript">
							function kivalaszt2()
							{
							document.getElementById("birthmonth").value = document.getElementById("honap1").value;
							}
							</script>
							<select id="honap1" name="honap1" onChange="kivalaszt2()" title="Hónap">
								<option value="" <? if ($birthmonth1 == ""){ ?>selected<? } ?>></option>
								<?
								$adatok = mysql_query("SELECT * FROM month");
								while ($data = mysql_fetch_array($adatok))
								{
									$month = $data['month'];
								?>
								<option value="<? echo $month; ?>" <? if ($birthmonth1 == $month){ ?>selected<? } ?> name="birthmonth"><? echo $month; ?></option>
								<?
								}
								?>
							</select>
							<script language="javascript">
							function kivalaszt3()
							{
							document.getElementById("birthday").value = document.getElementById("nap1").value;
							}
							</script>
							<select id="nap1" name="nap1" onChange="kivalaszt3()" title="Nap">
								<option value="" <? if ($birthday1 == ""){ ?>selected<? } ?>></option>
								<?
								$adatok = mysql_query("SELECT * FROM day");
								while ($data = mysql_fetch_array($adatok))
								{
									$day = $data['day'];
								?>
								<option value="<? echo $day; ?>" <? if ($birthday1 == $day){ ?>selected<? } ?> name="birthday"><? echo $day; ?></option>
								<?
								}
								?>
							</select></div>
							<input type="hidden" name="birthyear" id="birthyear" value="<? echo $birthyear1; ?>">
							<input type="hidden" name="birthmonth" id="birthmonth" value="<? echo $birthmonth1; ?>">
							<input type="hidden" name="birthday" id="birthday" value="<? echo $birthday1; ?>">
						</div>
						<div class="row">
							<div class="primarycolumn col-md-3">Lakhely:</div>
							<div class="secondarycolumn col-md-9"><input type="text" name="home" value="<? echo $home1; ?>"></div>
						</div>
						<div class="row">
							<div class="primarycolumn col-md-3">Bemutatkozás:</div>
							<div class="secondarycolumn col-md-9"><textarea name="yourself" cols="40" rows="10"><? echo $yourself1; ?></textarea></div>
						</div>
						</form>
					</div>
				<?
					}
					if ($change == "change2")
					{
?>
					<div class="myprofile col-md-11 table-info">
                    <form action="prog.php" method="post">
                    	<input type="hidden" name="link" value="profilevisibility">
                        <input type="hidden" name="id" value="<? echo $userid1; ?>">
						<div class="profilehead row">
							<div class="col-md-4">
								<img src="profile/<? if ($image1 == "") { ?>1510154493alap.jpg<? } else { echo $image1; }?>" alt="profileimage" class="col-md-12">
							</div>
							<div class="userdata col-md-5 row">
								<div class="col-md-12"><h3><? echo $name1; ?></h3></div>
                                <div class="thirdcoloumn col-md-12">
	                                <a title="Csak te látod a nevedet"><input type="radio" name="name_public_friends" <? if ($name_public_friends1 == "nopublic") { ?>checked="checked"<? } ?> value="nopublic">Nem publikus</a>
	                                <a title="Csak a barátok láthatják a nevedet"><input type="radio" name="name_public_friends" <? if ($name_public_friends1 == "friends") { ?>checked="checked"<? } ?> value="friends">Barátok</a>
	                                <a title="Minden beregisztrált felhasználó láthatja a nevedet"><input type="radio" name="name_public_friends" <? if ($name_public_friends1 == "public") { ?>checked="checked"<? } ?> value="public">Publikus</a>
                                </div><br><br>
								<div class="username col-md-12"><? echo $username1; ?></div>
							</div>
							<div class="userbutton col-md-3">
								<a href="index.php?link=myprofile" class="btn btn-secondary my-1 col-md-12">Vissza</a>
								<input type="submit" value="Mentés" class="btn btn-success my-1 col-md-12">
							</div>
						</div>
						<div class="row">
							<div class="primarycolumn col-md-3">Regisztráció ideje:</div>
							<div class="secondarycolumn col-md-4"><? echo $reg_date1; ?></div>
                            <div class="thirdcolumn col-md-5">
                                <a title="Csak te látod a regisztrálási idõpontodat"><input type="radio" disabled>Nem publikus</a>
                                <a title="Csak a barátok láthatják a regisztrálási idõpontodat"><input type="radio" disabled>Barátok</a>
                                <a title="Minden beregisztrált felhasználó láthatja a regisztrálási idõpontodat"><input type="radio" checked="checked">Publikus</a>
                           	</div>
						</div>
						<div class="row">
							<div class="primarycolumn col-md-3">Jog:</div>
							<div class="secondarycolumn col-md-4"><? echo $type1; ?></div>
                            <div class="thirdcolumn col-md-5">
                                <a title="Csak te látod a jogaidat"><input type="radio" disabled>Nem publikus</a>
                                <a title="Csak a barátok láthatják a jogaidat"><input type="radio" disabled>Barátok</a>
                                <a title="Minden beregisztrált felhasználó láthatja a jogaidat"><input type="radio" checked="checked">Publikus</a>
                           	</div>
						</div>
						<div class="row">
							<div class="primarycolumn col-md-3">E-mail:</div>
							<div class="secondarycolumn col-md-4"><? echo $email1; ?></div>
                            <div class="thirdcolumn col-md-5">
                                <a title="Csak te látod az email címedet"><input type="radio" name="email_public_friends" <? if ($email_public_friends1 == "nopublic") { ?>checked="checked"<? } ?> value="nopublic">Nem publikus</a>
                                <a title="Csak a barátok láthatják az email címedet"><input type="radio" name="email_public_friends" <? if ($email_public_friends1 == "friends") { ?>checked="checked"<? } ?> value="friends">Barátok</a>
                                <a title="Minden beregisztrált felhasználó láthatja az email címedet"><input type="radio" name="email_public_friends" <? if ($email_public_friends1 == "public") { ?>checked="checked"<? } ?> value="public">Publikus</a>
                           	</div>
						</div>
						<div class="row">
							<div class="primarycolumn col-md-3">Nem:</div>
							<div class="secondarycolumn col-md-4"><? echo $gender1; ?></div>
                            <div class="thirdcolumn col-md-5">
                                <a title="Csak te látod a nemedet"><input type="radio" name="gender_public_friends" <? if ($gender_public_friends1 == "nopublic") { ?>checked="checked"<? } ?> value="nopublic">Nem publikus</a>
                                <a title="Csak a barátok láthatják a nemedet"><input type="radio" name="gender_public_friends" <? if ($gender_public_friends1 == "friends") { ?>checked="checked"<? } ?> value="friends">Barátok</a>
                                <a title="Minden beregisztrált felhasználó láthatja a nemedet"><input type="radio" name="gender_public_friends" <? if ($gender_public_friends1 == "public") { ?>checked="checked"<? } ?> value="public">Publikus</a>
                           	</div>
						</div>
						<div class="row">
							<div class="primarycolumn col-md-3">Születési idõ:</div>
							<div class="secondarycolumn col-md-4"><? echo $birthyear1; ?> <? echo $birthmonth1; ?> <? echo $birthday1; ?></div>
                            <div class="thirdcolumn col-md-5">
                                <a title="Csak te látod a születési idõdet"><input type="radio" name="birthtime_public_friends" <? if ($birthtime_public_friends1 == "nopublic") { ?>checked="checked"<? } ?> value="nopublic">Nem publikus</a>
                                <a title="Csak a barátok láthatják a születési idõdet"><input type="radio" name="birthtime_public_friends" <? if ($birthtime_public_friends1 == "friends") { ?>checked="checked"<? } ?> value="friends">Barátok</a>
                                <a title="Minden beregisztrált felhasználó láthatja a születési idõdet"><input type="radio" name="birthtime_public_friends" <? if ($birthtime_public_friends1 == "public") { ?>checked="checked"<? } ?> value="public">Publikus</a>
                           	</div>
						</div>
						<div class="row">
							<div class="primarycolumn col-md-3">Lakhely:</div>
							<div class="secondarycolumn col-md-4"><? echo $home1; ?></div>
                            <div class="thirdcolumn col-md-5">
                                <a title="Csak te látod a lakhelyedet"><input type="radio" name="home_public_friends" <? if ($home_public_friends1 == "nopublic") { ?>checked="checked"<? } ?> value="nopublic">Nem publikus</a>
                                <a title="Csak a barátok láthatják a lakhelyedet"><input type="radio" name="home_public_friends" <? if ($home_public_friends1 == "friends") { ?>checked="checked"<? } ?> value="friends">Barátok</a>
                                <a title="Minden beregisztrált felhasználó láthatja a lakhelyedet"><input type="radio" name="home_public_friends" <? if ($home_public_friends1 == "public") { ?>checked="checked"<? } ?> value="public">Publikus</a>
                           	</div>
						</div>
						<div class="row">
							<div class="primarycolumn col-md-3">Bemutatkozás:</div>
							<div class="secondarycolumn col-md-4"><? $message = str_replace("\r\n", "<br>", $yourself1); ?><? echo $message; ?></div>
                            <div class="thirdcolumn col-md-5">
                                <a title="Csak te látod a bemutatkozásodat"><input type="radio" name="yourself_public_friends" <? if ($yourself_public_friends1 == "nopublic") { ?>checked="checked"<? } ?> value="nopublic">Nem publikus</a>
                                <a title="Csak a barátok láthatják a bemutatkozásodat"><input type="radio" name="yourself_public_friends" <? if ($yourself_public_friends1 == "friends") { ?>checked="checked"<? } ?> value="friends">Barátok</a>
                                <a title="Minden beregisztrált felhasználó láthatja a bemutatkozásodat"><input type="radio" name="yourself_public_friends" <? if ($yourself_public_friends1 == "public") { ?>checked="checked"<? } ?> value="public">Publikus</a>
                           	</div>
						</div>
					</div>
<?
					}
					if ($change == "deactivation")
					{
	?>					<script>
							window.alert(
							"<form action="prog.phop" method="post">
								<input type="hidden" name="link" value="deactivation">
								<input type="">
								<span>Biztosan fel szeretnéd függeszteni a fiókodat?</span>
								<input type="password" placeholder="Jelszó">
								<a href="index.php?link=myprofile">Mégse</a>
								<input type="submit" value="Igen">
							</form>");
						</script>
<?	
					}
				}
				elseif ($link == "contact")
				{
?>
					<div class="contact row">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Adminok</th>
									<th>URL</th>
									<th>E-mail</th>
									<?
									if ($type1 == Admin)
									{
									?>
									<th>*</th>
									<?
									}
									?>
								</tr>
							</thead>
							<tbody>
								<?
								$adatok = mysql_query("SELECT * FROM adminok");
								while ($adat = mysql_fetch_array($adatok))
								{
										$admin = $adat['admin'];
										$url = $adat['url'];
										$email = $adat['email'];
								?>
								<tr class="table-warning">
									<td><span class="btn btn-warning">mmiklos007</span></td>
									<td><a href="https://www.facebook.com/mmiklos007" target="_blank" class="btn btn-warning">https://www.facebook.com/mmiklos007</a></td>
									<td><a href="mailto:mmiklos007@gmail.com" target="_top" class="btn btn-warning">mmiklos007@gmail.com</a></td>
									<?
									if ($type1 == Admin)
									{
									?>
									<td><a href="index.php?link=contact&change=change">Módosítás/Törlés</a></td>
									<?
									}
									?>
								</tr>
								<?
								}
								?>
								<tr class="table-danger">
									<td><span class="btn btn-danger">arasorn</span></td>
									<td><a href="https://www.facebook.com/arasorn" target="_blank" class="btn btn-danger">https://www.facebook.com/arasorn</a></td>
									<td><a href="mailto:arasorn12@gmail.com" target="_top" class="btn btn-danger">arasorn12@gmail.com</a></td>
								</tr>
								<tr class="table-info">
									<td>-</td>
									<td>-</td>
									<td>-</td>
								</tr>
								<tr class="table-success">
									<td>-</td>
									<td>-</td>
									<td>-</td>
								</tr>
							</tbody>
						</table>
					</div>
<?
				}
				else
				{
?>
					<div class="error">Nincs ilyen oldal!</div>
<?
				}
?>
			</main>
			<article class="col-md-2">
				<marquee>Reklám helye</marquee>
			</article>
		</div>
		<footer class="row">
			<span>PartySzemöldök^^ | Minden jog fenntartva! | 2013-2017 | &copy; mmiklos007 &amp; arasorn</span>
		</footer>
	</body>
</html>






<!--
			MODAL - ablak

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Csá</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        jsfhdk skjhjksd vhfsdkj hgkhsdkjfhvk kdsh cf jscksfs cs j gbcjs bvh fjhbff jb f jhbcjhfj  ajh  fg
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Bezárás</button>
        <button type="button" class="btn btn-primary">Ez pedig semmi</button>
      </div>
    </div>
  </div>
</div>-->