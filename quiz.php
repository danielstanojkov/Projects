<?php
include_once 'includes/header.php';

use Millionaire\Redirect;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $results = $_POST;

    $millionaire = true;
    for ($i = 1; $i <= count($results) / 2; $i++) {
        $question = "question$i";
        $answer = "answer$i";
        if ($results[$question] !== $results[$answer]) {
            $millionaire = false;
            break;
        }
    }

    if ($millionaire) {
        Redirect::To('extra/millionaire.php');
    }
    Redirect::To('extra/tryAgain.php');
}

// Fetching questions from all types
$allQuestions = [];
for ($i = 0; $i < 3; $i++) {
    $questions = Millionaire\DB::selectQuestionsByLevel($i);
    foreach ($questions as $question) {
        array_push($allQuestions, $question);
    }
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
                    <a class="nav-link" href="quiz.php">Start over</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Admin panel</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-8 offset-2">
                <div class="alert alert-info mt-4">Shhhh &#129323;, only here and nowhere else - all correct answers are 'Answer 1' ;)</div>
                <form method="POST">
                    <?php foreach ($allQuestions as $key => $question) : ?>
                        <?php
                        $questionNo = $key + 1;
                        $answerNo = $key + 1;

                        $options = ['Easy', 'Medium', 'Hard'];
                        foreach ($options as $qlevel => $option) {
                            if ($question->level == $qlevel) {
                                $level = $option;
                                break;
                            }
                        }
                        ?>
                        <div class="row mt-4">
                            <div class="col-12">
                                <?= $key + 1; ?>. <b><?= $level; ?> Question <?= $question->id; ?></b>
                            </div>
                        </div>
                        <div class="row">
                            <?php for ($i = 1; $i <= 4; $i++) : ?>
                                <?php
                                $answer = "answer$i";
                                ?>
                                <div class="col-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="hidden" name="<?= "question$questionNo" ?>" value="<?= $question->correct; ?>" />
                                                <input required type="radio" name="<?= "answer$answerNo" ?>" value="<?= $i; ?>">
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" value="<?= $answer; ?>" readonly>
                                    </div>
                                </div>
                            <?php endfor; ?>
                        </div>
                    <?php endforeach; ?>

                    <div class="row mt-4 mb-4">
                        <div class="col-12">
                            <button class="btn btn-primary btn-block">Check if I am a millionaire</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>