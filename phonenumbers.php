<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include Required
include('classes/simple_html_dom.php');
include('inc/database.php');
include('inc/helpers.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ad to Website Preview</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>

    <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">VBT</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="list.php">Saved Previews</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="phonenumbers.php">Phone Numbers</a>
            </li>
        </ul>

        </div>
    </div>
    </nav>

    <hr />

    <div class="container">

        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            <div class="mb-4">
                <label for="exampleFormControlText" class="form-label">URL</label>
                <input type="text" class="form-control" id="exampleFormControlText" name="url" />
            </div>
            <div class="mb-4 text-center">
                <input type="submit" class="btn btn-primary" name="submit" value="Get Phone Numbers" />
            </div>
        </form>

        <hr />

        <?php
            // Parse Phone Numbers
            if(isset($_POST['submit']))
            {
                $url = $_POST['url'];

                // Get the Page Content
                $html = file_get_html($url);

                // Get the Title of Page
                $title = $html->find('span[id=titletextonly]', 0)->plaintext;

                $number = get_phone($title);

                if($number)
                {
                    /*
                    // Insert into Phone Numbers table
                    $insert_sql = "INSERT INTO phone_numbers " .
                    "(number) "."VALUES " .
                    "('$number')";

                    $mysqli->query($insert_sql);*/
                }
            }
        ?>

        <h3>Saved Phone List</h3>
        <div style="width: 100%; height: 380px; overflow: auto;">
        <?php
        // Saved Phone List
        $sql = 'SELECT * FROM phone_numbers';

        $result = $mysqli->query($sql);
        
        
            if ($result->num_rows > 0)
            {
                while($row = $result->fetch_assoc())
                {

                   echo $row['number'] . '<br />';
                }
            }
            else
            {
                
                echo 'No phone numbers found.<br />';
            }
        
            mysqli_free_result($result);
            $mysqli->close();

        ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>