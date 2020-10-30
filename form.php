<?php include 'includes/head.php'; ?>
<?php include 'includes/functions.php'; ?>

<?php

if (isset($_POST['submit'])) {
    insert();
}
?>

<body class="bg-yellow">
    <?php navigation(); ?>
    <?php slider(); ?>

    <div class="slogan text-center text-mate py-5">
        <h1 class="m-0 font-weight-bold h2 display-4 py-5">Вработи Студенти</h1>
    </div>
    <div class="bg-yellow form-container">
        <div class="container">
            <form action="form.php" method="post">
                <div class="row">
                    <div class="col-lg-6 form-group">
                        <label for="nameSurname" class="text-mate font-weight-bold">Име и презиме</label>
                        <input type="text" name="fullName" required class="form-control font-italic p-4 text-muted" id="nameSurname" placeholder="Вашето име и презиме">
                    </div>
                    <div class="col-lg-6 form-group">
                        <label for="companyName" class="text-mate font-weight-bold">Име на компанија</label>
                        <input type="text" name="companyName" required class="form-control font-italic p-4 text-muted" id="companyName" placeholder="Име на вашата компанија">
                    </div>
                    <div class="col-lg-6 form-group">
                        <label for="companyEmail" class="text-mate font-weight-bold">Контакт имејл</label>
                        <input type="email" name="companyEmail" required class="form-control font-italic p-4 text-muted" id="companyEmail" placeholder="Контакт имејл на вашата компанија">
                    </div>
                    <div class="col-lg-6 form-group">
                        <label for="companyPhone" class="text-mate font-weight-bold">Контакт телефон</label>
                        <input type="number" name="companyPhone" required class="form-control font-italic p-4 text-muted" id="companyPhone" placeholder="Контакт телефон на вашата компанија">
                    </div>

                    <div class="col-lg-6">
                        <input type="hidden" id="emptyInput" name="studentType" value="unspecified">
                        <label for="studentType" class="text-mate font-weight-bold">Тип на студенти</label>
                        <div class="dropdown">
                            <button id="studentType" class="btn bg-white text-mate btn-block text-left d-flex justify-content-between align-items-center px-3 py-2 font-weight-bold" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="dropdown-title">Изберете тип на студент </span>
                                <i class="fas fa-angle-down"></i>
                            </button>
                            <div class="dropdown-menu w-100 mt-2" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item text-mate font-weight-bold" id="marketing">Студенти од маркетинг</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item font-weight-bold" id="programming">Студенти од програмирање</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item font-weight-bold" id="datascience">Студенти од data science</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item font-weight-bold" id="design">Студенти од дизајн</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 d-flex mt-5 mb-4 mb-lg-0 mt-lg-0">
                        <input type="submit" name="submit" value="Испрати" class="btn btn-block btn-red text-white font-weight-bold p-2 align-self-end">
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="text-center text-mate bg-yellow py-5 mb-3">
        <h1 class="m-0 h5 py-5 px-3">На нашата листа моментално имаме <?php readTotal(); ?></a> заинтересирани работодавци</h1>
    </div>

    <?php footer(); ?>
    <script src="js/mobileMenu.js"></script>
    <script src="js/dropdownMenu.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>