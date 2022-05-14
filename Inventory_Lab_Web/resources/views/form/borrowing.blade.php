<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/auth.css">

    <style>
        .input-group-text {
            background-color: orange !important;
            color: white !important;
        }
    </style>

    <title>Register</title>
</head>

<body>
    <div class="container-fluid d-flex align-items-center justify-content-center" style="background-color: orange; min-height: 100vh;">
        <div class="container">
            <div class="row">
                <!-- Borrowing Form -->
                <div class="col-xxl-5 d-flex justify-content-between align-items-center">
                    <div class="card px-5 py-4 mx-auto" style="border-radius: 20px; width: 400px;">
                        <h1 class="mx-auto title">Borrowing Form</h1>
                        <hr>
                        <form>
                            <!-- input id number -->
                            <div class="mb-3 row">
                                <div class=" icon-box">
                                    <i class="bi bi-person-badge" style="color: white;"></i>
                                </div>
                                <div class="col-10">
                                    <input type="text" id="idNumberRegis" placeholder="ID Number">
                                </div>
                            </div>
                            <!-- input password -->
                            <div class="mb-3 row">
                                <div class="icon-box">
                                    <i class="bi bi-file-lock2" style="color: white;"></i>
                                </div>
                                <div class="col-10">
                                    <input type="password" id="passwordRegis" placeholder="Password">
                                </div>
                            </div>

                            <button type="submit" class="btn-login-register float-end">Confirm</button>
                        </form>
                    </div>
                </div>

                <!-- Borrowed Items -->
                <div class="col-xxl-7">
                    <div class="card px-5 py-4 mx-auto" style="border-radius: 20px; ">
                        <div class="d-flex justify-content-between align-items-center">
                            <h1 class="title">Borrowing Items</h1>
                            <button type="submit" class="btn-login-register float-end">Add Items <i class="bi bi-plus"></i></button>

                        </div>

                        <div class="card overflow-auto px-3 py-2 mx-2 mt-3 shadow bg-body" style="border-radius: 20px; height: 300px;">

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Items List</li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    A list item
                                    <button type="submit" class="btn btn-danger"><i class="bi bi-x-lg"></i></button>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    A second list item lalalalala
                                    <button type="submit" class="btn btn-danger"><i class="bi bi-x-lg"></i></button>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    A third list item
                                    <button type="submit" class="btn btn-danger"><i class="bi bi-x-lg"></i></button>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    A third list item
                                    <button type="submit" class="btn btn-danger"><i class="bi bi-x-lg"></i></button>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    A third list item
                                    <button type="submit" class="btn btn-danger"><i class="bi bi-x-lg"></i></button>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    A third list item
                                    <button type="submit" class="btn btn-danger"><i class="bi bi-x-lg"></i></button>
                                </li>
                            </ul>
                        </div>

                        <div class="row mt-3">
                            <form action="" class="row d-flex justify-content-between align-items-center">
                                <div class="col-4"></div>
                                <div class="col-4">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-calendar-day"></i></span>
                                        <input type="date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <button type="submit" class="btn-login-register float-start">Submit</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>