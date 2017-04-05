<?php
include_once 'connect.php';
$quoteType = '';
$criteria = '';

if (isset($_GET['search'])) {
    $criteria = $_GET['search'];
}
if (isset($_GET['quote-type'])) {
    $quoteType = $_GET['quote-type'];
}
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/quote.js"></script>
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
						<?php
							$queryQuoteType = 'SELECT type FROM quote_type WHERE id ='.$quoteType;
							$query = 'SELECT q.*,  s.`size` FROM `quote` q, `font_size` s WHERE s.`id` = q.`font_size` AND  q.`quote_type` LIKE "%' . $quoteType . '%" order by q.`id`';
							if ($result = mysqli_query($link, $queryQuoteType)) {
									$data = mysqli_fetch_assoc($result);
									echo '<h1>'.$data['type'].'</h1>';
									echo '<hr>';
							}
						?>
					</div>
					<?php
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
								<label class="quote-label <?php echo $data['font_color']." ".$data['size']." ".$data['text_highlight_color']; ?>"><?php echo $data['quote_text'] ?></label>
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
						<input id="search" type="text" placeholder="search by quote owner" name="search" class="col-12" value="<?php echo $criteria;?>"/>
						<a href="add-quote.php">Add Quote</a>
						<h4>Quote Type</h4>
						<form action="index.php" method="GET">
							<input type="text" name="quote-type" value="1" >
							<button class="col-12">Love</button>
						</form>
						<form action="index.php" method="GET">
							<input type="text" name="quote-type" value="2" >
							<button class="col-12">Life</button>
						</form>
						<form action="index.php" method="GET">
							<input type="text" name="quote-type" value="3" >
							<button class="col-12">Motivation</button>
						</form>
						<form action="index.php" method="GET">
							<input type="text" name="quote-type" value="4" >
							<button class="col-12">Sarcasm</button>
						</form>
						<form action="index.php" method="GET">
							<input type="text" name="quote-type" value="5" >
							<button class="col-12">Friendship</button>
						</form>
						<form action="index.php" method="GET">
							<input type="text" name="quote-type" value="6" >
							<button class="col-12">Worship</button>
						</form>
					</div>
				</div>
			</div>
			<footer>
				<span class="logo-small">S</span>quote - 2017
			</footer>
		</div>
	</body>
</html>