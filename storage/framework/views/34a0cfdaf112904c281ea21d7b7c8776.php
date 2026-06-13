

<?php $__env->startSection('title', 'Data Kategori'); ?>

<?php $__env->startSection('content'); ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold text-secondary mb-0">
        Data Kategori
    </h4>

    <a href="<?php echo e(route('kategori.create')); ?>"
       class="btn btn-success">
        + Tambah Kategori
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th width="80">ID</th>
                        <th>Nama Kategori</th>
                        <th>Keterangan</th>
                        <th width="180" class="text-center">
                            Aksi
                        </th>
                    </tr>
                </thead>

                <tbody>

                    <?php $__empty_1 = true; $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($item->id); ?></td>

                            <td>
                                <?php echo e($item->nama_kategori); ?>

                            </td>

                            <td>
                                <?php echo e($item->keterangan); ?>

                            </td>

                            <td class="text-center">

                                <a href="<?php echo e(route('kategori.edit', $item->id)); ?>"
                                   class="btn btn-sm"
                                    style="background-color:#e3f2fd; color:#1565c0; font-size:12px;">
                                    Edit
                                </a>

                                <form action="<?php echo e(route('kategori.destroy', $item->id)); ?>"
                                      method="POST"
                                      class="d-inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>

                                   <button type="submit"
                                            class="btn btn-sm"
                                            style="background-color:#ffebee; color:#c62828; font-size:12px;">
                                        Hapus
                                    </button>
                                </form>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="4"
                                class="text-center py-4 text-muted">
                                Belum ada data kategori.
                            </td>
                        </tr>
                    <?php endif; ?>

                </tbody>
            </table>
        </div>

    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\aplikasi-blog\resources\views/kategori/index.blade.php ENDPATH**/ ?>