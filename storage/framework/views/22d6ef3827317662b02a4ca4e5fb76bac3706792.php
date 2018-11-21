<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

</head>
<body>
    <p>Your name: <?php echo e(session('name')); ?></p>
    <p>Your email: <?php echo e(session('email')); ?></p>
    <p>Your message: <?php echo e(session('message')); ?></p>

</body>
</html>
