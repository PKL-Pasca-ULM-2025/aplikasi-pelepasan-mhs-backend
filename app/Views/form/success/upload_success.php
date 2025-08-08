<!DOCTYPE html>
<html lang="en">

<head>
    <title>Upload Form</title>
</head>

<body>

    <h3>Your file was successfully uploaded!</h3>

    <ul>
        <li>name: <?= esc($uploaded_fileinfo->getBasename()) ?></li>
        <li>size: <?= esc($uploaded_fileinfo->getSizeByUnit('kb')) ?> KB</li>
        <li>extension: <?= esc($uploaded_fileinfo->guessExtension()) ?></li>
    </ul>

    <p><?= anchor('upload', 'Upload Another File!') ?></p>
    <div>
        <table style="width: 100%; border: #000 solid 1px;; overflow: scroll; display: flex; height: 60vh;">
            <tr>
                <?php
                foreach ($data[0] as $key => $value):
                    ?>
                    <th style="padding: 10px; align-items: center;">
                        <?= esc($key) ?>
                    </th>

                <?php endforeach; ?>
            </tr>
            <?php
            foreach ($data as $row):
                ?>
                <tr>
                    <?php
                    foreach ($row as $key => $value):
                        ?>
                        <td style="padding: 10px; align-items: center;">
                            <?= esc($value) ?>
                        </td>
                        <?php
                    endforeach; ?>
                </tr>
                <?php
            endforeach; ?>
        </table>
    </div>



</body>

</html>