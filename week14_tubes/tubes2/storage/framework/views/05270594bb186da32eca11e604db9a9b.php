<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    

    <?php $__env->startSection('content'); ?>
    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-bold mb-6">Tambah Presensi</h1>

        <form action="<?php echo e(route('presensi.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <div class="mb-4">
                <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
                <input type="date" id="tanggal" name="tanggal" value="<?php echo e(old('tanggal')); ?>" class="mt-1 block w-full px-4 py-2 border rounded-md" required>
                <?php $__errorArgs = ['tanggal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-red-500 text-sm mt-2"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="mb-4">
                <label for="jam_masuk" class="block text-sm font-medium text-gray-700">Jam Masuk</label>
                <input type="time" id="jam_masuk" name="jam_masuk" value="<?php echo e(old('jam_masuk')); ?>" class="mt-1 block w-full px-4 py-2 border rounded-md" required>
                <?php $__errorArgs = ['jam_masuk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-red-500 text-sm mt-2"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="mb-4">
                <label for="jam_keluar" class="block text-sm font-medium text-gray-700">Jam Keluar</label>
                <input type="time" id="jam_keluar" name="jam_keluar" value="<?php echo e(old('jam_keluar')); ?>" class="mt-1 block w-full px-4 py-2 border rounded-md" required>
                <?php $__errorArgs = ['jam_keluar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-red-500 text-sm mt-2"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Tambah Presensi</button>
            </div>
        </form>
    </div>
    <?php $__env->stopSection(); ?>

</body>

</html>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\1.Kuliahhh\Semester 3\3. PERANCANGAN DAN PEMROGRAMAN WEB\Webprogganjil2425\week14_tubes\tubes2\resources\views/presensi/create.blade.php ENDPATH**/ ?>