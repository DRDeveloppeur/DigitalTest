<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie ie6 no-js" lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>"> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>"><!--<![endif]-->
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo e(config('app.name')); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Fullscreen Background Image Slideshow with CSS3 - A Css-only fullscreen background image slideshow" />
    <meta name="keywords" content="css3, css-only, fullscreen, background, slideshow, images, content" />
    <meta name="author" content="Codrops" />
    <link rel="shortcut icon" href="../favicon.ico">
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/demo.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/style4.css')); ?>" rel="stylesheet">
    <script type="text/javascript" src="<?php echo e(asset('js/modernizr.custom.86080.js')); ?>"></script>
</head>
<body id="page">
<ul class="cb-slideshow">
    <li><span>Image 01</span><div><h3>Supernatural</h3></div></li>
    <li><span>Image 02</span><div><h3>The 100</h3></div></li>
    <li><span>Image 03</span><div><h3>Lucifer</h3></div></li>
    <li><span>Image 04</span><div><h3>Les gardians de la galaxie</h3></div></li>
    <li><span>Image 05</span><div><h3>John Wick</h3></div></li>
    <li><span>Image 06</span><div><h3>Undisputed 3</h3></div></li>
</ul>
<div class="container">
    <!-- Codrops top bar -->
    <?php if(Route::has('login')): ?>
        <div class="top-right links">
            <?php if(auth()->guard()->check()): ?>
                <a href="<?php echo e(url('/home')); ?>" class="btn btn-primary mt-2">Home</a>
            <?php else: ?>
                <a href="<?php echo e(route('login')); ?>" class="btn btn-primary mt-2">Login</a>

                <?php if(Route::has('register')): ?>
                    <a href="<?php echo e(route('register')); ?>" class="btn btn-primary mt-2"> Register</a>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <div class="clr"></div>
    <!--/ Codrops top bar -->
    <header>
        <div class="title m-b-md mt-5">
            <div class="mb-5" style="text-align: center!important;">
                <h2 class="mb-5">App'N Digital</h2>
            </div>
            <form class="form-inline my-2 my-lg-0 justify-content-center m-5" action="<?php echo e(route("search")); ?>" method="post">
                <?php echo csrf_field(); ?>
                <input class="form-control mr-sm-2" type="text" name="title" placeholder="Search..." style="background: rgba(255, 255, 255, .7)!important;" required>
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </header>
</div>
</body>
</html>
<?php /**PATH /var/www/html/DigitalTest/resources/views/welcome.blade.php ENDPATH**/ ?>