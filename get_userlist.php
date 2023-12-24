<?php 

    $ch = curl_init();

    $url = "https://reqres.in/api/users?page=2";
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    $resp = curl_exec($ch);

    if($error = curl_error($ch)){
        echo $error;
    }else{
        # Decode JSON Data Response
        $data = json_decode($resp, true);

        echo "<pre>";
        print_r($data);
    }


    curl_close($ch);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>