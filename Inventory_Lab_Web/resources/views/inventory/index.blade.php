
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style type="text/css">
        body { background: #fff9e6 !important; } /* Adding !important forces the browser to overwrite the default style applied by Bootstrap */
     </style>
    <title>Inventory</title>
  </head>
  <body class="container">
      <br>
      <br>
    <button type="button" class="btn btn-warning" style="margin-left: 1.6rem">Add Inventory</button>
    <div class="m-4">
        <table class="table">
            <thead class="table-warning">
                <tr>
                    <th>No</th>
                    <th>Item ID</th>
                    <th>Item Image</th>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>112233</td>
                    <td>
                        <img src="https://cdn.britannica.com/77/170477-050-1C747EE3/Laptop-computer.jpg"
alt="computer" width="200px"/>
                    </td>
                    <td>Computer</td>
                    <td>5</td>
                    <td>
                        <button type="button" class="btn btn-warning btn-sm">edit</button>
                        <button type="button" class="btn btn-danger btn-sm">delete</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>112234</td>
                    <td>
                        <img src="https://images.tokopedia.net/img/cache/700/product-1/2019/7/27/2740186/2740186_fac4c372-9d77-4a63-95ef-7e4329192079_380_380"
alt="computer" width="200px"/>
                    </td>
                    <td>CPU</td>
                    <td>6</td>
                    <td>
                        <button type="button" class="btn btn-warning btn-sm">edit</button>
                        <button type="button" class="btn btn-danger btn-sm">delete</button>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>112235</td>
                    <td>
                        <img src="https://images.philips.com/is/image/PhilipsConsumer/241V8_70-IMS-id_ID?$jpglarge$&wid=960"
alt="computer" width="200px"/>
                    </td>
                    <td>Monitor</td>
                    <td>2</td>
                    <td>
                        <button type="button" class="btn btn-warning btn-sm">edit</button>
                        <button type="button" class="btn btn-danger btn-sm">delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <br>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  </body>
</html>
