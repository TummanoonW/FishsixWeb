<?php
    //Proto Framework for PHP-HTML5
    //v3
    //Developed by Tummanoon Wacha-em

    $dir = "./";
    include_once $dir . 'includer/includer.php'; //include Includer file to operate
    Includer::include_proto($dir); //include Proto Framework Architecture
    Includer::include_view($dir, 'view_profile.php');

    $apiKey = SESSION::getAPIKey(); //get secret API Key

    $api = new API($apiKey); //open API connection
    $io = new IO(); //open Input/Output receiver for certain $_GET and $_POST data 

    switch($io->method){
        case 'upload':
            if(isset($io->post->submit)){
                $file = new File($dir, 'uploads/');
                $option = new FileOption();
                $option->set(
                    FALSE,
                    TRUE,
                    TRUE,
                    NULL,
                    2 * 100 * 1000,
                    ['jpg', 'jpeg', 'png', 'gif']
                );

                $result = $file->upload('fileToUpload', $option);
                print_r($_FILES);
            }
            break;
        default:
            break;
    }
?>

<!DOCTYPE html>
<html>
<body>

<form action="test.php?m=upload" id="fff" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="text" name="inputText" value="Deutschland Deutschland Über Alles">
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

<script>
        var f = document.querySelector('#fff');
        var d = new FormData(f);

        console.log(d);
    </script>
</body>
</html>
    