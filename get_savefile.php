<?php 

    /**
     * Save CURL output to a file
     */

    $ch = curl_init();

    $url = "https://reqres.in/api/users/2";

    $time = strtotime(date("Y-m-d"));

    $filePath = "$time.txt";

    $fh = fopen($filePath, 'w');

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FILE, $fh); // For File Handle
    
    $resp = curl_exec($ch);

    if($fh){
        fwrite($fh,  $resp);
        echo "Okay File Saved";
    }else{
        echo "We can't write file."
    }

    fclose($fh);

    curl_close($ch);

?>
