

<?php $__env->startSection('content'); ?>
<div class="container mx-auto mt-8">
    <h1 class="text-3xl font-bold mb-6">Daftar Presensi</h1>

    <?php if(session('success')): ?>
    <div class="bg-green-500 text-white px-4 py-2 rounded mb-4">
        <?php echo e(session('success')); ?>

    </div>
    <?php endif; ?>

    <a href="<?php echo e(route('presensi.create')); ?>" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Tambah Presensi</a>

    <table class="w-full table-auto border-collapse">
        <thead>
            <tr>
                <th class="px-4 py-2 border">Nama User</th>
                <th class="px-4 py-2 border">Tanggal</th>
                <th class="px-4 py-2 border">Jam Masuk</th>
                <th class="px-4 py-2 border">Jam Keluar</th>
                <th class="px-4 py-2 border">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $presensi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $presensi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td class="border px-4 py-2"><?php echo e($presensi->user->name ?? 'Tidak Diketahui'); ?></td>
                <td><?php echo e($presensi->tanggal); ?></td>
                <td><?php echo e($presensi->jam_masuk); ?></td>
                <td><?php echo e($presensi->jam_keluar); ?></td>
                <td>
                    <a href="<?php echo e(route('presensi.edit', $presensi->id)); ?>" class="text-blue-500">Edit</a>
                    <form action="<?php echo e(route('presensi.destroy', $presensi->id)); ?>" method="POST" class="inline">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                        <?php if(session('error')): ?>
                        <!-- SweetAlert Pop-up -->
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
                        <script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Akses Ditolak',
                                text: "<?php echo e(session('error')); ?>",
                                confirmButtonText: 'Tutup'
                            });
                        </script>
                        <?php endif; ?>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
    </table>
</div>
<div class="container mx-auto mt-8">
    <?php if(session('error')): ?>
    <!-- SweetAlert Pop-up -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Akses Ditolak',
            text: "<?php echo e(session('error')); ?>",
            confirmButtonText: 'Tutup'
        });
    </script>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\1.Kuliahhh\Semester 3\3. PERANCANGAN DAN PEMROGRAMAN WEB\Webprogganjil2425\week14_tubes\tubes2\resources\views/presensi/index.blade.php ENDPATH**/ ?>