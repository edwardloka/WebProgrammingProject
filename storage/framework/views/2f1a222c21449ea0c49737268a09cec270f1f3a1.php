
<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $__env->make('layout.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title>Actor</title>
</head>
<body class="d-flex flex-column min-vh-100">
    <?php echo $__env->make('layout.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="container my-3">
        <form action="/actor" class="d-flex justify-content-between">
            <h3>Actors</h3>
            <div class="d-flex">
                <input class="input-text b-radius px-3" type="text" name="search" id="search" placeholder="Search Actor">
                <?php if(auth()->guard()->check()): ?>
                    <?php if(Auth::user()->role == 'admin'): ?>
                        <a href="/addactor" class="btn btn-danger ms-2">Add Actor</a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>

        </form>

        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 my-4">
            <?php $__currentLoopData = $actors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="/actor/<?php echo e($a->id); ?>">
                <div class="col my-2">
                    <div class="card bg-1">
                        <div class="card-body">
                        <img class="w-100" width="200px" height="270px" class="my-2" src="<?php echo e(Storage::url('images/'.$a->image_url)); ?>" alt="None" loading="lazy">
                            <div class="card-title my-2">
                                <?php echo e($a->name); ?>

                            </div>
                            <?php if(count($a->movies) > 0): ?>
                            <div class="card-text text-color-2">
                                <?php echo e($a->movies[0]->movie->title); ?>

                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </a>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

    </div>

    <?php echo $__env->make('layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html><?php /**PATH D:\BINUS\SEMESTER 5\LAB - Web Programming\PROJECT\source\source\resources\views/actor.blade.php ENDPATH**/ ?>