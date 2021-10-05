<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Table - Brand</title>

    <?php
    include("cssLinks.php");
    $page = 6;
    require("Keepmelogin.php");
    ?>
</head>

<body id="page-top">
    <div id="wrapper">
        <?php

        include("sidebar.php");
        ?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <?php

                include("aboveNavbar.php");
                ?>


                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Team</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">Employee Info</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 text-nowrap">
                                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable">
                                        <label>Show&nbsp;<select class="form-control form-control-sm custom-select custom-select-sm">
                                                <option value="10" selected="">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>&nbsp;</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-md-right dataTables_filter" id="dataTable_filter"><label><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div>
                                </div>
                            </div>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>

                                        <tr>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>PHONE</th>
                                            <th>JOINED</th>
                                            <th>ROLE</th>
                                            <th colspan="2">Action</th>
                                        </tr>

                                    </thead>

                                    <?php
                                    if (isset($_GET['search'])) {
                                        $searchValue = $_GET['search'];
                                        $category = $_GET['cat'];
                                        $searchResult = $con->query("SELECT * FROM role r,users us WHERE $category LIKE '%$searchValue%' AND us.role=r.id") or die($con->error);
                                        while ($row = $searchResult->fetch_assoc()) {
                                            echo '
                <tr>
                    <td>' . $row['fName'] . '</td>
                    <td>' . $row['lName'] . '</td>
                    <td>' . $row['email'] . '</td>
                    <td>' . $row['phone'] . '</td>
                    <td>' . $row['joined_at'] . '</td>
                    <td>' . $row['role_name'] . '</td>
                    <td>
                    <a href="./users.php?edit=' . $row['id'] . '"
                    class ="btn btn-info">Edit</a>
                    <a href="./process.php?delete=' . $row['id'] . '"
                    class ="btn btn-danger">Delete</a>
                    </td>
                </tr>
                
                ';
                                        }
                                    } else {
                                        $searchResult = $con->query("SELECT * FROM role r,users us WHERE us.role=r.id") or die($con->error);
                                        while ($row = $searchResult->fetch_assoc()) {
                                            echo '
                <tr>
                    <td>' . $row['fName'] . '</td>
                    <td>' . $row['lName'] . '</td>
                    <td>' . $row['email'] . '</td>
                    <td>' . $row['phone'] . '</td>
                    <td>' . $row['joined_at'] . '</td>
                    <td>' . $row['role_name'] . '</td>
                    <td>
                    <a href="./users.php?edit=' . $row['id'] . '"
                    class ="btn btn-info">Edit</a>
                    <a href="./process.php?delete=' . $row['id'] . '"
                    class ="btn btn-danger">Delete</a>
                    </td>
                </tr>
                
                ';
                                        }
                                    }
                                    ?>

                                    <tfoot>
                                        <tr>
                                            <td><strong>Name</strong></td>
                                            <td><strong>Position</strong></td>
                                            <td><strong>Office</strong></td>
                                            <td><strong>Age</strong></td>
                                            <td><strong>Start date</strong></td>
                                            <td><strong>Salary</strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-6 align-self-center">
                                    <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">
                                        Showing 1 to 10 of 27</p>
                                </div>
                                <div class="col-md-6">
                                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                        <ul class="pagination">
                                            <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <<?php
                include('footer.php');
                ?> </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
        </div>
        <?php

        include('jsLinks.php');
        ?>
</body>

</html>