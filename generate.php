<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include Required
include('classes/simple_html_dom.php');
include('inc/database.php');
include('inc/helpers.php');

// Get the value in the URL query
$url = $_POST['url'];
$theme = ( ! empty($_POST['theme']) ) ? $_POST['theme'] :  'faster';
$color = ( ! empty($_POST['color']) ) ? $_POST['color'] :  'orange';

// Get the Page Content
$html = file_get_html($url);

// Get the Title of Page
$title = $html->find('span[id=titletextonly]', 0)->plaintext;

// Get Location after Main Title
$location = $html->find('small', 0);

// Get the Body of the Page
$body = $html->find('section[id=postingbody]', 0);

// Get the Main image of Page
$images = $html->find('img');

// Display Parts for the Generated Page
$phone = get_phone($body);
$email = get_email($body);
$address = get_address($body);
$main_image = get_main_image($images);
$title = addslashes ($title);
$location = addslashes ($location);
$body = addslashes ($body);
$datetime = date('Y-m-d H:i:s');

// Generate Site ID:
$site_id = generateNumericString(5);

$insert_sql = "INSERT INTO sites ".
    "(title, location, body, phone, email, address, image, theme, color, site_id, datetime) "."VALUES ".
    "('$title','$location','$body', '$phone', '$email', '$address', '$main_image', '$theme', '$color', '$site_id', '$datetime')";

$mysqli->query($insert_sql);
$mysqli->close();
header("location: preview.php?site_id=" . $site_id);