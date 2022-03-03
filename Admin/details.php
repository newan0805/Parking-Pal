<?php include ('../header.php') ?>

    <div class="container mt-2 mb-2">
        <div class="card"></div>
    </div>
    <section class="bg-primary-2 pattern hero-mobile-app"></section>
    <section class="py-4" id="i80vi">
        <div class="container-fluid">
            <p class="lead">List of tickets opened by customers</p>
            <div class="row text-white text-center">
                <div class="col-md-3 mb-2 mb-md-4">
                    <div class="rounded py-2 bg-primary">
                        <h2 class="mb-0">448</h2>
                        <p class="lead mb-0">Total Tickets</p>
                    </div>
                </div>
                <div class="col-md-3 mb-2 mb-md-4">
                    <div class="rounded py-2 bg-danger">
                        <h2 class="mb-0">81</h2>
                        <p class="lead mb-0">Responded</p>
                    </div>
                </div>
                <div class="col-md-3 mb-2 mb-md-4">
                    <div class="rounded py-2 bg-success">
                        <h2 class="mb-0">208</h2>
                        <p class="lead mb-0">Resolved</p>
                    </div>
                </div>
                <div class="col-md-3 mb-4 mb-md-4">
                    <div class="rounded py-2 bg-dark">
                        <h2 class="mb-0" id="iy64y">159</h2>
                        <p class="lead mb-0" id="ihg41">Pending</p>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID #</th>
                            <th scope="col">Opened By</th>
                            <th scope="col">Cust. Email</th>
                            <th scope="col">Subject</th>
                            <th scope="col" class="text-center">Status</th>
                            <th scope="col" class="text-center">Assign to</th>
                            <th scope="col" class="text-center">Date</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>348</td>
                            <td><a href="#">Joel</a></td>
                            <td>joel@gmail.com</td>
                            <td>Lorem Ipsum Lorem Ipsum Lorem Ipsum</td>
                            <td class="text-center"><span class="badge badge-warning">New</span></td>
                            <td class="text-center">Anand Ramakrishna</td>
                            <td class="text-center">18-11-2018</td>
                            <td class="text-center"><span class="sr-only">Close</span><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" id="iry75"
                                        class="ms-2">
                                        <path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"></path>
                                    </svg></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

<?php include ('../footer.php') ?>