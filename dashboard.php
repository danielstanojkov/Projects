<?php

use Millionaire\Redirect;

include_once 'includes/header.php'; ?>
<?php
if (!Millionaire\DB::checkIfAuth()) {
    Millionaire\Redirect::To('index.php');
};

$questions = Millionaire\DB::findAll('questions');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action'])) {

        if ($_POST['action'] == 'create') {
            $question = new Millionaire\Question($_POST);
            if (Millionaire\DB::insert($question)) {
                Redirect::Refresh('?success=created');
            };
        }

        if ($_POST['action'] == 'delete') {
            if (Millionaire\DB::deleteById('questions', $_POST['id'])) {
                Redirect::Refresh('?success=deleted');
            };
        }

        if ($_POST['action'] == 'edit') {
            $question = Millionaire\DB::findById('questions', $_POST['id']);
        }

        if ($_POST['action'] == 'update') {
            $data = [
                'question' => $_POST['question'],
                'correct' => $_POST['correct'],
                'level' => $_POST['level'],
                'answer1' => $_POST['answer1'],
                'answer2' => $_POST['answer2'],
                'answer3' => $_POST['answer3'],
                'answer4' => $_POST['answer4'],
                'id' => $_POST['id']
            ];
            if (Millionaire\DB::updateQuestionById($data)) {
                Redirect::Refresh('?success=updated');
            };
        }
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
                    <a class="nav-link" href="users.php">Add user</a>
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
                        Successfully <?= $_GET['success']; ?> question
                    </div>
                <?php endif ?>

                <!-- ====== UPDATE QUESTION =======-->
                <?php if (isset($_POST['action']) && $_POST['action'] == 'edit') : ?>

                    <form method="POST" action="dashboard.php">
                        <input type='hidden' name='action' value='update' />
                        <input type='hidden' name='id' value='<?= $_POST['id']; ?>' />
                        <div class="form-group">
                            <label for="question">Question?</label>
                            <input type="text" class="form-control" id="question" name="question" value="<?= $question->question; ?>">
                        </div>
                        <label for="question">Answers:</label>
                        <?php for ($i = 1; $i <= 4; $i++) : ?>
                            <?php
                                $answer = "answer$i";
                                $checked = '';
                                if($i == $question->correct){
                                    $checked = 'checked';
                                }
                            ?>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" <?= $checked; ?>  name="correct" value="<?= $i; ?>">
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="<?= $answer; ?>" value="<?= $question->$answer; ?>">
                            </div>
                        <?php endfor; ?>

                        <div class="form-group">
                            <label for="level">Level</label>
                            <select class="form-control" id="level" name="level">
                                <?php
                                $options = ['Easy', 'Medium', 'Hard'];
                                foreach ($options as $key => $option) {
                                    $selected = '';
                                    if ($key == $question->level) {
                                        $selected = 'selected';
                                    }
                                    echo "<option $selected value='$key'>$option</option>";
                                } ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-warning">Update</button>
                    </form>

                    <!-- ====== CREATE QUESTION =======-->
                <?php else : ?>
                    <form method="POST" action="dashboard.php">
                        <input type='hidden' name='action' value='create' />
                        <div class="form-group">
                            <label for="question">Question?</label>
                            <input type="text" class="form-control" id="question" name="question" value="">
                        </div>
                        <label for="question">Answers:</label>
                        <?php for ($i = 1; $i <= 4; $i++) : ?>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="correct" value="<?= $i; ?>">
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="answer<?= $i; ?>" value="">
                            </div>
                        <?php endfor; ?>
                        <div class="form-group">
                            <label for="level">Level</label>
                            <select class="form-control" id="level" name="level">
                                <option value="0">Easy</option>
                                <option value="1">Medium</option>
                                <option value="2">Hard</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                <?php endif; ?>
            </div>

            <!--=========== TABLE ===========-->
            <div class="col-8">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Level</th>
                            <th scope="col" colspan="3">Question</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($questions as $question) : ?>
                            <?php
                            $difficulty = '';
                            switch ($question->level) {
                                case 0:
                                    $difficulty = 'easy';
                                    break;
                                case 1:
                                    $difficulty = 'medium';
                                    break;
                                case 2:
                                    $difficulty = 'hard';
                                    break;
                            }
                            ?>
                            <tr>
                                <td><?= $difficulty ?></td>
                                <td colspan='3'><?= $question->question; ?></td>
                                <td class='bordered text-center' rowspan='2'>
                                    <form method='POST' action="dashboard.php">
                                        <input type='hidden' name='action' value='edit' />
                                        <input type='hidden' name='id' value='<?= $question->id; ?>' />
                                        <button class='btn btn-sm btn-outline-primary'>Edit</button>
                                    </form>
                                    <form method='POST' action="dashboard.php">
                                        <input type='hidden' name='action' value='delete' />
                                        <input type='hidden' name='id' value='<?= $question->id; ?>' />
                                        <button class='btn btn-sm btn-outline-danger'>Delete</button>
                                    </form>
                                </td>
                            </tr>
                            <tr class='bordered'>
                                <?php for ($i = 1; $i <= 4; $i++) : ?>
                                    <?php
                                    if ($question->correct == $i) {
                                        $class = "class='text-success'";
                                    }
                                    $position = "answer$i";
                                    ?>
                                    <td <?= $class ?? '' ?>>Answer <?= $i ?>: <?= $question->$position; ?></td>
                                    <?php $class = ''; ?>
                                <?php endfor; ?>
                            </tr>
                        <?php endforeach; ?>

                        <tr>
                            <td colspan='5'>Total questions: <?= count($questions); ?></td>
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