<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $__env->make('layout.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title>Home</title>
</head>
<body class="d-flex flex-column min-vh-100">
    <?php echo $__env->make('layout.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if($showcased != null): ?>
    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <a class="banner text-decoration-none text-white" href="/movies/<?php echo e($showcased[0]->id); ?>">
                    <div class="w-100 bg_img" style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url(<?php echo e(Storage::url('images/movie/background/'.$showcased[0]->bg_url)); ?>)">
                        <div class="wrapper">
                            <span class="mb-2"><?php echo e($showcased[0]->movieGenres[0]->genre->name); ?> | <?php echo e(\Illuminate\Support\Str::limit($showcased[0]->release_date, 4, $end='')); ?></span>

                            <div class="">
                                <h3 class="fw-bold"><?php echo e($showcased[0]->title); ?></h3>
                            </div>
                            <p><?php echo e($showcased[0]->description); ?></p>
                            <?php if(auth()->guard()->check()): ?>
                                <?php if(Auth::user()->role == 'member'): ?>
                                    <?php if(count(Auth::user()->watchlists) == 0): ?>
                                    <a class="btn btn-danger my-2" href="/addWatchlist/<?php echo e($showcased[0]->id); ?>">
                                            <i class="fa-solid fa-plus"></i> Add to Watchlist
                                        </a>
                                    <?php else: ?>
                                        <?php
                                        $exist = False
                                        ?>
                                        <?php $__currentLoopData = Auth::user()->watchlists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $w): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($showcased[0]->id == $w->movie_id): ?>
                                                <?php
                                                $exist = True
                                                ?>
                                                <?php break; ?>
                                            <?php else: ?>
                                                <?php
                                                $exist = False
                                                ?>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($exist): ?>
                                            <i class="fa-solid fa-check text-color-1"></i> Already in Watchlist
                                        <?php else: ?>
                                            <a class="btn btn-danger my-2" href="/addWatchlist/<?php echo e($showcased[0]->id); ?>">
                                                <i class="fa-solid fa-plus"></i> Add to Watchlist
                                            </a>
                                        <?php endif; ?>

                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>

                    </div>
                </a>
            </div>
            <div class="carousel-item">
                <a class="banner text-decoration-none text-white" href="/movies/<?php echo e($showcased[1]->id); ?>">
                    <div class="w-100 bg_img" style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url(<?php echo e(Storage::url('images/movie/background/'.$showcased[1]->bg_url)); ?>)">
                        <div class="wrapper">
                            <span class="mb-2"><?php echo e($showcased[1]->movieGenres[0]->genre->name); ?> | <?php echo e(\Illuminate\Support\Str::limit($showcased[1]->release_date, 4, $end='')); ?></span>

                            <div class="">
                                <h3 class="fw-bold"><?php echo e($showcased[1]->title); ?></h3>
                            </div>
                            <p><?php echo e($showcased[1]->description); ?></p>
                            <?php if(auth()->guard()->check()): ?>
                                <?php if(Auth::user()->role == 'member'): ?>
                                    <?php if(count(Auth::user()->watchlists) == 0): ?>
                                    <a class="btn btn-danger my-2" href="/addWatchlist/<?php echo e($showcased[1]->id); ?>">
                                            <i class="fa-solid fa-plus"></i> Add to Watchlist
                                        </a>
                                    <?php else: ?>
                                        <?php
                                        $exist = False
                                        ?>
                                        <?php $__currentLoopData = Auth::user()->watchlists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $w): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($showcased[1]->id == $w->movie_id): ?>
                                                <?php
                                                $exist = True
                                                ?>
                                                <?php break; ?>
                                            <?php else: ?>
                                                <?php
                                                $exist = False
                                                ?>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($exist): ?>
                                            <i class="fa-solid fa-check text-color-1"></i> Already in Watchlist
                                        <?php else: ?>
                                            <a class="btn btn-danger my-2" href="/addWatchlist/<?php echo e($showcased[1]->id); ?>">
                                                <i class="fa-solid fa-plus"></i> Add to Watchlist
                                            </a>
                                        <?php endif; ?>

                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>

                    </div>
                </a>
            </div>
            <div class="carousel-item">
                <a class="banner text-decoration-none text-white" href="/movies/<?php echo e($showcased[2]->id); ?>">
                    <div class="w-100 bg_img" style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url(<?php echo e(Storage::url('images/movie/background/'.$showcased[2]->bg_url)); ?>)">
                        <div class="wrapper">
                            <span class="mb-2"><?php echo e($showcased[2]->movieGenres[0]->genre->name); ?> | <?php echo e(\Illuminate\Support\Str::limit($showcased[2]->release_date, 4, $end='')); ?></span>

                            <div class="">
                                <h3 class="fw-bold"><?php echo e($showcased[2]->title); ?></h3>
                            </div>
                            <p><?php echo e($showcased[2]->description); ?></p>
                            <?php if(auth()->guard()->check()): ?>
                                <?php if(Auth::user()->role == 'member'): ?>
                                    <?php if(count(Auth::user()->watchlists) == 0): ?>
                                    <a class="btn btn-danger my-2" href="/addWatchlist/<?php echo e($showcased[2]->id); ?>">
                                            <i class="fa-solid fa-plus"></i> Add to Watchlist
                                        </a>
                                    <?php else: ?>
                                        <?php
                                        $exist = False
                                        ?>
                                        <?php $__currentLoopData = Auth::user()->watchlists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $w): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($showcased[2]->id == $w->movie_id): ?>
                                                <?php
                                                $exist = True
                                                ?>
                                                <?php break; ?>
                                            <?php else: ?>
                                                <?php
                                                $exist = False
                                                ?>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($exist): ?>
                                            <i class="fa-solid fa-check text-color-1"></i> Already in Watchlist
                                        <?php else: ?>
                                            <a class="btn btn-danger my-2" href="/addWatchlist/<?php echo e($showcased[2]->id); ?>">
                                                <i class="fa-solid fa-plus"></i> Add to Watchlist
                                            </a>
                                        <?php endif; ?>

                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endif; ?>

                        </div>

                    </div>
                </a>
            </div>

          </div>
          <div class="carousel-item">
            <img src="..." class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="..." class="d-block w-100" alt="...">
          </div>
        </div>
    </div>
    <?php endif; ?>

    <div class="container my-3">
        <h4 class="mb-3">Popular</h4>
        <hr>
        <div class="row">
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 my-4">
                <?php if($movies != null): ?>
                <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                                            <?php
                                                            $exist = True
                                                            ?>
                                                            <?php break; ?>
                                                        <?php else: ?>
                                                        <?php
                                                        $exist = False
                                                        ?>
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
                <?php endif; ?>
            </div>
        </div>

        <form class="d-flex justify-content-between" action="/movies">
            <h4 class="mb-3">Show</h4>
            <input class="input-text b-radius px-3" type="text" name="search" id="search" placeholder="Search movie">
        </form>
        <hr>
        <div class="row my-3">
        <?php $__currentLoopData = $genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="/movies/genre/<?php echo e($genre->id); ?>" class="btn btn-secondary bg-1 col-1"><?php echo e($genre->name); ?></a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="d-flex align-items-center">
            <span>Sort By</span>
            <a href="/latest" class="btn btn-secondary bg-1 mx-2">Latest</a>
            <a href="/sortascend" class="btn btn-secondary bg-1 mx-2">A-Z</a>
            <a href="/sortdescend" class="btn btn-secondary bg-1 mx-2">Z-A</a>
        </div>
        <?php if(auth()->guard()->check()): ?>
        <?php if(Auth::user()->role == 'admin'): ?>
        <div class="d-flex justify-content-end">
            <a href="/addmovie" class="btn btn-danger"><i class="fa-solid fa-plus"></i> Add Movie</a>
        </div>
        <?php endif; ?>
        <?php endif; ?>
        <div class="row">
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 my-4">
                <?php if($sorted_movies != null): ?>
                <?php $__currentLoopData = $sorted_movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col my-2">
                        <a href="/movies/<?php echo e($movie->id); ?>">
                            <div class="card bg-1">
                                <img class="card-img-top img-poster" class="my-2" src="<?php echo e(Storage::url('images/movie/thumbnail/'.$movie->image_url)); ?>" alt="None">
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
                <?php endif; ?>
            </div>
        </div>

    </div>

    <?php echo $__env->make('layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html><?php /**PATH D:\BINUS\SEMESTER 5\LAB - Web Programming\PROJECT\source\source\resources\views/movie.blade.php ENDPATH**/ ?>