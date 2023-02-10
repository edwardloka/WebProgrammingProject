<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $__env->make('layout.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title>Actor</title>
</head>
<body class="d-flex flex-column min-vh-100">
    <?php echo $__env->make('layout.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="container my-3">
        <div class="row">
            <div class="col-3">
                <div class="position-relative">
                    <img class="w-100" class="my-2" src="<?php echo e(Storage::url('images/'.$actor->image_url)); ?>" alt="None">
                    <a class="flying-btn-1" href="/editactor/<?php echo e($actor->id); ?>"><i class="fa-regular fa-pen-to-square fs-6 my-auto mx-2"></i></a>
                    <a class="flying-btn-2" href="/deleteactor/<?php echo e($actor->id); ?>"><i class="fa-solid fa-trash fs-6 my-auto mx-2"></i></a>
                </div>
                <div class="mt-2">
                    <h4>Personal Info</h4>
                    <div class="my-2">
                        <p>Popularity</p>
                        <p class="text-color-2"><?php echo e($actor->popularity); ?></p>
                    </div>
                    <div class="my-2">
                        <p>Gender</p>
                        <p class="text-color-2"><?php echo e($actor->gender); ?></p>
                    </div>
                    <div class="my-2">
                        <p>Birthday</p>
                        <p class="text-color-2"><?php echo e($actor->dob); ?></p>
                    </div>
                    <div class="my-2">
                        <p>Place of Birth</p>
                        <p class="text-color-2"><?php echo e($actor->pob); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-9">
                <h2><?php echo e($actor->name); ?></h2>
                <h4>Biography</h4>
                <p><?php echo e($actor->biography); ?></p>
                <h4>Known For</h4>
                    <div class="row row-cols-4">
                        <?php $__currentLoopData = $actor->movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col my-2">
                                <a href="/movies/<?php echo e($movie->movie->id); ?>">
                                    <div class="card bg-1 p-3">
                                        <img class="card-img-top img-poster img-fluid" class="my-2" src="<?php echo e(Storage::url('images/movie/thumbnail/'.$movie->movie->image_url)); ?>" alt="None">
                                        <div class="card-title my-2">
                                            <?php echo e($movie->movie->title); ?>

                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php echo $__env->make('layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html><?php /**PATH D:\BINUS\SEMESTER 5\LAB - Web Programming\PROJECT\source\source\resources\views/actor_detail.blade.php ENDPATH**/ ?>