<?php
	include_once 'connect.php';
	$request = $_POST['request'];
	$query = 'SELECT m.* , q.`quality`, g.`genre` FROM `qualities` q ,`movies` m, `genres` g WHERE m.`quality` = q.`id` AND m.`genre` = g.`id` AND m.`title` LIKE "%' . $request . '%" order by m.`id`';
	$result = mysqli_query($link, $query);
	if($request != null){
		echo '<h1>'.$request.'</h1>';
	}
	else {
		echo '<h1>All Movies</h1>';
	}
	while ($data = mysqli_fetch_assoc($result)) {
		echo '<div class="item">';
		echo '	<div class="detail">';
		echo '		<label>'.$data['title'].'</label>';
		echo '		<label>Rating :'.$data['rating'].'</label>';
		echo '		<label>Duration : '.$data['duration'].' minutes</label>';
		echo '		<label>'.$data['synopsis'].'</label>';
		echo '		<label>Release Date : '.$data['release_date'].'</label>';
		echo '		<div class="button action col-11 edit">Edit</div>';
		echo '		<a class="col-11 button action delete" onclick="return confirm(are you sure to delete ?)" href="delete.php?id='.$data['id'].'">Delete</a>';
		echo '	</div>';
		echo '	<div class="detail-top">';
		echo '		<img src="'.$data['cover'].'" alt="Smiley face" class="poster">';
		echo '		<label class="detail-type">'.$data['quality'].'</label>';
		echo '	</div>';
		echo '	<div class="title">'.$data['title'].'</div>';
		echo '	<div class="title">'.$data['genre'].'</div>';
		echo '</div>';
	}

?>