

<?php $__env->startSection('content'); ?>
    <div class="container mx-auto mt-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Karyawan Dashboard</h1>
            <!-- <nav>
                <ul class="flex space-x-4">
                    <li><a href="<?php echo e(route('presensi.create')); ?>" class="text-blue-500">Input Presensi</a></li>
                    <li><a href="<?php echo e(route('lembur.create')); ?>" class="text-blue-500">Input Lembur</a></li>
                    <li><a href="<?php echo e(route('izin.create')); ?>" class="text-blue-500">Input Izin</a></li>
                </ul>
            </nav> -->
        </div>

        <div class="grid grid-cols-3 gap-6">
            <!-- Presensi -->
            <div class="p-4 border rounded-lg shadow-sm">
                <h3 class="font-bold mb-2">Presensi</h3>
                <a href="<?php echo e(route('presensi.create')); ?>" class="text-blue-500">Input Presensi</a>
            </div>

            <!-- Lembur -->
            <div class="p-4 border rounded-lg shadow-sm">
                <h3 class="font-bold mb-2">Lembur</h3>
                <a href="<?php echo e(route('lembur.create')); ?>" class="text-blue-500">Input Lembur</a>
            </div>

            <!-- Izin -->
            <div class="p-4 border rounded-lg shadow-sm">
                <h3 class="font-bold mb-2">Izin</h3>
                <a href="<?php echo e(route('izin.create')); ?>" class="text-blue-500">Input Izin</a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\1.Kuliahhh\Semester 3\3. PERANCANGAN DAN PEMROGRAMAN WEB\Webprogganjil2425\week14_tubes\tubes2\resources\views/dashboard/karyawan.blade.php ENDPATH**/ ?>