<?php 

    if(isset($_POST['update'])){
        $upd_name = $_POST['upd_name'];
        $upd_job = $_POST['upd_job'];
    }

    $curl = curl_init();
    
    $url = "https://reqres.in/api/users/2";

    ## UPDATE DATA
    $data_array = array(
        "name"=> $upd_name,
        "job"=> $upd_job
    );

    $header = array(
        'Authorization'=> 1234
    );

    $data = http_build_query($data_array); 
    
    curl_setopt($curl, CURLOPT_URL, $url); 
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT'); // For CUSTOMREQUEST PUT
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data); // For POST Data UPDATE
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header); // For Authorization Header

    $output = curl_exec($curl);

    if($e = curl_error($curl)){
        echo $e;
    }else{
       $decoded  = json_decode($output, true);
    }

    curl_close($curl);

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CREATE USER</title>
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="text-center text-primary display-3 py-3">Update User Using CURL</h1>

    <div class="container">
        <div class="row">
            <div class="col-12">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#SL</th>
                        <th>Name</th>
                        <th>Job</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <?= $sl=1;?>
                        </td>
                        <td><?= $decoded['name'];?></td>
                        <td><?= $decoded['job'];?></td>
                        <td>
                            <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#updateModal">Edit</button>
                            <a href="" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                </tbody>
                
            </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Update User Info</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
           <form action="" method="POST">
                <div class="form-group mb-3">
                    <input type="text" class="form-control" id="upd_name" name="upd_name" placeholder="Enter Name">
                </div>
                <div class="form-group mb-3">
                    <input type="text" class="form-control" id="upd_job" name="upd_job" placeholder="Enter Job">
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="update">Update</button>
        </div>
        </form>
        </div>
    </div>
    </div>


    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>