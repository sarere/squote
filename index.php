<?php
include_once 'connect.php';
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script type="text/javascript" src="js/jquery.js"></script>
		<title>Squote</title>
	</head>
	<body>
		<div id="wrapper">
			<nav>
				<div class="col-7">
					<a href="index.php"><span class="logo-big">S</span>quote</a>
				</div>
			</nav>
			<div class="main col-7">
				<div class="left-side col-8">
					<div class="header">
						<h1>Love</h1>
						<hr>
					</div>
					<?php
						$query = 'SELECT * FROM `quote`';
						$result = mysqli_query($link, $query);
						while ($data = mysqli_fetch_assoc($result)) {
					?>
					<div class="post-content col-11">
						<header>
							<h2><?php echo $data['title']; ?></h2>
						</header>
						<div class="col-12 post-inner-content">
							<img src="<?php echo $data['quote_picture']; ?>" alt="img post" class="col-12">
							<div class="<?php echo "quote-box ".$data['quote_posisition']; ?>">
								<label class="quote-label <?php echo $data['font_color']." ".$data['font_size']." ".$data['text_highlight_color']; ?>"><?php echo $data['quote_text'] ?></label>
							</div>
							<label class="quote-owner">by : <?php echo $data['quote_owner']; ?></label>
							<div class="detail">
								<div class="outer">
									<div class="inner">
										<a href="edit-quote.php?id=<?php echo $data['id']; ?>" class="button col-10 bg-green">Edit</a>
										<a onclick="return confirm('are you sure to delete ?')" href="delete.php?id=<?php echo $data['id']; ?>" class="button col-10 bg-red">Delete</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
				<div class="right-side col-4">
					
					<div class="col-10 filter">
						<input id="search" type="text" placeholder="search by quote owner" name="search" value="" class="col-12">
						<a href="add-quote.php">Add Qoute</a>
						<h4>Quote Type</h4>
						<a href="">Love</a>
						<a href="">Life</a>
						<a href="">Motivation</a>
						<a href="">Sarcasm</a>
						<a href="">Friendship</a>
						<a href="">Worship</a>
					</div>
				</div>
			</div>
			<footer>
				<span class="logo-small">S</span>quote - 2017
			</footer>
		</div>
	</body>
</html>