<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        table,
        .bordered {
            border-bottom: 2px solid black;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between">
        <a class="navbar-brand" href="index.php">Millionaire</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto float-right">
                <li class="nav-item">
                    <a class="nav-link" href="../quiz.php">Start over</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../login.php">Admin panel</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-8 offset-2">
                <div class="jumbotron jumbotron-fluid mt-4" style="background-color: #bd2130; color: white;">
                    <div class="container">
                        <h1 class="display-4">Ouchhh, soooooo sorry...</h1>
                        <p class="lead">
                            But nevermind, tomorrow is a new day.
                            And you can always start over and <a class="btn btn-danger" href="../quiz.php">try again</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>