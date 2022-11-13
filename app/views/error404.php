<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Error 404</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        img {
            max-height: 70vh;
        }
    </style>
</head>

<body>
    <div class="d-flex align-items-center justify-content-center ">
        <div class="text-center row">
            <div class=" ">
                <img src="<?= IMAGES_PATH . '/error-404.png' ?>" alt="Error 404" class="img-fluid">
                <p class="fs-3"> <span class="text-danger">Upps!</span> Página no encontrada.</p>
                <a href="/" class="btn btn-primary">Volver al inicio</a>
            </div>

        </div>
    </div>
</body>

</html>