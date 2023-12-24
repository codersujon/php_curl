<?php 

    if(isset($_POST['search'])){
        $pageNo = $_POST['pageNo'];
    }

    $ch = curl_init();

    $baseURL = "https://reqres.in/api/users?";
    $url = $baseURL."page=". $pageNo;

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Instead of outputting it directly.
    
    $resp = curl_exec($ch);

    if($error = curl_error($ch)){
        echo $error;
    }else{
        # Decode JSON Response Data 
        $decoded = json_decode($resp, true);

        // echo "<pre>";
        // print_r($decoded);
    }

    curl_close($ch);

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GET USER_LIST</title>
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="text-center text-primary display-3 py-3">Get User-List Using CURL</h1>

    <div class="container my-3">
        <form class="row g-3" action="" method="POST">
            <div class="col-auto">
                <input type="number" class="form-control" id="pageNo" name="pageNo" placeholder="Enter Page No">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3" name="search">Search</button>
            </div>
        </form>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
            <table class="table table_striped">
                <thead>
                    <tr>
                        <th>#SL</th>
                        <th>Email</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php 
                        foreach($decoded['data'] as $data):?>
                            <tr>
                                <td><?= $data['id'];?></td>
                                <td><?= $data['email'];?></td>
                                <td><?= $data['first_name'];?></td>
                                <td><?= $data['last_name'];?></td>
                                <td>
                                    <img src="<?= $data['avatar'] ?>" alt="" width="80px" height="100px">
                                </td>
                                <td>
                                    <a href="" class="btn btn-info btn-sm">Edit</a>
                                    <a href="" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach;?>
                </tbody>
                
            </table>
            </div>
        </div>
    </div>


    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>