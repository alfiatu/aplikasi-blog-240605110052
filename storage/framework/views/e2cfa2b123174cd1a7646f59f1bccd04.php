

<?php $__env->startSection('title', 'Beranda'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">

    <!-- Daftar Artikel -->
    <div class="col-md-8">
        <h3 class="mb-4">Artikel Terbaru</h3>

        <?php $__empty_1 = true; $__currentLoopData = $artikel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="card mb-4 shadow-sm">
                <img src="<?php echo e(asset('storage/gambar/' . $item->gambar)); ?>"
                     class="card-img-top"
                     style="height:250px; object-fit:cover;"
                     alt="<?php echo e($item->judul); ?>">

                <div class="card-body">
                    <h5 class="card-title"><?php echo e($item->judul); ?></h5>

                    <p class="text-muted mb-2">
                        Kategori:
                        <strong><?php echo e($item->kategori->nama_kategori); ?></strong>
                        |
                        Penulis:
                        <strong>
                            <?php echo e($item->penulis->nama_depan); ?>

                            <?php echo e($item->penulis->nama_belakang); ?>

                        </strong>
                    </p>

                    <p class="card-text">
                        <?php echo e(\Illuminate\Support\Str::limit(strip_tags($item->isi), 150)); ?>

                    </p>

                    <a href="<?php echo e(route('detail.artikel', $item->id)); ?>"
                       class="btn btn-primary btn-sm">
                        Baca Selengkapnya
                    </a>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="alert alert-info">
                Belum ada artikel.
            </div>
        <?php endif; ?>
    </div>

    <!-- Sidebar Kategori -->
    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-header fw-bold">
                Kategori Artikel
            </div>

            <div class="list-group list-group-flush">
                <a href="<?php echo e(route('home')); ?>"
                   class="list-group-item list-group-item-action">
                    Semua Kategori
                </a>

                <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('home', ['kategori' => $item->id])); ?>"
                       class="list-group-item list-group-item-action">
                        <?php echo e($item->nama_kategori); ?>

                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.pengunjung', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\aplikasi-blog\resources\views/pengunjung/index.blade.php ENDPATH**/ ?>