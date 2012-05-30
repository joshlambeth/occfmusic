<?php
require_once('songFunctions.php');
addSong($_POST['title'], $_POST['writer'], $_POST['performer'], $_POST['publisher'], $_POST['copyrightDate'], $_POST['key'], $_POST['submittedBy'], $_POST['notes'], $_POST['url'], $_POST['mp3Url'], $_POST['slidesUrl'], $_POST['date'], $_POST['visible']);

if (file_exists(getcwd()."/../leadsheets/temporary")) {
    $url = basename(str_replace( "\\", "/", $_POST['url']));
    rename(getcwd()."/../leadsheets/temporary", getcwd()."/../leadsheets/" . $url);
}

if (file_exists(getcwd()."/../mp3s/temporary")) {
    $url = basename(str_replace( "\\", "/", $_POST['mp3Url']));
    rename(getcwd()."/../mp3s/temporary", getcwd()."/../mp3s/" . $url);
}

if (file_exists(getcwd()."/../slides/temporary")) {
    $url = basename(str_replace( "\\", "/", $_POST['slidesUrl']));
    rename(getcwd()."/../slides/temporary", getcwd()."/../slides/" . $url);
}

echo mysql_insert_id();

?>