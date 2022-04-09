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

    <title>Register</title>
</head>

<body>
    <div class="container-fluid d-flex align-items-center justify-content-center" style="background-color: orange; min-height: 100vh;">
        <div class="card px-5 py-4 mx-auto" style="border-radius: 20px; width: 400px;">
            <h1 class="mx-auto title">Register</h1>
            <h1 class="mx-auto title">Form</h1>
            <hr>
            <form>
                <!-- input Name -->
                <div class="mb-3 row">
                    <div class="icon-box">
                        <i class="bi bi-person" style="color: white;"></i>
                    </div>
                    <div class="col-10">
                        <input type="text" id="nameRegis" name="nameRegis" placeholder="Name" />
                    </div>
                </div>
                <!-- input E-mail -->
                <div class="mb-3 row">
                    <div class="icon-box">
                        <i class="bi bi-envelope" style="color: white;"></i>
                    </div>
                    <div class="col-10">
                        <input type="email" id="emailRegis" name="emailRegis" placeholder="E-mail" />
                    </div>
                </div>
                <!-- input password -->
                <div class="mb-3 row">
                    <div class="icon-box">
                        <i class="bi bi-file-lock2" style="color: white;"></i>
                    </div>
                    <div class="col-10">
                        <input type="password" id="passwordRegis" name="passwordRegis" placeholder="Password">
                    </div>
                </div>
                <!-- input id number -->
                <div class="mb-3 row">
                    <div class=" icon-box">
                        <i class="bi bi-person-badge" style="color: white;"></i>
                    </div>
                    <div class="col-10">
                        <input type="text" id="idNumberRegis" placeholder="ID Number">
                    </div>
                </div>
                <!-- input phone number -->
                <div class="mb-3 row">
                    <div class=" icon-box">
                        <i class="bi bi-telephone" style="color: white;"></i>
                    </div>
                    <div class="col-10">
                        <input type="text" id="phoneNumberRegis" placeholder="Phone Number">
                    </div>
                </div>
                <!-- input address -->
                <div class="mb-4 row">
                    <div class=" icon-box">
                        <i class="bi bi-geo-alt" style="color: white;"></i>
                    </div>
                    <div class="col-10">
                        <input type="text" id="addressRegis" placeholder="Address">
                    </div>
                </div>

                <button type="submit" class="btn-login-register float-end">Register</button>
            </form>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
