

<?php $__env->startSection('content'); ?>
<div class="container mx-auto mt-8">
    <h1 class="text-3xl font-bold mb-6">Daftar Izin</h1>

    <?php if(session('success')): ?>
    <div class="bg-green-500 text-white px-4 py-2 rounded mb-4">
        <?php echo e(session('success')); ?>

    </div>
    <?php endif; ?>

    <a href="<?php echo e(route('izin.create')); ?>" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Tambah Izin</a>

    <table class="w-full table-auto border-collapse">
        <thead>
            <tr>
                <th class="px-4 py-2 border">Nama User</th>
                <th class="px-4 py-2 border">Jenis Izin</th>
                <th class="px-4 py-2 border">Alasan</th>
                <th class="px-4 py-2 border">Tanggal Mulai</th>
                <th class="px-4 py-2 border">Tanggal Selesai</th>
                <?php if(auth()->user()->isRole('admin')): ?> <!-- Hanya admin yang dapat melihat kolom status -->
                <th class="px-4 py-2 border">Status</th>
                <?php endif; ?>

                <th class="px-4 py-2 border">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $izin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td class="border px-4 py-2"><?php echo e($item->user->name ?? 'Tidak Diketahui'); ?></td>
                <td class="border px-4 py-2"><?php echo e($item->jenis_izin); ?></td>
                <td class="border px-4 py-2"><?php echo e($item->alasan); ?></td>
                <td class="border px-4 py-2"><?php echo e($item->tanggal_mulai); ?></td>
                <td class="border px-4 py-2"><?php echo e($item->tanggal_selesai); ?></td>
                <?php if(auth()->user()->isRole('admin')): ?> <!-- Tampilkan status hanya untuk admin -->
                <td class="border px-4 py-2"><?php echo e($item->status); ?></td>
                <?php endif; ?>

                <td class="border px-4 py-2">
                    <a href="<?php echo e(route('izin.edit', $item->id)); ?>" class="text-blue-500">Edit</a>
                    <form action="<?php echo e(route('izin.destroy', $item->id)); ?>" method="POST" class="inline">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\1.Kuliahhh\Semester 3\3. PERANCANGAN DAN PEMROGRAMAN WEB\Webprogganjil2425\week14_tubes\tubes2\resources\views/izin/index.blade.php ENDPATH**/ ?>