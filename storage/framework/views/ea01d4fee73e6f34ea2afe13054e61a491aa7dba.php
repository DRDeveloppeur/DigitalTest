<link rel="stylesheet" href="<?php echo e(asset('css/homePage.css')); ?>">

<?php $__env->startSection('content'); ?>
<?php if(session('status')): ?>
    <div class="alert alert-success" role="alert">
        <?php echo e(session('status')); ?>

    </div>
<?php endif; ?>
<section class="container section-tours">
    <div class=" text-center  u-margin-bottom-medium">
        <br>  <br>  <h2 class="heading-secondary my-red-text">
            My last comments
        </h2>
        <br>  <br>
    </div>
    <div class="ml-2 row">
        <?php $__currentLoopData = $new_comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-1-of-3 mb-4 mr-5">
                <div class="card">
                    <div class="card__side card__side--front">
                        <div class="card__picture"
                             style="background-image: linear-gradient(to right bottom, rgba(177, 4, 4, 0.85), rgb(255, 91, 12)), url(<?php echo e($comment->poster); ?>);  ">
                        </div>
                        <h4 class="my-red-text">
                            <span class="card__heading-span card__heading-span--1"><?php echo e($comment->movie_title); ?></span>
                        </h4>
                    </div>
                    <div class="card__side card__side--back card__side--back-1">
                        <div class="card__cta">
                            <div class="card__price-box">
                                <p class="my-white-text"><?php echo e($comment->comment); ?></p>
                                <p class="text-right"><small><?php echo e($comment->created_at->diffForHumans()); ?></small></p>
                            </div>
                            <hr class="mt-5 mb-5" />
                            <div class="row mt-5">
                                <a href="<?php echo e(action('MovieController@index', $comment->movie_id)); ?>" class="text-right mt-5 my-red-text text-decoration-none">View</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</section>

<hr class="mt-5 mb-5">

<section class="container section-tours">
    <div class=" text-center  u-margin-bottom-medium">
        <br>  <br>  <h2 class="heading-secondary my-red-text">
            My last ratings
        </h2>
        <br>  <br>
    </div>
    <div class="ml-2 row">
        <?php $__currentLoopData = $new_ratings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rating): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-1-of-3 mb-4 mr-5">
                <div class="card">
                    <div class="card__side card__side--front">
                        <div class="card__picture"
                             style="background-image: linear-gradient(to right bottom, rgba(177, 4, 4, 0.85), rgb(255, 91, 12)), url(<?php echo e($rating->poster); ?>);">
                        </div>
                        <h4 class="my-red-text">
                            <span class="card__heading-span card__heading-span--1"><?php echo e($rating->movie_title); ?></span>
                        </h4>
                    </div>
                    <div class="card__side card__side--back card__side--back-1">
                        <div class="card__cta">
                            <div class="card__price-box">
                                <p class="my-white-text"><?php echo e($rating->rating); ?>/10</p>
                                <p class="text-right"><small><?php echo e($rating->created_at->diffForHumans()); ?></small></p>
                            </div>
                            <hr class="mt-5 mb-5" />
                            <div class="row mt-5">
                                <a href="<?php echo e(action('MovieController@index', $rating->movie_id)); ?>" class="text-right mt-5 my-red-text text-decoration-none">View</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/DigitalTest/resources/views/home.blade.php ENDPATH**/ ?>