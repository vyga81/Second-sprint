<?php 
if(isset($_POST['submit'])) {
    $allowed_ext = array('png','jpg','jpeg','gif');
    if(!empty($_FILES['upload']['name'])) {
print_r($_FILES);
$file_name = $_FILE['upload']['name'];
$file_size = $_FILE['upload']['size'];
$file_tmp = $_FILE['upload']['tmp_name'];
$target_dir = "uploads/${file_name}";

//Get file ext
$file_ext = explode('.', $file_name);
$file_ext = strtolower(end($file_ext));

//Validate file ext
   if(in_array($file_ext, $allowed_ext)) {
            if ($file_size <= 1000000){
                move_uploaded_file($file_tmp, $target_dir);
                $message = '<p style="color: green;">File uploaded</p>';
            } else {
                $message = '<p style="color: red;">File is to large</p>';
                }
    } else {
              $message = '<p style="color: red;">Invalid file type </p>';
           }

    }else {
        $message = '<p style="color: red;">Please choose a file</p>}';
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<?php echo $message ?? null; ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="upload">
        <input type="submit" value="Submit" name="submit">
</body>

</html>