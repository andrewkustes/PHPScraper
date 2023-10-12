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

        <form action="generate.php" method="post">
        <div class="mb-4">
            <label for="exampleFormControlTheme" class="form-label">Theme</label>
            <select class="form-select" id="exampleFormControlTheme" name="theme">
                <option value="faster">Services (Faster Deisgn)</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="exampleFormControlColor" class="form-label">Color</label>
            <select class="form-select"  id="exampleFormControlColor" name="color">
                <option value="orange">Orange</option>
                <option value="black">Black</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="exampleFormControlText" class="form-label">URL</label>
            <input type="text" class="form-control" id="exampleFormControlText" name="url" />
        </div>
        <div class="mb-4 text-center">
            <input type="submit" class="btn btn-primary" name="submit" value="Generate New Preview" />
        </div>
        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>