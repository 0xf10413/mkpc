<?php
if (isset($_POST['perso'])) {
	include('initdb.php');
	$perso = mysql_fetch_array(mysql_query('SELECT name,acceleration,speed,handling,mass,sprites FROM `mkchars` WHERE sprites="'. $_POST['perso'] .'"'));
	if ($perso) {
		require_once('persos.php');
		$spriteSrcs = get_sprite_srcs($perso['sprites']);
		$res = array (
			'name' => $perso['name'],
			'acceleration' => +$perso['acceleration'],
			'speed' => +$perso['speed'],
			'handling' => +$perso['handling'],
			'mass' => +$perso['mass'],
			'map' => $spriteSrcs['map'],
			'podium' => $spriteSrcs['podium'],
			'music' => get_perso_music($data)
		);
		echo json_encode($res);
	}
	else
		echo '-1';
	mysql_close();
}
?>