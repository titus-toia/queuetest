<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <link href="<?php echo e(mix('css/app.css')); ?>" rel="stylesheet"/>

</head>
<body>
<div class="container app row">
    <div class="sidebar col-3">
        <?php echo e(dd($carTypes)); ?>

    </div>
    <div class="content col-9">
        <div class="links float-right">
            <?php if(auth()->guard()->check()): ?>
                Welcome, <?php echo e(auth()->user()->name); ?> |
            <?php endif; ?>
            <?php if(Route::has('login')): ?>
                    <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(url('/')); ?>">Home</a>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>">Login</a>

                        <?php if(Route::has('register')): ?>
                            <a href="<?php echo e(route('register')); ?>">Register</a>
                        <?php endif; ?>
                    <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>


    <script type="text/javascript" src="<?php echo e(mix('js/app.js')); ?>"></script>
</div>
</body>
</html>
<?php /**PATH /www/queuejobs/resources/views/app.blade.php ENDPATH**/ ?>