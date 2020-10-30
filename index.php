<?php include 'includes/head.php'; ?>
<?php include 'includes/functions.php'; ?>
<?php include 'includes/cards.php'; ?>


<body class="bg-yellow">
    <?php navigation(); ?>
    <?php slider(); ?>

    <div class="header-background py-5">
        <p class="text-center text-white font-weight-bold py-5 my-5 display-4 letter-spacing">Brainster Labs</p>
    </div>

    <div class="filters">
        <div class="row no-gutters bg-mate text-white font-weight-bold">
            <div class="col-lg-4 p-4 filter" id="marketing">
                <div class="row d-flex align-items-center justify-content-between">
                    <div class="col-10 col-md-8">Проекти на студенти по академијата за маркетинг</div>
                    <div class="col-2 col-md-4 text-right d-none check"><i class="fas fa-check fa-2x"></i></div>
                </div>
            </div>
            <div class="col-lg-4 p-4 filter" id="programming">
                <div class="row d-flex align-items-center justify-content-between">
                    <div class="col-10 col-md-8">Проекти на студенти по академијата за програмирање</div>
                    <div class="col-2 col-md-4 text-right d-none check"><i class="fas fa-check fa-2x bg-red"></i></div>
                </div>
            </div>
            <div class="col-lg-4 p-4 filter" id="design">
                <div class="row d-flex align-items-center justify-content-between">
                    <div class="col-10 col-md-8">Проекти на студенти по академијата за дизајн</div>
                    <div class="col-2 col-md-4 text-right d-none check"><i class="fas fa-check fa-2x"></i></div>
                </div>
            </div>
        </div>
    </div>

    <div class="container pb-5 mb-5">
        <h1 class="text-mate text-left text-md-center py-3 py-md-5 font-weight-bold">Проекти</h1>
        <div class="row">
            <?php card(); ?>
        </div>
    </div>


    <?php footer(); ?>
    <script src="js/filters.js"></script>
    <script src="js/mobileMenu.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>