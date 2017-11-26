<?php
	mysql_connect("127.0.0.1", "partyszemoldok", "party666");
	mysql_select_db("partyszemoldok");

	$suti = $_COOKIE["suti"];
	$bevan = 0;

	$kapcsolat = mysql_query("SELECT * FROM users");
	while ($adat = mysql_fetch_array($kapcsolat))
	{
		if ($suti == $adat["username"])
		{
			$bevan = 1;
			$id1 = $adat['id'];
			$username1 = $adat['username'];
			$password1 = $adat['password'];
			$supporter1 = $adat['supporter'];
		}
	}
?>

<!DOCTYPE html>

<html>
	<head>
		<title><?php if ($bevan == 1) { echo "$username1 - "; } ?>Support - PartySzemöldök^^</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
		<link href="css/suppstyle.css" rel="stylesheet">
		<link href="css/icon/icon.ico" rel="shortcut icon">
	</head>
	<body class="bg-dark">
		<script type="text/javascript">
			if (top.location != location)
			{
				top.location.href = document.location.href;
			}
		</script>
		<div class="container col-md-10 bg-secondary">
			<header class="row py-2">
				<a href="support.php" class="col-md-4 my-auto text-center"><img src="img/Support.jpg" class="w-75" alt="A kép betöltés alatt..." title="Vissza a support fõoldalra"></a>
				<h1 class="col-md-8 my-auto text-center"><a href="index.php" title="Vissza a fõoldalra!">partyszemöldök^^</a></h1>
			</header>
			<?php
			if ($bevan == 1)
			{
			?>
			<nav class="row bg-dark">
				<a
					<?php
					if ($ertek == "")
					{
					?>
						class="col-md-3 btn btn-secondary"
					<?php
					}
					else
					{
					?>
						class="col-md-3 btn btn-dark"
					<?php
					}
					?>
					href="support.php">Fõoldal
				</a>
					<?php
					if ($supporter1 == "igen")
					{
					?>
				<a
						<?php
						if ($ertek == "supporter")
						{
						?>
							class="col-md-3 btn btn-secondary"
						<?php
						}
						else
						{
						?>
							class="col-md-3 btn btn-dark"
						<?php
						}
						?>
					href="support.php?ertek=supporter">Supporter
				</a>
				<a
						<?php
						if ($ertek == "supportertagok")
						{
						?>
							class="col-md-3 btn btn-secondary"
						<?php
						}
						else
						{
						?>
							class="col-md-3 btn btn-dark"
						<?php
						}
						?>
						href="support.php?ertek=supportertagok">Supporter tagok
				</a>
					<?php
					}
					if ($supporter1 == "")
					{
					?>
				<a
					<?php
					if ($ertek == "nyitottlevelek")
					{
					?>
						class="col-md-3 btn btn-secondary"
					<?php
					}
					else
					{
					?>
						class="col-md-3 btn btn-dark"
					<?php
					}
					?>
					href="support.php?ertek=nyitottlevelek">Nyitott leveleid
				</a>
				<a
					<?php
					if ($ertek == "lezartlevelek")
					{
					?>
						class="col-md-3 btn btn-secondary"
					<?php
					}
					else
					{
					?>
						class="col-md-3 btn btn-dark"
					<?php
					}
					?>
					href="support.php?ertek=lezartlevelek">Lezárt leveleid
				</a>
					<?
					}
					?>
				<a class="col-md-3 btn btn-danger" href="suppprog.php?ertek=logout">Kijelentkezés</a>
			</nav>
			<?php
			}
			?>
			<main class="mx-auto col-md-10">
			<?php
			if ($bevan == 0)
			{
			?>
				<form action="suppprog.php" method="post">
					<input type="hidden" name="ertek" value="login">
					<div class="form-group">
						<input type="text" placeholder="Felhasználónév, vagy email" name="nevemail" class="form-control">
					</div>
					<div class="form-group">
						<input type="password" placeholder="Jelszó" aria-describedby="password" name="password" class="form-control">
						<small id="password" class="form-text text-light">Ha elfelejtetted a jelszavadat, akkor <a href="">itt</a> módosíthatod!</small>
					</div>
					<div class="form-group">
						<button class="btn btn-dark">Bejelentkezés</button>
					</div>
					<?php
					switch ($login)
						{
							case "uresnevemail";
								echo '<div class="error">Üres felhasználó név, email mezõ!</div>';
								break;
							case "uresjelszo";
								echo '<div class="error">Üres jelszó mezõ!</div>';
								break;
							case "nevemailnemegyezik";
								echo '<div class="error">Felhasználónév, email cím nem létezik, vagy nem jó!</div>';
								break;
							case "jelszonemjo";
								echo '<div class="error">A jelszó nem egyezik!</div>';
								break;
							default:
								break;
						}
					if ($logout == "kilep")
						{
							echo '<div class="success">Sikeres kijelentkezés!</div>';
						}
					?>
				</form>
			<?php
			}
			if ($bevan == 1)
			{
				if ($ertek == "")
				{
				?>
				<div class="container color-blue fs-20">Support szabályzat</div>
				<div class="container bg-secondary">
				<?php
				$adatok = mysql_query("SELECT * FROM suppszabalyzat");
				while ($adat = mysql_fetch_array($adatok))
				{
					$uzenet2 = str_replace("\r\n", "<br>", $adat['szabalyzat']);
					if ($supporter1 == "igen")
					{
				?>
				<form action="suppprog.php" method="post">
					<input type="hidden" name="ertek" value="szabalyzat2">
					<textarea name="szabaly" rows="20" cols="100"><?php echo $adat['szabalyzat']; ?></textarea>
					<input type="submit" value="Módosítás">
				</form>
				<?php
					switch ($szabalyok)
						{
							case "sikeres";
								echo '<div class="success">Sikeres módosítás!</div>';
								break;
							case "uresmezo";
								echo '<div class="error">Üres mezõ!</div>';
								break;
							default:
								break;
						}
				?>
				<?php
					}
					if ($supporter1 == "")
					{
				?>
				<span><?php echo $uzenet; ?></span>	
				<?php
					}
				}
				?>
				</div>
				<?php
				}
				if ($supporter1 == "igen")
				{
					if ($ertek == "supporter")
					{
				?>
				<div class="color-blue fs-20">Levelek</div>
				<div class="bg-primary">
				<?php
				
				?>
				</div>
				<?php
					}
					if ($ertek == "supportertagok")
					{
				?>
				<div class="color-blue fs-20">Tagok</div>
				<div class="bg-primary">
					<table class="container">
						<tr>
							<td>Felhasználónév</td>
							<td>e-mail</td>
							<td></td>
							<td>Supporter</td>
						</tr>
						<?php
						$adatok = mysql_query("SELECT * FROM users");
						while ($adat = mysql_fetch_array($adatok))
						{
						?>
						<tr>
							<td>
								<form action="suppprog.php" method="post">
									<input type="hidden" name="ertek" value="nevmod">
									<input type="hidden" name="id" value="<? echo $adat['id']; ?>">
									<input type="text" placeholder="<?php echo $adat['username']; ?>">
									<input type="submit" value="Módosítás">
								</form>
							</td>
							<td>
								<form action="suppprog.php" method="post">
									<input type="hidden" name="ertek" value="emailmod">
									<input type="hidden" name="id" value="<? echo $adat['id']; ?>">
									<input type="text" placeholder="<?php echo $adat['email']; ?>">
									<input type="submit" value="Módosítás">
								</form>
							</td>
							<td></td>
							<td>
								<form action="suppprog.php" method="post">
									<input type="hidden" name="ertek" value="supportermod">
									<input type="hidden" name="id" value="<? echo $adat['id']; ?>">
									<input type="checkbox" name="supporter" <?php if ($adat['supporter'] == "igen") { ?>checked<?php } ?> value="igen">
									<input type="submit" value="Módosítás">
								</form>
							</td>
						</tr>
						<?php
						}
						?>
					</table>
				</div>
				<?php
					}
				}
				if ($ertek == "lezartlevelek")
				{
				?>
				<div class="color-blue fs-20">Lezárt levelek</div>
				<div class="bg-primary">
				<?php
				if ($asd == "lezart")
				{
					if ($from == $username1)
					{
				?>
				<?php
					}
				}
				?>
				</div>
				<?php
				}
				if ($ertek == "nyitottlevelek")
				{
				?>
				<div class="color-blue fs-20">Nyitott levelek</div>
				<div class="bg-primary">
				<?php
				if ($asd == "nyitott")
				{
					if ($from == $username1)
					{
				?>
				<?php
					}
				}
				?>
				</div>
				<?php
				}
				?>
			<?php
			}
			?>
			</main>
		</div>
	</body>
</html>

