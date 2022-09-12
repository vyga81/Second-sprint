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
    <?php
    session_start();
    // LOGOUT Conditional Statement
    if (isset($_GET['action']) and $_GET['action'] == 'logout') {
        session_destroy();
        session_start();
    }

    // lOGIN Conditional Statement
    $msg = '';
    if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {
        if ($_POST['username'] == 'admin' && $_POST['password'] == 'admin') {
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $_POST['username'];
        } else {
            $msg = 'Wrong username or password';
        }
    }
    ?>
    <!-- LOGIN FORM -->
    <!-- --------------------------- -->
    <?php if (!isset($_SESSION['logged_in'])) { ?>
        <div class="text-center mt-5 w-50  m-auto bg-info">
            <h1 class="mb-4">
                Enter Username and Password</h1>
            <div>
                <form action="" method="POST">
                    <h4><?php echo $msg; ?></h4>
                    <input class="mb-4" type="text" name="username" placeholder="username = admin" required autofocus></br>
                    <input class="mb-4" type="password" name="password" placeholder="password = admin" required></br>
                    <button class="btn btn-lg" style=" color: white; background: #2884bd;" type="submit" name="login" formaction="./">Login</button>
                </form>
            </div>
        </div>
    <?php
        exit;
    }
    ?>

    <?php

    ?>
    <div style="width:100vw; height:100vh; position:fixed; z-index:-5" class="bg-info">
        <div class="container text-white ">
            <table class="table table-success table-hover table-striped ">
                <thead>
                    <tr>
                        <th scope="col">Type</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                    </tr>
                    <div class="d-flex justify-content-between">
                        <?php
                        print('<h2>Directory contents: ' . str_replace('?path=', '', $_SERVER['REQUEST_URI']) . '</h2>');
                        ?>
                        <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) : ?>
                            <a href="?action=logout" class="btn btn-danger">Logout</a>
                        <?php endif; ?>
                    </div>
                    <?php
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
                <!-- Create new file  -->
                <div class="row justify-content-center">
                    <form action="" method="POST">
                        <div class="form-group mb-3">
                            <label>Create new file</label>
                            <input type="text" name="file" class="form-control" value="">
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary" name="create">Create</button>
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-danger" name="delete">Delete</button>
                        </div>
                    </form>
                </div>
                <?php
                $createFile = fopen("PleaseDeleteMe.txt", "w") or die("File is not created");
                $text = "File is created";
                fwrite($createFile, $text);
                fclose($createFile);

                if (isset($_POST['create'])) {
                    $createFile = fopen("PleaseDeleteMe.txt", "w") or die("File is not created");
                }
                if (isset($_POST['delete'])) {
                    unlink('PleaseDeleteMe.txt');
                }

                ?>
                <!-- // Uploading images -->

                <br>
                <br>
                <br>
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="file" name="image" />
                    <input type="submit" />
                </form>

                <?php
                // print('<pre>');
                // print_r($_FILES['image']);
                // print_r($_FILES['image']['name']);
                // print_r($_FILES['image']['size']);
                // print_r($_FILES['image']['tmp_name']);
                // print_r($_FILES['image']['type']);
                // print('</pre>');

                if (isset($_FILES['image'])) {
                    $file_name = $_FILES['image']['name'];
                    $file_size = $_FILES['image']['size'];
                    $file_tmp = $_FILES['image']['tmp_name'];
                    $file_type = $_FILES['image']['type'];
                    move_uploaded_file($file_tmp, "./" . $file_name);
                    echo "Success";
                }
                ?>
                <br>
                <br>
                <?php

                // file download logic
                if (isset($_POST['download'])) {
                    // print('Path to download: ' . './' . $_GET["path"] . $_POST['download']);
                    $file = './' . 'images/' . $_POST['download'];
                    // a&nbsp;b.txt --> a b.txt
                    $fileToDownloadEscaped = str_replace("&nbsp;", " ", htmlentities($file, 0, 'utf-8'));

                    ob_clean();
                    ob_start();
                    header('Content-Description: File Transfer');
                    header('Content-Type: application/pdf'); // mime type → ši forma turėtų veikti daugumai failų, su šiuo mime type. Jei neveiktų reiktų daryti sudėtingesnę logiką
                    header('Content-Disposition: attachment; filename=' . basename($fileToDownloadEscaped));
                    header('Content-Transfer-Encoding: binary');
                    header('Expires: 0');
                    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                    header('Pragma: public');
                    header('Content-Length: ' . filesize($fileToDownloadEscaped)); // kiek baitų browseriui laukti, jei 0 - failas neveiks nors bus sukurtas
                    ob_end_flush();

                    readfile($fileToDownloadEscaped);
                    exit;
                }
                $dir_contents = scandir('./' . 'images/');
                // var_dump($dir_contents);
                foreach ($dir_contents as $content) {
                    if (is_file($content)) {
                        print('<form action="" method="POST">');
                        print('<input type="submit" name="download" value="' . 'Download' .  '"/>');
                        print('</form>');
                    }
                }


                ?>







        </div>
    </div>

</body>

</html>