<?php
session_start();

if (!isset($_SESSION['username'])) {
	$_SESSION['msg'] = "You must log in first";
	header('location: signin.php');
}
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['username']);
	header("location: signin.php");
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>

	<link rel="stylesheet" href="homecss.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</head>

<body>
	<div class="wrapper">
		<div class="header">
			<div class="container-fluid">
				<div class="w3-bar">


					<!-- logged in user information -->
					<?php if (isset($_SESSION['username'])) : ?>

						<div onclick="myFunction()" class="user">
							<div id="Demo" class="w3-dropdown-content w3-bar-block w3-border">
								<a href="index.php?logout='1'" class="w3-bar-item w3-button">Sign out</a>

							</div>
							<span class="my-image-icon user">
								<i class="fas fa-user"></i>
							</span>
							<span class="text-username">
								<?php echo $_SESSION['username']; ?>
							</span>
						</div>
				</div>
			<?php endif ?>
			</div>
		</div>
	</div> <!--  header -->
	<div class="middle">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="image">
						<img src="1.jpg" vspace="10" hspace="20" style="width:12%">
						<img src="1.jpg" vspace="10" align="right" style="width:11%">
						<img src="1.jpg" vspace="10" hspace="180" style="width:10%">
					</div>
				</div>
				<div class="col-12">
					<h1>Reading English Article web for Beginners</h1>
				</div>
				<div class="col-12 col-md-8">
					<div class="content">
						<div class="row">
							<div class="col-6">
								<a href="#" class="my-link">
									<span class="my-image-icon">
										<i class="far fa-copy"></i>
									</span>
									<span class="my-image-text">
										Parts of a sentence & translate
									</span>
								</a>
							</div>
							<div class="col-6">
								<a href="searchpage.php" class="my-link">
									<span class="my-image-icon search">
										<i class="far fa-file-alt"></i>
									</span>
									<span class="my-image-text">
										Search
									</span>
								</a>
							</div>
							<div class="col-6">
								<a href="#" class="my-link">
									<span class="my-image-icon bibliography">
										<i class="fas fa-book"></i>
									</span>
									<span class="my-image-text">
										Bibliography
									</span>
								</a>
							</div>
							<div class="col-6">
								<a href="allnote.php" class="my-link">
									<span class="my-image-icon note">
										<i class="far fa-edit"></i>
									</span>
									<span class="my-image-text">
										Note
									</span>
								</a>
							</div>
						</div>
						<br>
					</div>
				</div>
				<div class="col-12 col-md-4">
					<div class="image-right">
						<img src="bg.png" hspace="30" style="width:140%;">
					</div>
				</div>
			</div>
		</div>
	</div>
	</div><!--  wrapper -->
	<div class="footer">

	</div>
	<script>
		function myFunction() {
			var x = document.getElementById("Demo");
			if (x.className.indexOf("w3-show") == -1) {
				x.className += " w3-show";
			} else {
				x.className = x.className.replace(" w3-show", "");
			}
		}
	</script>
</body>



</html>