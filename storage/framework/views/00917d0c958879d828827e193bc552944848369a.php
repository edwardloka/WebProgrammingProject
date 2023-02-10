<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $__env->make('layout.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title>Movie</title>
</head>
<body class="d-flex flex-column min-vh-100">
    <?php echo $__env->make('layout.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="banner">
        <div class="w-100 bg_img" style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url(<?php echo e(Storage::url('images/movie/background/'.$movie->bg_url)); ?>)">
            <div class="row" id="test" style="height: 45vh">
                <div class="col-4 text-center my-auto">
                    <img class="img-fluid" style="height: 40vh" src="<?php echo e(Storage::url('images/movie/thumbnail/'.$movie->image_url)); ?>" alt="none">
                </div>
                <div class="col-8">
                    <div class="d-flex">
                        <h2 class="mt-3 fw-bold"><?php echo e($movie->title); ?></h2>
                        <?php if(auth()->guard()->check()): ?>
                            <?php if(Auth::user()->role == 'admin'): ?>
                            <div class="mx-5 align-self-center">
                                <a href="/editmovie/<?php echo e($movie->id); ?>"><i class="fa-regular fa-pen-to-square fs-4 mx-2"></i></a>
                                <a href="/deletemovie/<?php echo e($movie->id); ?>"><i class="fa-solid fa-trash fs-4 mx-2"></i></a>
                            </div>

                            <?php endif; ?>
                        <?php endif; ?>
                    </div>

                    <div class="genre my-3">
                        <?php $__currentLoopData = $movie->movieGenres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="" class="btn btn-outline-light me-1"><?php echo e($genre->genre->name); ?></a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <span>Release Year</span>
                    <p class=""><?php echo e(\Illuminate\Support\Str::limit($movie->release_date, 4, $end='')); ?></p>

                    <h4 class="fw-bold">Storyline</h4>
                    <p><?php echo e($movie->description); ?></p>

                    <h4 class="fw-bold"><?php echo e($movie->director); ?></h4>
                    <span>Director</span>
                </div>
            </div>
        </div>


    </div>

    <div class="container my-4">
        <h4>Cast</h4>

        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 my-4">
            <?php $__currentLoopData = $movie->movieActors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $actor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col my-2">
                <div class="card bg-1">
                    <img class="card-img-top" width="200px" height="270px" class="my-2" src="<?php echo e(Storage::url('images/'.$actor->actor->image_url)); ?>" alt="None">
                    <div class="card-body">
                        <div class="card-title my-2">
                            <?php echo e($actor->actor->name); ?>

                        </div>
                        <div class="card-text text-color-2">
                            <?php echo e($actor->character_name); ?>

                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <h4>More</h4>
        <div class="row">
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 my-4">
                <?php $__currentLoopData = $more_movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col my-2">
                        <a href="/movies/<?php echo e($movie->id); ?>">
                            <div class="card bg-1">
                                <img class="card-img-top img-poster img-fluid w-100" class="my-2" src="<?php echo e(Storage::url('images/movie/thumbnail/'.$movie->image_url)); ?>" alt="None">
                                <div class="card-body">
                                    <div class="card-title my-2">
                                        <?php echo e(\Illuminate\Support\Str::limit($movie->title, 18, $end='...')); ?>

                                    </div>
                                    <div class="card-text text-color-2 d-flex justify-content-between">
                                        <?php echo e(\Illuminate\Support\Str::limit($movie->release_date, 4, $end='')); ?>


                                        <?php if(auth()->guard()->check()): ?>
                                            <?php if(Auth::user()->role == 'member'): ?>
                                                <?php if(count(Auth::user()->watchlists) == 0): ?>
                                                    <a href="/addWatchlist/<?php echo e($movie->id); ?>">
                                                        <i class="fa-solid fa-plus"></i>
                                                    </a>
                                                <?php else: ?>
                                                    <?php
                                                    $exist = False
                                                    ?>
                                                    <?php $__currentLoopData = Auth::user()->watchlists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $w): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($movie->id == $w->movie_id): ?>
                                                            <?php echo e($exist = True); ?>

                                                            <?php break; ?>
                                                        <?php else: ?>
                                                            <?php echo e($exist = False); ?>

                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($exist): ?>
                                                        <i class="fa-solid fa-check text-color-1"></i>
                                                    <?php else: ?>
                                                        <a href="/addWatchlist/<?php echo e($movie->id); ?>">
                                                            <i class="fa-solid fa-plus"></i>
                                                        </a>
                                                    <?php endif; ?>

                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

    <?php echo $__env->make('layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html><?php /**PATH D:\BINUS\SEMESTER 5\LAB - Web Programming\PROJECT\source\source\resources\views/movie_detail.blade.php ENDPATH**/ ?>