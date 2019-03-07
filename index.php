<?php 
// print_r($_POST);
require __DIR__ . '/vendor/autoload.php';
$instagram = new \InstagramScraper\Instagram();
$ser = $_POST['tag']; 
if(!isset($ser)){
$ser = "cat";
}

$ser = str_replace(' ','',$ser);
$ser = str_replace('#','',$ser);
// print_r($ser);
$medias = $instagram->getMediasByTag($ser);
//Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader);
$main = $twig->loadTemplate('index.html');
$photos = array();
for ($i=0; $i < count($medias); $i++) { 
	$photos[$i]['url']=$medias[$i]->getImageHighResolutionUrl();
	$photos[$i]['Link']=$medias[$i]->getLink();
}
echo $twig->render($main, ['a_variable' => 'hello','photos' => $photos]);
?>