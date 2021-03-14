<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
        "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Music Viewer</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
    <link href="viewer.css" type="text/css" rel="stylesheet"/>
</head>
<body>
<div id="header">

    <h1>190M Music Playlist Viewer</h1>
    <h2>Search Through Your Playlists and Music</h2>
</div>

<div id="listarea">
    <ul id="musiclist">

        <?php

        $playlist = $_REQUEST["playlist"];
        if (isset($playlist)) {
            $playlist = file_get_contents($playlist, FILE_USE_INCLUDE_PATH);

            foreach (glob("songs/*.mp3") as $filename) {

                $filesize = filesize($filename);
               if (strpos($playlist, $filename)) {
                    $filename = str_replace("songs/", "", $filename);
                    echo "
            <li class='mp3item'>
            <a href='$filename'>$filename</a>
            ($filesize b)
            </li>";
                }

            }

        } else {
            foreach (glob("songs/*.mp3") as $filename) {
                $filesize = filesize($filename);
                $filename = str_replace("songs/", "", $filename);
                echo "
            <li class='mp3item'>
            <a href='songs/$filename'>$filename</a>
            ($filesize b)
            </li>";

            }
            foreach (glob("*.txt") as $filename) {
                $filesize = filesize($filename);
                $filename = str_replace("songs/", "", $filename);
                echo "
            <li class='playlistitem'>
            <a href='index.php?playlist=$filename'>$filename</a>
            ($filesize b)
            </li>";

            }
        }
        ?>
    </ul>
</div>
</body>
</html>
