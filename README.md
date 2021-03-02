# file-upload
File-upload is a Php/Javascript web application for uploading files not bigger than 20MB to apache 2 server created for educational purposes.

Using vanilla php and javascript. Styling by using Bootstrap grid system.

# Installation
In [index.php](index.php) change line 5 ```$path = '/home/xlapcak/public_html/files/' . $subPath;``` path in string to path leading to directory where files should be uploaded.

In [controller/uploadController.php ](controller/uploadController.php ) change line 41: <br>
```$_FILES['fileInput']['tmp_name'], '/home/xlapcak/public_html/files/' . $_POST['fileName'] . '_' . time() . "." . $ext```
string: ```'/home/xlapcak/public_html/files/'``` to path leading to directory where files should be uploaded. 

Add htaccess file to directory folder where files are uploaded so you don't get ```pwned```
