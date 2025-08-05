<!DOCTYPE html>
<html lang="en">

<head>
    <title>Upload Form</title>
</head>

<body>

    <?php foreach ($errors as $error): ?>
        <li><?= esc($error) ?></li>
    <?php endforeach ?>

    <?= form_open_multipart(site_url('upload')) ?>
    <input type="file" name="input-file" id="input-file" size="20" title="input-file">
    <br><br>
    <button type="submit">Upload</button>
    <?php form_close() ?>

</body>

</html>