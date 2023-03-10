<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $__env->make('layout.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title>Add Movie</title>
</head>
<body class="d-flex flex-column min-vh-100">
    <?php echo $__env->make('layout.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="container my-5">
        <h3>Add Movie</h3>
        <?php if($errors->any()): ?>
            <strong><?php echo e($errors->first()); ?></strong>
        <?php endif; ?>
        <form enctype="multipart/form-data" action="/insertmovie" method="POST" class="row w-100">
            <?php echo csrf_field(); ?>
            <div class="my-1">
                <label for="title" class="mb-1">Title</label>
                <input type="text" class="form-control input-text w-100 text-white" name="title" id="title">
            </div>
            <div class="my-1">
                <label for="description" class="mb-1">Description</label>
                <textarea name="description" class="form-control bg-1 text-white border-0" id="" cols="30" rows="10" style="transition: none"></textarea>
            </div>
            <div class="my-1">
                <label for="genre" class="mb-1">Genre</label>
                <select multiple name="genre[]" id="genre" class="form-select bg-1 text-white border-0">
                    <option selected disabled='disabled'>Select an option</option>
                    <?php $__currentLoopData = $genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($g->id); ?>"><?php echo e($g->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="my-1">
                <p class="mb-3">Actors</p>
                <div class="mx-3" id="actors-list">
                    <div id="actors-wrapper-1">
                        <div class="row d-flex">
                            <div class="col">
                                <label for="actor-1" class="mb-1">Actor</label>
                                <select name="actor-1" id="actor-1" class="form-select bg-1 text-white border-0">
                                    <option selected disabled='disabled'>-- Open this select menu --</option>
                                    <?php $__currentLoopData = $actors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($a->id); ?>"><?php echo e($a->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col">
                                <label for="c-name-1" class="mb-1">Character Name</label>
                                <input type="text" class="form-control input-text w-100 text-white"  name="c-name-1" id="c-name-1">
                            </div>
                        </div>
                    </div>
                    <div id="actors-wrapper-2" style="display: none">
                        <div class="row d-flex">
                            <div class="col">
                                <label for="actor-2" class="mb-1">Actor</label>
                                <select name="actor-2" id="actor-2" class="form-select bg-1 text-white border-0">
                                    <option selected disabled='disabled'>-- Open this select menu --</option>
                                    <?php $__currentLoopData = $actors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($a->id); ?>"><?php echo e($a->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col">
                                <label for="c-name-2" class="mb-1">Character Name</label>
                                <input type="text" class="form-control input-text w-100 text-white"  name="c-name-2" id="c-name-2">
                            </div>
                        </div>
                    </div>
                    <div id="actors-wrapper-3" style="display: none">
                        <div class="row d-flex">
                            <div class="col">
                                <label for="actor-3" class="mb-1">Actor</label>
                                <select name="actor-3" id="actor-3" class="form-select bg-1 text-white border-0">
                                    <option selected disabled='disabled'>-- Open this select menu --</option>
                                    <?php $__currentLoopData = $actors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($a->id); ?>"><?php echo e($a->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col">
                                <label for="c-name-3" class="mb-1">Character Name</label>
                                <input type="text" class="form-control input-text w-100 text-white"  name="c-name-3" id="c-name-3">
                            </div>
                        </div>
                    </div>
                    <div id="actors-wrapper-4" style="display: none">
                        <div class="row d-flex">
                            <div class="col">
                                <label for="actor-4" class="mb-1">Actor</label>
                                <select name="actor-4" id="actor-4" class="form-select bg-1 text-white border-0">
                                    <option selected disabled='disabled'>-- Open this select menu --</option>
                                    <?php $__currentLoopData = $actors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($a->id); ?>"><?php echo e($a->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col">
                                <label for="c-name-4" class="mb-1">Character Name</label>
                                <input type="text" class="form-control input-text w-100 text-white"  name="c-name-4" id="c-name-4">
                            </div>
                        </div>
                    </div>
                    <div class="text-end mt-3">
                        <input type="button" value="Add more" class="btn btn-primary" onclick="addActor();">
                    </div>
                </div>
            </div>
            <div class="my-1">
                <label for="director" class="mb-1">Director</label>
                <input type="text" class="form-control input-text w-100 text-white" name="director" id="director">
            </div>
            <div class="my-1">
                <label for="release_date" class="mb-1">Release Date</label>
                <input type="date" class="form-control bg-1 text-white border-0" name="release_date" id="release_date">
            </div>
            <div class="my-1">
                <label for="img_url" class="mb-1">Image Url</label>
                <input type="file" class="form-control input-text w-100 text-white" name="image_url" id="image_url">
            </div>
            <div class="my-1">
                <label for="bg_url" class="mb-1">Background Url</label>
                <input type="file" class="form-control input-text w-100 text-white" name="bg_url" id="bg_url">
            </div>
            <div>
                <input type="submit" value="Create" class="create-btn text-white mt-3 py-1 w-100">
            </div>



        </form>
    </div>

    <?php echo $__env->make('layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script src="<?php echo e(asset('js/script.js')); ?>"></script>
</body>
</html><?php /**PATH D:\BINUS\SEMESTER 5\LAB - Web Programming\PROJECT\source\source\resources\views/add_movie.blade.php ENDPATH**/ ?>