<?php
header('Content-Type: text/plain');
if (!isset($_POST['id'])) exit;
include('session.php');
include('initdb.php');
require_once('getRights.php');
if (hasRight('moderator')) {
    $newState = isset($_POST['unarchive']) ? 'pending' : 'archived';
    $logKey = isset($_POST['unarchive']) ? 'UAReport' : 'AReport';
    mysql_query('UPDATE mkreports SET state="'. $newState .'" WHERE id="'. $_POST['id'] .'"');
    mysql_query('INSERT INTO `mklogs` VALUES(NULL,NULL, '. $id .', "'. $logKey .' '. $_POST['id'] .'")');
}
echo 1;