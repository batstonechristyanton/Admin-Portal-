<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title></title>

    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="public/Css/main.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
    </script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
    </script>
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
        integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
    <!-- Chart.Js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2/dist/Chart.min.js"></script>

</head>

<body>
    <input type="hidden" style="display:none;" name="data" value='<?= json_encode($data) ?>'>
    <div class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>The Raw Office Project </h3>
            </div>

            <ul class="list-unstyled components">
                <p>Admin Panel </p>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>

                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">Pages</a>

                </li>
                <li>
                    <a href="#">Layouts</a>
                </li>
                <li>
                    <a href="#">UI Elements </a>
                </li>
            </ul>

        </nav>

        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Toggle Sidebar</span>
                    </button>

                    <button type="button" id="asc" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>ASC</span>
                    </button>

                    <button type="button" id="desc" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>DESC</span>
                    </button>
                </div>
            </nav>

            <p></p>

            <div class="card text-center text-white bg-dark">
                <div class="card-header">
                    Total sales
                </div>
                <div class="card-body">
                    <canvas id="line-chart" width="800" height="450"></canvas>
                    <!-- <div class="ct-chart ct-perferct-fourth" id="chart1"></div> -->
                    <!-- <div class="ct-chart ct-golden-section" id="chart2"></div> -->

                </div>

            </div>

            <div class="card-deck">
                <div class="h-25 m-4 card bg-light ">

                    <div class="card-body ">
                        <h5 class="card-title">Total Sales </h5>
                        <p class="card-text"><small
                                class="text-muted">$<?= $total['total'] ?? 'There is no sales' ?></small></p>
                    </div>
                </div>
                <div class="h-25 m-4 card bg-light ">
                    <div class="card-body">
                        <h5 class="card-title">Total Tax </h5>
                        <p class="card-text">$<?= $totalTax['TotalTax'] ?? 'There is no sales' ?></p>
                    </div>
                </div>
                <div class="h-25 m-4 card bg-light ">
                    <div class="card-body">
                        <h5 class="card-title">Top Sales Location </h5>
                        <p class="card-text">$<?= $topSales['TopSales'] ?? 'There is no sales' ?></p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
    <script src="public/Js/index.js" type="text/javascript">
    </script>
</body>

</html>