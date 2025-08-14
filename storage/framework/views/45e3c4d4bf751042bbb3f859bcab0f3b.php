<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    
    <title><?php echo $__env->yieldContent('title'); ?> | <?php echo e(config('app.name', 'Laravel')); ?></title>
</head>
<body>
    <header> Your Header </header>
    <?php echo $__env->yieldContent('content'); ?>

    
    <nav> Your Navigation </nav>
    <footer> Your Footer </footer>
    
</body>
</html>
<?php /**PATH C:\Users\Zeinab\Desktop\grading\resources\views/layout/app.blade.php ENDPATH**/ ?>