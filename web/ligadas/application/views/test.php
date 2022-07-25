<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?= site_url("main/test"); ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8">
        <input type="text" name="author" id="">
        <input type="file" name="document" id="">
        <button type="submit">Enviar</button>
    </form>
</body>
</html>