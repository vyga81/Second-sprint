<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>PHP file browser</title>
</head>

<body>
    <div style="width:100vw; height:100vh; position:fixed; z-index:-5" class="bg-info">
        <div class="container text-white ">
            <table class="table table-success table-hover table-striped ">
                <thead>
                    <tr>
                        <th scope="col">Type</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                    </tr>
                    <?php
                    print('<h2>Directory contents: ' . str_replace('?path=', '', $_SERVER['REQUEST_URI']) . '</h2>');
                    $local_dir = isset($_GET["path"]) ? './' . $_GET["path"] : './';

                    //scandir (string $directory) :array
                    //Returns an array of files and directories from directory .
                    $files = scandir($local_dir);
                    $uri = $_SERVER['REQUEST_URI'];
                    // print_r($files);

                    foreach ($files as $fnd) {
                        if ($fnd != ".." && $fnd != ".") {
                            print('<tr>');
                            print('<td>' . (is_dir($local_dir . $fnd) ? "Directory" : "File") . '</td>');
                            print('<td>' . (is_dir($local_dir . $fnd)
                                ? '<a href="' . (isset($_GET['path'])
                                    ? $_SERVER['REQUEST_URI'] . $fnd . '/'
                                    : $_SERVER['REQUEST_URI'] . '?path=' . $fnd . '/') . '">' . $fnd . '</a>'
                                : $fnd)
                                . '</td>');
                            print('<td></td>');
                            print('</tr>');
                        }
                    }
                    if (isset($_GET['path'])) {

                        $paths = explode('/', $_GET['path']);
                        //print_r($paths);
                        unset($paths[count($paths) - 2]);
                        $lastPath = implode('/', $paths);
                        if (count($paths) > 1) {
                            //print($uri);
                            print('<br>');
                            //print($lastPath);
                            print('<div class="my-2"><a href="?path=' . $lastPath . '"><button class="btn btn-primary">Back</button></a></div>');
                        } else {

                            print('<div class="my-2"><a href="' . $files[0] . '"><button class="btn btn-primary">Back</button></a></div>');
                        }
                    }
                    ?>
                </thead>
                <!-- Create new file with PHP -->
                <div class="row justify-content-center">
                    <form action="" method="POST">
                        <div class="form-group ">
                            <label>Create new file</label>
                            <input type="text" name="file" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="create">Create</button>
                        </div>
                    </form>
                </div>
                <?php
                $createFile = fopen("newFile.txt", "w") or die("File is not created");
                $text = "File is created";
                fwrite($createFile, $text);
                fclose($createFile);

                if (isset($_POST['create'])) {
                    $createFile = fopen("newFile.txt", "w") or die("File is not created");
                }
                ?>
        </div>
    </div>

</body>

</html>