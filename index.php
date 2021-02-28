<?php
$path = '../files/';
$files = scandir($path);
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <title>File Uploader</title>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main-style.css">
    <link rel="stylesheet" href="css/table-layout.css">
    <script src="js/sortTable.js"></script>
</head>
<body>
<div class="container">
    <header class="row site-header">
        <div class="col-lg">
            <h1 id="main-branding">File Uploader</h1>
        </div>
    </header>
    <main class="row site-content">
        <div class="col-lg">
            <div class="container">
                <div class="row mb-4">
                    <div class="col-lg">
                        <a class="link-text">
                            Back
                        <a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg">
                        <table class="file-table">
                            <tr class="table-head">
                                <th id="name-head">
                                    <p>File Name &#8593;&#8595;</p>
                                </th>
                                <th id="size-head">
                                    <p>File Size [B] &#8593;&#8595;</p>
                                </th>
                                <th id="date-head">
                                    <p>Modification Date &#8593;&#8595;</p>
                                </th>
                            </tr>
                            <?php
                            $row = 0;
                            foreach ($files
                                     as $file) {
                                if (!strcmp($file, "..") || !strcmp($file, ".")) {
                                    continue;
                                }
                                $fileType = filetype("$path$file");
                                $fileSize = filesize("$path$file");
                                $fileTimestamp = date('d-m-Y', filectime("$path$file"));
                                if (!strcmp($fileType, "dir")) {
                                    $fileSize = "";
                                    $fileTimestamp = "";
                                }
                                ?>
                                <tr class="table-row<?php echo $row; ?>">
                                    <td class="cell-<?php echo $fileType; ?>">
                                        <p>
                                            <?php
                                            echo $file;
                                            ?>
                                        </p>
                                    </td>
                                    <td>
                                        <p>
                                            <?php
                                            echo $fileSize;
                                            ?>
                                        </p>
                                    </td>
                                    <td>
                                        <p>
                                            <?php
                                            echo $fileTimestamp;
                                            ?>
                                        </p>
                                    </td>
                                </tr>
                                <?php
                                $row++;
                            }
                            ?>
                        </table>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg">
                        <a class="link-text" href="upload.php">
                            Upload
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="row site-footer">
        <div class="col-lg">
            <p>
                Toto je koniec stranky.
            </p>
        </div>
    </footer>
</div>
</body>
</html>