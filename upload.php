<!DOCTYPE html>
<html lang="sk">
<head>
    <title>File Uploader</title>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main-style.css">
    <link rel="stylesheet" href="css/panels.css">
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
            <form id="file-uploader" method="post" action="uploader.php" enctype="multipart/form-data">
                <label for="filename">Filename</label>
                <input name="filename" type="text" id="filename" placeholder="File name">
                <label for="filename">File</label>
                <input name="fileinput" type="file" id="fileinput">
                <input type="submit" id="submit">
            </form>
        </div>
    </main>
    <footer class="site-footer">
        Toto je koniec stranky.
    </footer>
</div>
</body>
</html>