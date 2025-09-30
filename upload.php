<?php
    // check if a file has been uploaded
    // get the temp file path
    // build a permanent path in uploads/
    // use a func to move the file to uploads/ : move_uploaede_file()
    // if successful, display the file

    //file name
    $filename = $_FILES['myFile']['name'];
    
    //file path
    $path = "uploads/" . $filename;
    
    //detect file type:
    //check the extension
    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    //move file from temp to uploads/ with: 
    //move_uploaded_file($_FILES['myFile']['tmp_name'], "uploads/" . $_FILES['myFile']['name']);
    //check the result and display success or error message
    if(move_uploaded_file($_FILES['myFile']['tmp_name'], "uploads/" . $_FILES['myFile']['name'])){
        //success
        echo "Your file: \"<i>" . $filename . "</i>\" <br>";
    }else{
        //error
        echo "error <br>";
    }

    //check
    if(in_array($ext, ['jpg', 'jpeg', 'png', 'gif'])){
        //display the img
        echo '<img src="' . $path . '" alt="image">';
    }elseif($ext === 'pdf'){
        //display pdf
        //(i) using href (as a link):
        // echo '<a href="' . $path . '" target="_blank">View PDF</a>';

        //(ii) using iframe:
        // echo '<iframe src="' . $path . '" width="600" height="500"></iframe>';

        //(iii) using embed:
        echo '<embed src="' . $path . '" type="application/pdf" width="600" height="500">';
    }

    //back button
    echo '<br><br><button onclick="history.back()">Go Back</button>';
?>
