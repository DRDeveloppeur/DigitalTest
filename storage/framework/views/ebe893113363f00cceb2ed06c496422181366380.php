<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center m-0 p-0">
        <?php if($results['Response']): ?>

            <?php $__currentLoopData = $results['Search']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card card-h bg-dark text-white col-2 p-0 m-1" type="button">
                    <a href="<?php echo e(action('MovieController@index', ["id" => $movie['imdbID']])); ?>">
                        <img src="<?php echo e($movie['Poster'] ? $movie['Poster'] : asset('../images/not_found.jpg')); ?>" class="card-img" alt="Cover">
                        <div class="card-img-overlay my-white-text">
                            <h4 class="card-title font-weight-bold"><?php echo e($movie['Title']); ?></h4>
                            <p class="card-text"><?php echo e($movie['Year']); ?> | <?php echo e($movie['Type']); ?></p>
                        </div>
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            
            <?php if(!empty($paginate)): ?>
                <div class="col-12"></div>
                <div class="mt-4">
                    <ul class="pagination pagination-md">
                        <li class="mr-2 page-item <?php echo e(($paginate['curent_page'] == 1) ? "disabled" : ""); ?>">
                            <a class="page-link" href="<?php echo e(action('SearchController@index', ["name" => $paginate['title'], "page" => 1])); ?>">&laquo;</a>
                        </li>
                        <?php if(!empty($paginate['curent_page']) && $paginate['curent_page'] > 1): ?>
                            <li class="page-item">
                                <a class="page-link" href="<?php echo e(action('SearchController@index', ["name" => $paginate['title'], "page" => ($paginate['curent_page']-1)])); ?>">
                                    <?php echo e($paginate['curent_page'] - 1); ?>

                                </a>
                            </li>
                        <?php endif; ?>
                        <li class="page-item active">
                            <a class="page-link"><?php echo e($paginate['curent_page']); ?></a>
                        </li>
                        <?php if(!empty($paginate['curent_page']) && $paginate['curent_page'] < $paginate['total_pages']): ?>
                            <li class="page-item">
                                <a class="page-link" href="<?php echo e(action('SearchController@index', ["name" => $paginate['title'], "page" => ($paginate['curent_page']+1)])); ?>">
                                    <?php echo e($paginate['curent_page'] + 1); ?>

                                </a>
                            </li>
                        <?php endif; ?>
                        <li class="ml-2 page-item  <?php echo e(($paginate['curent_page'] == $paginate['total_pages']) ? "disabled" : ""); ?>">
                            <a class="page-link" href="<?php echo e(action('SearchController@index', ["name" => $paginate['title'], "page" => $paginate['total_pages']])); ?>">&raquo;</a>
                        </li>
                    </ul>
                </div>
                <?php endif; ?>
            

        <?php else: ?>
            <h6 class="mb-0 mt-5" style="color: #919aa1!important;">Aucun  resultat trouver pour "<?php echo e($title); ?>"</h6>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/DigitalTest/resources/views/movies/movies.blade.php ENDPATH**/ ?>