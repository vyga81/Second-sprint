<!DOCTYPE html>
<html>

<head>
    <title>File System Browser</title>
</head>
<style>
    * {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    table td,
    table th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    table tr:hover {
        background-color: #ddd;
    }

    table th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }
</style>

<body>
    
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="upload">
        <input type="submit" value="Submit" name="submit">
        <?php
        $file = './Extras/users.txt';

        if (file_exists($file)) {
            // echo readfile($file);
            $handle = fopen($file, 'r');
            $contents = fread($handle, filesize($file));
            fclose($handle);
            // echo $contents  ;
        } else {
            $handle = fopen($file, 'w');
            $contents = 'Math' . PHP_EOL . 'Physics' . PHP_EOL . 'Astronomy';
            fwrite($handle, $contents);
            fclose($handle);
        }







        $path = isset($_GET["path"]) ? './' . $_GET["path"] : './';
        $files_and_dirs = scandir($path);

        print('<h2>Directory contents: ' . str_replace('?path=', '', $_SERVER['REQUEST_URI']) . '</h2>');

        // List all files and directories
        print('<table><th>Type</th><th>Name</th><th>Actions</th>');
        foreach ($files_and_dirs as $fnd) {
            if ($fnd != ".." && $fnd != ".") {
                print('<tr>');
                print('<td>' . (is_dir($path . $fnd) ? "Directory" : "File") . '</td>');
                print('<td>' . (is_dir($path . $fnd)
                    ? '<a href="' . (isset($_GET['path'])
                        ? $_SERVER['REQUEST_URI'] . $fnd . '/'
                        : $_SERVER['REQUEST_URI'] . '?path=' . $fnd . '/') . '">' . $fnd . '</a>'
                    : $fnd)
                    . '</td>');
                print('<td><button>Download</button></td>');
                print('</tr>');
            }
        }
        print("</table>");



        ?>

</body>

</html>