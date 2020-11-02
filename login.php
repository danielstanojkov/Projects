<?php include_once 'includes/header.php'; ?>

<?php
if(Millionaire\DB::checkIfAuth()){
    Millionaire\Redirect::To('dashboard.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    if (!Millionaire\DB::Auth($email, $password)) {
        $alert = "<div class='alert alert-danger'>Wrong Credentials</div>";
    };
}

?>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between">
        <a class="navbar-brand" href="index.php">Millionaire</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto float-right">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Homepage</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-4 offset-4 mt-4">
                <?php if (!isset($alert)) : ?>
                    <div class="alert alert-info">
                        Pssst!<br />
                        Use `admin` as both username and password. <br />
                        Once inside you can crate your own user. <br />
                        But please do not enter without a mask!!! &#128567;
                    </div>
                <?php else : ?>
                    <?= $alert; ?>
                <?php endif; ?>
                <form method="POST">
                    <div class="form-group">
                        <label for="email">Email address / username</label>
                        <input type="text" required name="email" class="form-control" id="email" placeholder="Enter email or username" value="<?= $_POST['email'] ?? '' ?>">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" required name="password" class="form-control" id="password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>