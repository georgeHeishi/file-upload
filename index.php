<?php
include 'helpers/filePathChecker.php';
try {
    $subPath = $_GET['dir'] ?? null;
    $path = '/home/xlapcak/public_html/files/' . $subPath;
    if (!($files = scandir($path))) {
        throw new Exception('Invalid path');
    } else if (substr_count(substractQuery($path), '..') > 0) {
        throw new Exception('Forbidden path');
    } else if (substr_count(substractQuery($path), '.') > 0) {
        throw new Exception('Forbidden path');
    }
} catch (Exception $e) {
    header('Location: /file-upload/ ');
}
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <title>File Uploader</title>
    <meta charset="UTF-8">
    <meta name="author" content="Juraj Lapčák">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/main-style.css">
    <link rel="stylesheet" href="css/table-style.css">
    <script src="js/sortTable.js"></script>
</head>
<body>
<div class="container">
    <div class="row mt-3 mb-3">
        <header class="col-lg">
            <h1 id="main-branding">File Uploader</h1>
        </header>
        <hr>
    </div>
    <div class="row mt-5">
        <main class="col-lg site-content">
            <div class="container-fluid">
                <div class="row justify-content-between mb-3">
                    <div class="table-button">
                        <a class="link-text" href="?dir=<?php echo subtractUpperPath($path) ?>">
                            <i class="material-icons">
                                keyboard_return
                            </i>
                        </a>
                    </div>
                    <div class="table-button">
                        <a class="link-text" href="upload.php">
                            <i class="material-icons">
                                file_upload
                            </i>
                        </a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-dark move-left" id="file-table">
                <thead>
                <tr class="table-head">
                    <th scope="col" id="name-head">
                        <p>File Name &#8593;&#8595;</p>
                    </th>
                    <th scope="col" id="size-head">
                        <p>File Size [B] &#8593;&#8595;</p>
                    </th>
                    <th scope="col" id="date-head">
                        <p>Modification Date &#8593;&#8595;</p>
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php
                $row = 0;
                foreach ($files
                         as $file) {
                    if (!strcmp($file, "..") || !strcmp($file, ".")) {
                        continue;
                    }
                    $fileType = filetype("$path$file");
                    $fileSize = filesize("$path$file");
                    $fileTimestamp = date('Y-m-d', filectime("$path$file"));
                    if (!strcmp($fileType, "dir")) {
                        $fileSize = "";
                        $fileTimestamp = "";
                    }
                    ?>
                    <tr>
                        <td>
                            <?php if (!strcmp($fileType, "dir")) {
                                echo '<a class="link-text"
                                   href="?dir=' . subtractLowerPath($path, $file) . '">' . $file . '</a>';
                            } else {
                                echo '<p>' . $file . '</p>';
                            } ?>
                        </td>
                        <td>
                            <?php
                            echo '<p>' . $fileSize . '</p>';
                            ?>
                        </td>
                        <td>
                            <?php
                            echo '<p>' . $fileTimestamp . '</p>';
                            ?>
                        </td>
                    </tr>
                    <?php $row++;
                } ?>
                </tbody>
            </table>
        </main>
    </div>
</div>
<footer class="site-footer">
    <div class="container">
        <hr>
        <ul>
            <li><p>Juraj Lapčák</p></li>
            <li><p>AIS: 97855</p></li>
            <li><a class="link-text" href="mailto:lapcakjuraj@gmail.com">lapcakjuraj@gmail.com</a></li>
        </ul>
    </div>
</footer>
</body>
</html>