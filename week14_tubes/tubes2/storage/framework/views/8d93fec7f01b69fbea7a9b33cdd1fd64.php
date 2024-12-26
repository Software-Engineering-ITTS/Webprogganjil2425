

<?php $__env->startSection('content'); ?>
<div class="container mx-auto mt-8">
    <h1 class="text-3xl font-bold mb-6">Daftar Lembur</h1>

    <?php if(session('success')): ?>
    <div class="bg-green-500 text-white px-4 py-2 rounded mb-4">
        <?php echo e(session('success')); ?>

    </div>
    <?php endif; ?>

    <a href="<?php echo e(route('lembur.create')); ?>" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Tambah Lembur</a>

    <table class="w-full table-auto border-collapse">
        <thead>
            <tr>
                <th class="px-4 py-2 border">Nama User</th>
                <th class="px-4 py-2 border">Tanggal</th>
                <th class="px-4 py-2 border">Jam Mulai</th>
                <th class="px-4 py-2 border">Jam Selesai</th>
                <th class="px-4 py-2 border">keterangan</th>
                <th class="px-4 py-2 border">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $lembur; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lembur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
            <td class="border px-4 py-2"><?php echo e($lembur->user->name ?? 'Tidak Diketahui'); ?></td>
            <td><?php echo e($lembur->tanggal); ?></td>
                <td><?php echo e($lembur->jam_mulai); ?></td>
                <td><?php echo e($lembur->jam_selesai); ?></td>
                <td><?php echo e($lembur->keterangan); ?></td>
                <td>
                    <a href="<?php echo e(route('lembur.edit', $lembur->id)); ?>" class="text-blue-500">Edit</a>
                    <form action="<?php echo e(route('lembur.destroy', $lembur->id)); ?>" method="POST" class="inline">
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\1.Kuliahhh\Semester 3\3. PERANCANGAN DAN PEMROGRAMAN WEB\Webprogganjil2425\week14_tubes\tubes2\resources\views/lembur/index.blade.php ENDPATH**/ ?>