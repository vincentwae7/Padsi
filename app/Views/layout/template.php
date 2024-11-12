<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= $title ?></title>

    <!-- Include Custom Stylesheet -->
    <link href="/css/styles.css" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">

    <style>
        /* Ensure the content takes full width */
        .container-fluid {
            max-width: 100%;
            padding-left: 0;
            padding-right: 0;
        }

        /* Full height layout */ 
         html,
        body {
            height: 100%;
            margin: 10;
        }

        /* Main content takes available space */
        #layoutSidenav {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        /* Adjust footer to stick at the bottom */
        footer {
            margin-top: auto;
        }

        .sb-sidenav-custom {
            background-color: #28a745;
            /* Green background */
        }
    </style>
</head>

<body class="sb-nav-fixed">
    <?= $this->include('layout/topbar') ?>

    <div id="layoutSidenav">
        <?= $this->include('layout/sidebar') ?>

        <!-- Body content that fills remaining space -->
        <div id="layoutSidenav_content">
            <?= $this->renderSection('content') ?>
        </div>

        <!-- Footer -->
        <footer class="py-4 bg-light">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2023</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="/assets/demo/chart-area-demo.js"></script>
    <script src="/assets/demo/chart-bar-demo.js"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

    <!-- Initialize DataTable -->
    <script>
        $(document).ready(function() {
            // Initialize DataTables on the table with ID 'datatablesSimple'
            $('#datatablesSimple').DataTable();
        });
    </script>

</body>

</html>