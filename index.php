<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>File Store</title>
</head>
<body>
    <h1>File Store</h1>
    <h2>Upload your file</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="myFile">Select a file to upload:</label>
        <input type="file" title=" " name="myFile" id="myFile">
        <input type="submit" value="Upload file" name="submit">
    </form>

    <p id="selectedFile"><br></p>

    <h2>Uploaded files</h2>
    <?php
        $files = glob("uploads/*");

        //sort files by modification time, newest first
        usort($files, function($a,$b){
            return filemtime($b) - filemtime($a); // Descending order
        });

        //scan the files in uploads/ to display them here
        //use glob() to scan all the file names and figure out the file type for each one
        //loop through the files, get the file extensions using pathinfo() and convert them to lowercase
        //decide how to display each file
        //echo html for each element depending on the file type inside a loop

        foreach($files as $file){
            $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));

            if(in_array($ext, ['jpg', 'jpeg', 'png', 'gif'])){
                //display the img
                echo '<img src="' . $file . '" alt="image">';
            }elseif($ext === 'pdf'){
                //display pdf
                //(i) using href (as a link):
                // echo '<a href="' . $path . '" target="_blank">View PDF</a>';

                //(ii) using iframe:
                // echo '<iframe src="' . $path . '" width="600" height="500"></iframe>';

                //(iii) using embed:
                echo '<embed src="' . $file . '" type="application/pdf" width="600" height="350">';
            }
        }
    ?>
    <script src="script.js"></script>
</body>
</html>
