<?php
include 'includes/connection.php';

function insert(){
    global $connection;
    $studentType = $_POST['studentType'];
    $fullname = $_POST['fullName'];
    $companyName = $_POST['companyName'];
    $companyEmail = $_POST['companyEmail'];
    $companyPhone = $_POST['companyPhone'];

    if ($fullname && $companyName && $companyEmail && $companyPhone) {
        $values = "'$fullname', '$companyName', '$companyEmail', '$companyPhone', '$studentType'";
        $query = "INSERT INTO employers(fullname, company_name, company_email, company_phone, academy) VALUES(";
        $query .= $values . ');';
        $result = mysqli_query($connection, $query);
        if (!$result) {
            mysqli_error($result);
        }
    }
}


function readTotal(){
    global $connection;
    $query = "SELECT COUNT(*) AS total FROM employers";
    $result = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $total = $row['total'];
        echo "<a class='text-dark' href='employers.php'><span class='font-weight-bold h4'>$total</span></a>";
    }
}


function readData(){
    global $connection;
    $query = 'SELECT fullname, company_name, company_email, company_phone, academy FROM employers;';

    $result = mysqli_query($connection, $query);
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $i++;
        echo '<tr>';
        echo "<td>$i</td>";
        foreach ($row as $value) {
            if ((int)$value) {
                echo "<td>+$value</td>";
            } else {
                echo "<td>$value</td>";
            }
        }
        echo '</tr>';
    }
}


function navigation(){
    echo '<div class="main-header">
        <nav class="navbar navbar-expand-sm navbar-light w-100 bg-yellow py-4">
            <a class="navbar-brand ml-lg-5 ml-md-2 pl-3" href="index.php">
                <img src="images/logo_text.png" class="logo" width="55" height="55">
            </a>
            <button class="btn" id="hamburgerBtn">
                <img class="d-sm-none d-block hamburger" src="images/hamburger.png" width="55" height="55">
            </button>
            <div class="collapse navbar-collapse vh-sm-100 pt-3" id="navbarNav">
                <ul class="navbar-nav d-flex ml-auto h6 font-weight-bold text-md-center">
                    <li class="nav-item mr-lg-4 mr-md-1 my-2 my-md-0">
                        <a class="nav-link text-dark text-sm-white" href="https://marketpreneurs.brainster.co" target="_blank">Академија за маркетинг</a>
                    </li>
                    <li class="nav-item mr-lg-4 mr-md-1 my-2 my-md-0">
                        <a class="nav-link text-dark text-sm-white" href="http://codepreneurs.co/" target="_blank">Академија за програмирање</a>
                    </li>
                    <li class="nav-item mr-lg-4 mr-md-1 d-sm-none d-lg-inline-block my-2 my-md-0">
                        <a class="nav-link text-dark text-sm-white" target="_blank" href="https://datascience.brainster.co/?utm_source=brainster.co&utm_medium=academies&utm_campaign=website&utm_content=data_science">Академија за data science</a>
                    </li>
                    <li class="nav-item mr-lg-4 mr-md-1 my-2 my-md-0">
                        <a class="nav-link text-dark text-sm-white" href="https://design.brainster.co" target="_blank">Академија за дизајн</a>
                    </li>
                    <a class="btn custom-btn btn-red btn-width rounded text-white mx-lg-5 mx-md-3 my-3 my-md-0 px-3 font-weight-bold" href="form.php">Вработи наш студент</a>
                </ul>
            </div>
        </nav>
    </div>';
}

function slider(){
    echo '<div class="slide p-4 d-none">
    <button class="btn float-right" id="closeSlider">
        <span class="times text-white display-4 font-weight-bold align-self-end ">&times;</span>
    </button>
    <ul class="navbar-nav d-flex ml-auto h6 font-weight-bold text-md-center mt-5 pt-5">
        <li class="nav-item mr-lg-4 mr-md-1 my-2 my-md-0">
            <a class="nav-link text-dark text-sm-white" href="https://marketpreneurs.brainster.co" target="_blank">Академија за маркетинг</a>
        </li>
        <li class="nav-item mr-lg-4 mr-md-1 my-2 my-md-0">
            <a class="nav-link text-dark text-sm-white" href="http://codepreneurs.co/" target="_blank">Академија за програмирање</a>
        </li>
        <li class="nav-item mr-lg-4 mr-md-1 d-sm-none d-lg-inline-block my-2 my-md-0">
            <a class="nav-link text-dark text-sm-white" target="_blank" href="https://datascience.brainster.co/?utm_source=brainster.co&utm_medium=academies&utm_campaign=website&utm_content=data_science">Академија за data science</a>
        </li>
        <li class="nav-item mr-lg-4 mr-md-1 my-2 my-md-0">
            <a class="nav-link text-dark text-sm-white" href="https://design.brainster.co" target="_blank">Академија за дизајн</a>
        </li>
        <a class="btn btn-red btn-width rounded text-white mx-lg-5 mx-md-3 my-3 my-md-0 px-3 font-weight-bold" href="form.php">Вработи наш студент</a>
    </ul>
</div>';
}

function footer(){
    echo '<footer class="main-footer text-center bg-mate text-white py-2">
        <p class="m-0 ">Изработено со <img class="heart" src="images/heart.png" width="15"> од студентите на <a class="text-white font-weight-bold" target="_blank" href="https://brainster.co/courses?type=all">Brainster</a></p>
    </footer>';
}
