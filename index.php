<?php

interface JsonSerializable {

	public function jsonSerialize();

}

define('PATH_ROOT', dirname($_SERVER['SCRIPT_FILENAME']).'/');
const CALLBACK_URL = 'https://pin.dev';

//echo CALLBACK_URL;

//echo PATH_ROOT;exit;

echo '<pre>';


$folders = array(
	'src/Pinterest/Auth/',
	'src/Pinterest/Endpoints/',
	'src/Pinterest/Exceptions/',
	'src/Pinterest/Models/',
	'src/Pinterest/Transport/',
	'src/Pinterest/Utils/',
	'src/Pinterest/'
);

$load = array();

foreach ($folders as $folder){
	foreach (glob($folder."*.php") as $filename)
	{
		$load[] = $filename;
	}
}

array_unshift($load, $load[2]);
unset($load[3]);

array_unshift($load, $load[13]);
unset($load[13]);

//array_unshift($load, $load[13]);
//unset($load[14]);


//unset($load[11]);
//var_dump($load);

foreach ($load as $filename)
{
	require $filename;
}

//exit;

//require (PATH_ROOT.'src/Pinterest/Pinterest.php');
//require (PATH_ROOT.'src/Pinterest/Utils/CurlBuilder.php');
//require (PATH_ROOT.'src/Pinterest/Transport/Request.php');
//require (PATH_ROOT.'src/Pinterest/Auth/PinterestOAuth.php');
//require (PATH_ROOT.'src/Pinterest/Exceptions/InvalidEndpointException.php');

use DirkGroenen\Pinterest\Pinterest;


$appid = '4794601242506568714';
$appsecret = '2930aaa2f7dd8c16874dcdf71d93f7569c32e0a29645e6d47f73265a237ee77d';
$pinterest = new Pinterest($appid, $appsecret);

if (isset($_GET['access_token'])){

	$pinterest->auth->setOAuthToken($_GET['access_token']);

//	$me = $pinterest->users->me();
//	var_dump($me);


//	$pins = $pinterest->users->getMeBoards();
//	var_dump($pins);

	$response = $pinterest->pins->create(array(
		"note"      => "hashtag efc",
		"image_url" => "http://i3.mirror.co.uk/incoming/article3993051.ece/ALTERNATES/s298/Everton-Emblem.jpg",
		"board"     => "443886175712046490"
	));

	var_dump($response);

} else {
	$loginurl = $pinterest->auth->getLoginUrl(CALLBACK_URL, array('read_public,write_public,read_relationships,write_relationships'));
	echo '<a href=' . $loginurl . '>Authorize Pinterest</a>';
}