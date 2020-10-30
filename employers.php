<?php include 'includes/head.php'; ?>
<?php include 'includes/functions.php'; ?>

<body class="bg-yellow">
    <?php navigation(); ?>
    <?php slider(); ?>
    
    <div class="slogan text-center text-mate bg-yellow py-4">
        <h1 class="m-0 font-weight-bold h3 py-5"><i class="fas fa-user-friends"></i> Заинтересирани работодавци:</h1>
    </div>

    <div class="container pb-5 mb-5">
        <div class="table-sm-responsive">
            <table class="table table-striped table-dark mb-5">
                <thead class="bg-danger border-0">
                    <tr>
                        <th scope="col"><i class="fas fa-angle-double-down"></i></th>
                        <th scope="col">Fullname</th>
                        <th scope="col">Company Name</th>
                        <th scope="col">Company Email</th>
                        <th scope="col">Company Phone</th>
                        <th scope="col">Academy</th>
                    </tr>
                </thead>
                <tbody>
                    <?php readData(); ?>
                </tbody>
            </table>
        </div>

    </div>



    <?php footer(); ?>
    <script src="js/mobileMenu.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>