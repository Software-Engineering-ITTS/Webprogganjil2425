

<?php $__env->startSection('content'); ?>
<div class="container mx-auto mt-8">
    <h1 class="text-3xl font-bold mb-6">Tambah Izin</h1>

    <?php if($errors->any()): ?>
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
        <ul class="list-disc list-inside">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <?php endif; ?>

    <form action="<?php echo e(route('izin.store')); ?>" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        <?php echo csrf_field(); ?>
        <div class="mb-4">
            <label for="jenis_izin" class="block text-sm font-medium text-gray-700">Jenis Izin</label>
            <select id="jenis_izin" name="jenis_izin" class="w-full border rounded p-2" required>
                <option value="" disabled selected>Pilih Jenis Izin</option>
                <option value="sakit" <?php echo e(old('jenis_izin') == 'sakit' ? 'selected' : ''); ?>>Sakit</option>
                <option value="cuti" <?php echo e(old('jenis_izin') == 'cuti' ? 'selected' : ''); ?>>Cuti</option>
                <option value="lainnya" <?php echo e(old('jenis_izin') == 'lainnya' ? 'selected' : ''); ?>>Lainnya</option>
            </select>
            <?php $__errorArgs = ['jenis_izin'];
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
            <label for="alasan" class="block text-sm font-medium text-gray-700">Alasan</label>
            <input type="text" id="alasan" name="alasan" value="<?php echo e(old('alasan')); ?>" class="w-full border rounded p-2" placeholder="Masukkan alasan izin..." required>
            <?php $__errorArgs = ['alasan'];
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
            <label for="tanggal_mulai" class="block text-sm font-medium text-gray-700">Tanggal Mulai</label>
            <input type="date" id="tanggal_mulai" name="tanggal_mulai" value="<?php echo e(old('tanggal_mulai')); ?>" class="w-full border rounded p-2" required>
            <?php $__errorArgs = ['tanggal_mulai'];
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
            <label for="tanggal_selesai" class="block text-sm font-medium text-gray-700">Tanggal Selesai</label>
            <input type="date" id="tanggal_selesai" name="tanggal_selesai" value="<?php echo e(old('tanggal_selesai')); ?>" class="w-full border rounded p-2" required>
            <?php $__errorArgs = ['tanggal_selesai'];
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

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isAdmin')): ?> <!-- Hanya untuk admin -->
        <div class="mb-4">
            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
            <select id="status" name="status" class="w-full border rounded p-2">
                <option value="" disabled selected>Pilih Status</option>
                <option value="pending" <?php echo e(old('status') == 'pending' ? 'selected' : ''); ?>>Pending</option>
                <option value="approve" <?php echo e(old('status') == 'approve' ? 'selected' : ''); ?>>Approve</option>
                <option value="decline" <?php echo e(old('status') == 'decline' ? 'selected' : ''); ?>>Decline</option>
            </select>
            <?php $__errorArgs = ['status'];
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
        <?php endif; ?>


        <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                Tambah Izin
            </button>
            <a href="<?php echo e(route('izin.index')); ?>" class="ml-4 text-blue-500 hover:underline">Kembali ke Daftar Izin</a>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\1.Kuliahhh\Semester 3\3. PERANCANGAN DAN PEMROGRAMAN WEB\Webprogganjil2425\week14_tubes\tubes2\resources\views/izin/create.blade.php ENDPATH**/ ?>