<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('inc/database.php');
include('inc/helpers.php');

$sql = 'SELECT * FROM sites WHERE site_id=' . $_GET['site_id'] . ' LIMIT 1';

$result = $mysqli->query($sql);


if ($result->num_rows > 0)
{
    while($row = $result->fetch_assoc())
    {
            
        $title = $row["title"];
        $location = $row["location"];
        $body = $row["body"];
        $phone = $row["phone"];
        $email = $row["email"];
        $address = $row["address"];
        $main_image = $row["image"];
        $theme = $row["theme"];
        $color = $row["color"];

        switch($color)
        {
            case 'black':
                $services_icons = 'style="color: #fff !important;"';
                $experience_text = 'style="color: #fff !important;"';
                $footer_text = 'style="color: #fff !important;"';
            break;
            case 'orange':
            default:
                $services_icons = '';
                $experience_text = '';
                $footer_text = '';
        }

    }
}
else
{
    printf('No record found.<br />');
    $services_icons = '';
    $experience_text = '';
    $footer_text = '';
}

mysqli_free_result($result);
$mysqli->close();

$theme_path = 'themes/' . $theme;

// Get Template to Preview
include($theme_path . '/' . 'index.php');