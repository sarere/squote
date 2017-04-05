<?php
include_once 'connect.php';
if (isset($_POST['submit'])) {
    $title = mysqli_real_escape_string($link,$_POST['title']);
    $fontSize = mysqli_real_escape_string($link,$_POST['font-size']);
    $fontColor = mysqli_real_escape_string($link,$_POST['font-color']);
    $quoteOwner = mysqli_real_escape_string($link,$_POST['quote-owner']);
    $highilightColor = mysqli_real_escape_string($link,$_POST['highlight-color']);
    $quotePosisition = mysqli_real_escape_string($link,$_POST['quote-posisition']);
	$quoteType = mysqli_real_escape_string($link,$_POST['quote-type']);
    $quoteText = mysqli_real_escape_string($link,$_POST['quote-text']);
    $quotePicture = $_FILES['quote-picture']['name'];
    $uploadpath = 'images/' . $quotePicture;
    if ($_FILES['quote-picture']['type'] === 'image/jpeg' || $_FILES['quote-picture']['type'] === 'image/png') {
        if (move_uploaded_file($_FILES['quote-picture']['tmp_name'], $uploadpath)) {
            $query = "INSERT INTO `quote`(`title`,`font_size`,`font_color`,`quote_owner`,`text_highlight_color`,`quote_posisition`,`quote_type`,`quote_text`,`quote_picture`) VALUES('$title','$fontSize','$fontColor','$quoteOwner','$highilightColor','$quotePosisition','$quoteType','$quoteText','$uploadpath')";
            //var_dump($query);
            $result = mysqli_query($link, $query);
            //var_dump($result);
            header("location:index.php");
        } else {
            echo 'upload gambar gagal';
        }
    } else {
        echo 'format gambar salah';
    }
}
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
			<div class="main-one-column col-7">
				<form method="POST" action="add-quote.php" id="formtambah" enctype="multipart/form-data">
					<div class="field">
						<label>Title</label>
						<input type="text" name="title" placeholder="Post Title">
					</div>
					<div class="field">
						<label>Font Size</label>
						<select name="font-size">
							<option value="-1">-Pilih-</option>
							<?php
                                $query = 'SELECT * FROM `font_size`';
                                $result = mysqli_query($link, $query);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $row['id'] . '">' . $row['size'] . '</option>';
                                }
							?>
						</select>
					</div>
					<div class="field">
						<label>Font Color</label>
						<select name="font-color">
							<option value="-1">-Pilih-</option>
							<?php
                                $query = 'SELECT * FROM `font_color`';
                                $result = mysqli_query($link, $query);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $row['id'] . '">' . $row['id'] . '</option>';
                                }
							?>
						</select>
					</div>
					<div class="field">
						<label>Quote Owner</label>
						<input type="text" name="quote-owner" placeholder="Quote Owner">
					</div>
					<div class="field">
						<label>Text Highlight Color</label>
						<select name="highlight-color">
							<option value="-1">-Pilih-</option>
							<?php
                                $query = 'SELECT * FROM `text_highlight_color`';
                                $result = mysqli_query($link, $query);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $row['id'] . '">' . $row['highlight_color'] . '</option>';
                                }
							?>
						</select>
					</div>
					<div class="field">
						<label>Quote Posisiton</label>
						<select name="quote-posisition">
							<option value="-1">-Pilih-</option>
							<?php
                                $query = 'SELECT * FROM `quote_posisition`';
                                $result = mysqli_query($link, $query);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $row['id'] . '">' . $row['posisition'] . '</option>';
                                }
							?>
						</select>
					</div>
					<div class="field">
						<label>Quote Type</label>
						<select name="quote-type">
							<option value="-1">-Pilih-</option>
							<?php
                                $query = 'SELECT * FROM `quote_type`';
                                $result = mysqli_query($link, $query);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $row['id'] . '">' . $row['type'] . '</option>';
                                }
							?>
						</select>
					</div>
					<div class="field">
						<label>Quote Text</label>
						<textarea type="text" name="quote-text" placeholder="Quote Text"></textarea>
					</div>
					<div class="field">
						<label>Quote Picture</label>
						<input type="file" name="quote-picture">
					</div>
				</form>
				<div class="field">
					<button name="submit" value="submit" form="formtambah" class="button col-12 submit">Submit</button>
					<a href="index.php" class="button col-12 submit">Cancel</a>
				</div>
			</div>
			<footer>
				<span class="logo-small">S</span>quote - 2017
			</footer>
		</div>
	</body>
</html>