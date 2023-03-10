<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $__env->make('layout.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title>Watchlist</title>
</head>
<body class="d-flex flex-column min-vh-100">
    <?php echo $__env->make('layout.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="container">
        <form action="/watchlist" class="">
            <h3>My Watchlist</h3>
            <div class="row mx-auto my-3 bg-2 input-box py-1">
                <input class="border-0 col-11 bg-none text-color-3" type="text" name="search" id="search" placeholder="Search your watchlist">
                <button type="submit" class="col-1 bg-none border-0 text-color-3 px-0">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
        </form>
        <div class="d-flex">
            <i class="fa fa-filter me-3 d-flex align-items-center" aria-hidden="true"></i>
            <div class="dropdown">
                <button class="btn dropdown-toggle bg-3 text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  All
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/watchlist/status/all">All</a></li>
                    <li><a class="dropdown-item" href="/watchlist/status/planning">Planned</a></li>
                    <li><a class="dropdown-item" href="/watchlist/status/watching">Watching</a></li>
                    <li><a class="dropdown-item" href="/watchlist/status/finished">Finished</a></li>
                </ul>
              </div>
        </div>
        <div>
            <table class="table">
                <thead>
                    <tr>
                        <th class="col text-white">Poster</th>
                        <th class="col text-white">Title</th>
                        <th class="col text-white">Status</th>
                        <th class="col text-white">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $watchlists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $w): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th class="col text-white"><img class="img-fluid" width="100px"  src="<?php echo e(Storage::url('images/movie/thumbnail/'.$w->movie->image_url)); ?>" alt="none"></th>
                            <th class="col text-white align-middle"><?php echo e($w->movie->title); ?></th>
                            <th class="col text-white align-middle"><?php echo e(ucfirst($w->status)); ?></th>
                            <th class="col text-white align-middle"><button type="button" class="btn text-white border-0" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo e($w->id); ?>"><i class="fa-solid fa-ellipsis"></i></button></th>
                            <div class="modal fade" id="exampleModal<?php echo e($w->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content bg-1">
                                        <form action="/changestatus/<?php echo e($w->id); ?>">
                                            <div class="modal-header border-0">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Change Status</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <select name="status" id="status" class="form-select bg-3 text-white border-0">
                                                    <option value="planning" <?php echo e(strcasecmp($w->status, "planning") == 0 ? 'selected' : ''); ?>>Planning</option>
                                                    <option value="watching" <?php echo e(strcasecmp($w->status, "watching") == 0 ? 'selected' : ''); ?>>Watching</option>
                                                    <option value="finished" <?php echo e(strcasecmp($w->status, "finished") == 0 ? 'selected' : ''); ?>>Finished</option>
                                                    <option value="remove">Remove</option>
                                                </select>
                                            </div>
                                            <div class="modal-footer border-0">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div>
                <div>
                    Showing <?php echo e($watchlists->firstItem()); ?> to <?php echo e($watchlists->lastItem()); ?> of <?php echo e($watchlists->total()); ?> results
                </div>
                <div>
                    <a href="<?php echo e($watchlists->previousPageUrl()); ?>">&laquo;</a>
                    <?php for($i = 1; $i <= $watchlists->lastPage(); $i++): ?>
                        <?php if($i == $watchlists->currentPage()): ?>
                            <b><a href="<?php echo e($watchlists->url($i)); ?>"><?php echo e($i); ?></a></b>
                        <?php else: ?>
                            <a href="<?php echo e($watchlists->url($i)); ?>"><?php echo e($i); ?></a>
                        <?php endif; ?>
                    <?php endfor; ?>
                    <a href="<?php echo e($watchlists->nextPageUrl()); ?>">&raquo;</a>
                </div>

            </div>
        </div>

    </div>
    <?php echo $__env->make('layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html><?php /**PATH D:\BINUS\SEMESTER 5\LAB - Web Programming\PROJECT\source\source\resources\views/watchlist.blade.php ENDPATH**/ ?>