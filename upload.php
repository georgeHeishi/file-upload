<!DOCTYPE html>
<html lang="sk">
<head>
    <title>File Uploader</title>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main-style.css">
    <script src="js/uploadScript.js"></script>
</head>
<body>
<div class="container">
    <header class="row site-header mt-3 mb-3">
        <div class="col-lg">
            <h1 id="main-branding">File Uploader</h1>
        </div>
        <hr>
    </header>
    <main class="row site-content mt-5">
        <div class="col-lg">
            <div class="container">
                <div class="row">
                    <div class="col-lg">
                        <a class="link-text" href="index.php">
                            Back to table
                            <a>
                    </div>
                    <div class="row">
                        <div class="col-lg">
                            <form id="file-uploader" method="post" enctype="multipart/form-data">
                                <div class="mt-3 mb-3">
                                    <label for="file-name">Filename</label>
                                    <input type="text" name="fileName" id="file-name" placeholder="File name">
                                </div>
                                <div class="mt-3 mb-3">
                                    <label for="file-input">File</label>
                                    <input type="file" name="fileInput" id="file-input">
                                </div>
                                <div class="mt-3 mb-3">
                                    <button type="button" id="submit" class="btn btn-outline-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<footer class="site-footer">
    <div class="container">
        <hr>
        <ul>
            <li><a>Juraj Lapčák</a></li>
            <li><p>AIS: 97855</p></li>
            <li><a class="link-text" href="mailto:lapcakjuraj@gmail.com">lapcakjuraj@gmail.com</a></li>
        </ul>
    </div>
</footer>
</body>
</html>