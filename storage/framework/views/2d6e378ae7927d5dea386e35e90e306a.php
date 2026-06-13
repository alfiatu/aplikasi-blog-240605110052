

<?php $__env->startSection('title', $artikel->judul); ?>

<?php $__env->startSection('content'); ?>
<div class="row">

    <!-- Detail Artikel -->
    <div class="col-md-8">
        <div class="card shadow-sm mb-4">
            <img
                src="<?php echo e(asset('storage/gambar/' . $artikel->gambar)); ?>"
                class="card-img-top"
                style="height: 350px; object-fit: cover;"
                alt="<?php echo e($artikel->judul); ?>">

            <div class="card-body">
                <h2 class="mb-3"><?php echo e($artikel->judul); ?></h2>

                <p class="text-muted mb-3">
                    <strong>Kategori:</strong>
                    <?php echo e($artikel->kategori->nama_kategori); ?>

                    |
                    <strong>Penulis:</strong>
                    <?php echo e($artikel->penulis->nama_depan); ?>

                    <?php echo e($artikel->penulis->nama_belakang); ?>

                    |
                    <strong>Tanggal:</strong>
                    <?php echo e($artikel->hari_tanggal); ?>

                </p>

                <hr>

                <div style="text-align: justify;">
                    <?php echo nl2br(e($artikel->isi)); ?>

                </div>
            </div>
        </div>

        <a href="<?php echo e(route('home')); ?>" class="btn btn-secondary">
            ← Kembali ke Beranda
        </a>
    </div>

    <!-- Sidebar Artikel Terkait -->
    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-header fw-bold">
                Artikel Terkait
            </div>

            <div class="list-group list-group-flush">
                <?php $__empty_1 = true; $__currentLoopData = $terkait; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <a href="<?php echo e(route('detail.artikel', $item->id)); ?>"
                        class="list-group-item list-group-item-action">

                        <strong><?php echo e($item->judul); ?></strong>
                        <br>

                        <small class="text-muted">
                            <?php echo e(\Illuminate\Support\Str::limit(strip_tags($item->isi), 60)); ?>

                        </small>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="list-group-item text-muted">
                        Tidak ada artikel terkait.
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.pengunjung', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\aplikasi-blog\resources\views/pengunjung/detail.blade.php ENDPATH**/ ?>