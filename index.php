<?php
$path = '../files/';
$files = scandir($path);
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <title>File Uploader</title>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main-style.css">
    <link rel="stylesheet" href="css/panels.css">
    <link rel="stylesheet" href="css/index-style.css">
    <link rel="stylesheet" href="css/table-layout.css">
</head>
<body>
<div class="page">
    <header class="site-header">
        <div class="branding-panel center-panel">
            <h1 id="main-branding">File Uploader</h1>
        </div>
    </header>
    <main class="site-content">
        <div class="center-panel">
            <div class="panel-row">
                <p class="back">
                    Back
                <p>
            </div>
            <div class="panel-row">
                <table class="file-table">
                    <tr class="table-head">
                        <th>
                            <p>File Same &#8593;&#8595;</p>
                        </th>
                        <th>
                            <p>File Size [B] &#8593;&#8595;</p>
                        </th>
                        <th>
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
    </main>
    <footer class="site-footer">
        Toto je koniec stranky.
    </footer>
</div>
</body>
</html>