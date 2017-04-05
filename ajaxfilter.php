<?php
	include_once 'connect.php';
	$request = $_POST['request'];
	$query = 'SELECT q.*,  s.`size` FROM `quote` q, `font_size` s WHERE s.`id` = q.`font_size` AND q.`quote_owner` LIKE "%' . $request . '%" order by q.`id`';
	$result = mysqli_query($link, $query);
	if($request != null){
		echo '<div class="header">';
		echo '<h1>'.$request.'</h1>';
		echo '<hr>';
		echo '</div>';
	}
	while ($data = mysqli_fetch_assoc($result)) {
		echo'<div class="post-content col-11">';
		echo '<div class="header">';
		echo '<header>';
		echo '	<h2>'.$data['title'].'</h2>';
		echo '</header>';
		echo '</div>';
		echo '<div class="col-12 post-inner-content">';
		echo '	<img src="'.$data['quote_picture'].'" alt="img post" class="col-12">';
		echo '	<div class="quote-box '.$data['quote_posisition'].'">';
		echo '		<label class="quote-label '.$data['font_color'].' '.$data['size'].' '.$data['text_highlight_color'].'">'.$data['quote_text'].'</label>';
		echo '	</div>';
		echo '	<label class="quote-owner">by : '.$data['quote_owner'].'</label>';
		echo '	<div class="detail">';
		echo '		<div class="outer">';
		echo '			<div class="inner">echo ';
		echo '				<a href="edit-quote.php?id='.$data['id'].'" class="button col-10 bg-green">Edit</a>';
		echo '				<a onclick="return confirm("are you sure to delete ?")" href="delete.php?id='.$data['id'].'" class="button col-10 bg-red">Delete</a>';
		echo '			</div>';
		echo '		</div>';
		echo '	</div>';
		echo '</div>';
		echo '</div>';
	}
?>