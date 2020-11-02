<?php

use Millionaire\Redirect;

include_once 'includes/header.php';
if (!Millionaire\DB::checkIfAuth()) {
    Millionaire\Redirect::To('index.php');
};
$admins = Millionaire\DB::findAll('admins');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // CREATE
    if ($_POST['action'] == 'create') {
        $user = new Millionaire\Admin($_POST);
        if (Millionaire\DB::insert($user)) {
            Redirect::Refresh('?success=created');
        };
    }
    // DELETE
    if ($_POST['action'] == 'delete') {
        if (Millionaire\DB::deleteById('admins', $_POST['id'])) {
            Redirect::Refresh('?success=deleted');
        }
    }
    // UPDATE
    if ($_POST['action'] == 'update') {
        $selectedUser = Millionaire\DB::findById('admins', $_POST['id']);
        $username = $selectedUser->username;
        $email = $selectedUser->email;
    }

    if ($_POST['action'] == 'edit') {
        $username = $_POST['username'];
        $email = $_POST['email'];
        if(!empty($_POST['password'])){
            $password = md5($_POST['password']);
        } else {
            $password = '';
        }
        $id = $_POST['id'];
        $data = ['username' => $username, 'email' => $email, 'password' => $password, 'id' =>$id];
        if(Millionaire\DB::updateUserById($data)){
            Redirect::Refresh('?success=updated');
        };
    }
}

?>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Millionaire</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="quiz.php">Start quiz</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Hi <?= $_SESSION['username']; ?> </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>


    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-4">
                <?php if (isset($_GET['success'])) : ?>
                    <div class="alert alert-success">
                        Successfully <?= $_GET['success']; ?> user
                    </div>
                <?php endif ?>


                <form method="POST" action="users.php">
                    <!-- Update Form -->
                    <?php if(isset($_POST['action']) && $_POST['action'] == 'update'): ?>
                    <input type="hidden" name="id" value="<?= $_POST['id'] ?>">
                    <input type='hidden' name='action' value='edit' />
                    <div class="form-group">
                        <label for="username">Username?</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?= $username; ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email?</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $email; ?>">
                    </div>
                    <div class="form-group">
                        <label for="password">Password?</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-warning">Update</button>

                    <!-- Insert Form -->
                    <?php else: ?>
                        <input type='hidden' name='action' value='create' />
                    <div class="form-group">
                        <label for="username">Username?</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?= $_POST['username'] ?? '' ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email?</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $_POST['email'] ?? '' ?>">
                    </div>
                    <div class="form-group">
                        <label for="password">Password?</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                    <?php endif; ?>
                </form>
            </div>


            <!-- Listing Data -->
            <div class="col-8">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($admins as $admin) : ?>
                            <tr>
                                <td><?= $admin->username ?></td>
                                <td><?= $admin->email ?></td>
                                <td class='d-flex'>
                                    <form method='POST' action="users.php" class='mr-2'>
                                        <input type='hidden' name='action' value='update' />
                                        <input type='hidden' name='id' value='<?= $admin->id; ?>' />
                                        <button class='btn btn-sm btn-outline-primary'>Edit</button>
                                    </form>
                                    <form method='POST' action="users.php" class='form-inline'>
                                        <input type='hidden' name='action' value='delete' />
                                        <input type='hidden' name='id' value='<?= $admin->id; ?>' />
                                        <button type="submit" class='btn btn-sm btn-outline-danger'>Delete</button>
                                    </form>
                                </td>
                            <tr>
                            <?php endforeach; ?>

                            <td colspan='5'>Total users: <?= count($admins); ?></td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>