<?php 

    if(isset($_POST['submit'])){
        $uname = $_POST['uname'];
        $job = $_POST['job'];
    }

    $handle = curl_init();

    $url = "https://reqres.in/api/users";

    ## POST DATA
    $data_array = array(
        "name"=> $uname,
        "job"=> $job
    );

    $data = http_build_query($data_array); // Convert the array into URL encoded format
    
    curl_setopt($handle, CURLOPT_URL, $url); // For URL
    curl_setopt($handle, CURLOPT_POST, true); // For POST Method
    curl_setopt($handle, CURLOPT_POSTFIELDS, $data); // For POST Data Send
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true); // Instead of outputting it directly.

    $output = curl_exec($handle);

    if($e = curl_error($handle)){
        echo $e;
    }else{
       $decoded  = json_decode($output, true);
    }

    curl_close($handle);

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
    <h1 class="text-center text-primary display-3 py-3">Create User Using CURL</h1>

    <div class="container my-3">
        <form class="row g-3" action="" method="POST">
            <div class="col-auto">
                <input type="text" class="form-control" id="uname" name="uname" placeholder="Enter Name">
            </div>
            <div class="col-auto">
                <input type="text" class="form-control" id="job" name="job" placeholder="Enter Job">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3" name="submit">Submit</button>
            </div>
        </form>
    </div>

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
                            <?php 
                                if(isset($_POST['submit'])){ 
                                    echo $decoded['id'];
                                }
                            ?>
                        </td>
                        <td><?= $decoded['name'];?></td>
                        <td><?= $decoded['job'];?></td>
                        <td>
                            <?php 
                            if(isset($_POST['submit'])):?>
                            
                                <a href="" class="btn btn-info btn-sm">Edit</a>
                                <a href="" class="btn btn-danger btn-sm">Delete</a>
                            
                            <?php endif;?>
                        </td>
                    </tr>
                </tbody>
                
            </table>
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>