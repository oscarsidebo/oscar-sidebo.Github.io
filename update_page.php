<?php
session_start();
?>

<?php 

$_SESSION['page'] = $_SESSION['page']+1;
$base = "https://open.spotify.com/embed/artist/";
$end = substr($_SESSION['uri'][$_SESSION['page']], 15);
$newurl = $base . $end;

$art_url = "url(" . $_SESSION['artwork_url'][$_SESSION['page']] .  ")";

echo $_SESSION['name'][$_SESSION['page']];
echo "|$|";
echo $_SESSION['genres'][$_SESSION['page']];
echo "|$|";
echo $_SESSION['labels'][$_SESSION['page']];
echo "|$|";
echo $_SESSION['pr'][$_SESSION['page']];
echo "|$|";
echo $_SESSION['agents'][$_SESSION['page']];
echo "|$|";
echo $_SESSION['mgmt'][$_SESSION['page']];
echo "|$|";
echo $_SESSION['most_streamed'][$_SESSION['page']];
echo "|$|";
echo $_SESSION['monthly_listeners'][$_SESSION['page']];
echo "|$|";
echo "<iframe src= $newurl width='425' height='450' frameborder='0' allowtransparency='true'></iframe>";
echo "|$|";
echo $art_url;

?>

		