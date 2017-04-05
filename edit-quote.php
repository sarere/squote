<?php
include_once 'connect.php';
$id = $_GET['id'];
if (isset($_POST['submit'])) {
    $query='';
    $title = $_POST['title'];
    $fontSize = $_POST['font-size'];
    $fontColor = $_POST['font-color'];
    $quoteOwner = $_POST['quote-owner'];
    $highilightColor = $_POST['highlight-color'];
    $quotePosisition = $_POST['quote-posisition'];
    $quoteType = $_POST['quote-type'];
    $quoteText = $_POST['quote-text'];
	$quotePicture = $_FILES['quote-picture']['name'];
    $uploadpath = 'images/' . $quotePicture;
    $oldQuotePicture = $_POST['old-quote-picture'];
    if ($_FILES['quote-picture']['size'] > 0) {
        if ($_FILES['quote-picture']['type'] === 'image/jpeg' || $_FILES['quote-picture']['type'] === 'image/png') {
            if (move_uploaded_file($_FILES['quote-picture']['tmp_name'], $uploadpath)) {
                $query = "UPDATE `quote` SET `title`='$title',`font_size`='$fontSize',`font_color`='$fontColor',`quote_owner`='$quoteOwner',`text_highlight_color`='$highilightColor',`quote_posisition`='$quotePosisition',`quote_type`='$quoteType',`quote_text`='$quoteText',`quote_picture`='$uploadpath' WHERE id=".$id;
            } else {
                echo 'upload gambar gagal';
            }
        } else {
            echo 'format gambar salah';
        }
    } else {
       $query = "UPDATE `quote` SET `title`='$title',`font_size`='$fontSize',`font_color`='$fontColor',`quote_owner`='$quoteOwner',`text_highlight_color`='$highilightColor',`quote_posisition`='$quotePosisition',`quote_type`='$quoteType',`quote_text`='$quoteText',`quote_picture`='$oldQuotePicture' WHERE id=".$id;
    }
    if(strlen($query)>0){
        $result = mysqli_query($link, $query);
        if($result){
            header("location:index.php");
        }
    }
}

$query = 'SELECT q.* , t.`type` FROM `quote` q ,`quote_type` t WHERE q.`quote_type` = t.`id` AND q.`id` = '.$id;
$result = mysqli_query($link, $query);
$data = mysqli_fetch_assoc($result);
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
				<form method="POST" action="edit-quote.php?id=<?php echo $data['id']; ?>" id="formtambah" enctype="multipart/form-data">
					<div class="field">
						<label>Title</label>
						<input type="text" name="title" placeholder="Post Title" value="<?php echo $data['title']; ?>">
					</div>
					<div class="field">
						<label>Font Size</label>
						<select name="font-size">
							<option value="-1">-Pilih-</option>
							<?php if($data['font_size'] === 'large') { ?>
							<option value="large" <?php echo 'selected="selected"'?>> large</option>
							<?php } elseif ($data['font_size'] === 'normal') { ?>
							<option value="normal" <?php echo 'selected="selected"'?>> normal</option>
							<?php } else { ?>
							<option value="tiny" <?php echo 'selected="selected"'?>> tiny </option>
							<?php } ?>
						</select>
					</div>
					<div class="field">
						<label>Font Color</label>
						<select name="font-color">
							<option value="-1">-Pilih-</option>
							<?php if($data['font_color'] === 'red') { ?>
							<option value="red" <?php echo 'selected="selected"'?>> red </option>
							<?php } elseif ($data['font_color'] === 'green') { ?>
							<option value="green" <?php echo 'selected="selected"'?>> green </option>
							<?php } elseif ($data['font_color'] === 'yellow') { ?>
							<option value="yellow" <?php echo 'selected="selected"'?>> yellow </option>
							<?php } elseif ($data['font_color'] === 'black') { ?>
							<option value="black" <?php echo 'selected="selected"'?>> black </option>
							<?php } else { ?>
							<option value="white" <?php echo 'selected="selected"'?>> white </option>
							<?php } ?>
						</select>
					</div>
					<div class="field">
						<label>Quote Owner</label>
						<input type="text" name="quote-owner" placeholder="Quote Owner" value="<?php echo $data['quote_owner']; ?>">
					</div>
					<div class="field">
						<label>Text Highlight Color</label>
						<select name="highlight-color">
							<option value="-1">-Pilih-</option>
							<?php if($data['text_highlight_color'] === 'bg-red') { ?>
							<option value="bg-red" <?php echo 'selected="selected"'?>> red </option>
							<?php } elseif ($data['text_highlight_color'] === 'bg-green') { ?>
							<option value="bg-green" <?php echo 'selected="selected"'?>> green </option>
							<?php } elseif ($data['text_highlight_color'] === 'bg-yellow') { ?>
							<option value="bg-yellow" <?php echo 'selected="selected"'?>> yellow</option>
							<?php } elseif ($data['text_highlight_color'] === 'bg-black') { ?>
							<option value="bg-black" <?php echo 'selected="selected"'?>> black </option>
							<?php } else { ?>
							<option value="bg-white" <?php echo 'selected="selected"'?>> white </option>
							<?php } ?>
						</select>
					</div>
					<div class="field">
						<label>Quote Posisiton</label>
						<select name="quote-posisition">
							<option value="-1">-Pilih-</option>
							<?php if($data['text_highlight_color'] === 'top-left') { ?>
							<option value="top-left" <?php echo 'selected="selected"'?>> top-left </option>
							<?php } elseif($data['text_highlight_color'] === 'top-right') { ?>
							<option value="top-right2" <?php echo 'selected="selected"'?>> top-right </option>
							<?php } elseif($data['text_highlight_color'] === 'top') { ?>
							<option value="top" <?php echo 'selected="selected"'?>> top </option>
							<?php } elseif($data['text_highlight_color'] === 'bot-left') { ?>
							<option value="bot-left" <?php echo 'selected="selected"'?>> bottom-left </option>
							<?php } elseif($data['text_highlight_color'] === 'bot-right') { ?>
							<option value="bot-right" <?php echo 'selected="selected"'?>> bottom-right </option>
							<?php } else { ?>
							<option value="bottom" <?php echo 'selected="selected"'?>> bottom </option>
							<?php } ?>
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
									if($row['id'] == $data['quote_type']) {
                                    	echo '<option value="' . $row['id'] . '" selected="selected">' . $row['type'] . '</option>';
									} else {
										echo '<option value="' . $row['id'] . '">' . $row['type'] . '</option>';
									}
                                }
							?>
						</select>
					</div>
					<div class="field">
						<label>Quote Text</label>
						<textarea type="text" name="quote-text" placeholder="Quote Text"><?php echo $data['quote_text']; ?></textarea>
					</div>
					<div class="field">
						<label>Quote Picture</label>
						<img src="<?php echo $data['quote_picture'] ?>" alt="preview quote picture"  class="col-2">
                        <input type="hidden" name="old-quote-picture" value="<?php echo $data['quote_picture']; ?>">
						<input type="file" name="quote-picture" value="<?php echo $data['quote_picture']; ?>">
					</div>
				</form>
				<div class="field">
					<button name="submit" value="submit" form="formtambah" class="button col-12 submit">Submit</button>
				</div>
			</div>
			<footer>
				<span class="logo-small">S</span>quote - 2017
			</footer>
		</div>
	</body>
</html>