<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex justify-center items-center h-screen">
    <form method="POST" action="<?php echo e(route('register')); ?>" class="bg-white p-8 rounded shadow-md w-96">
        <?php echo csrf_field(); ?>
        <h1 class="text-2xl font-bold mb-6">Register</h1>

        <!-- Pesan Error -->
        <?php if($errors->any()): ?>
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc list-inside">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <?php endif; ?>

        <div class="mb-4">
            <label for="name" class="block text-gray-700">Name</label>
            <input id="name" name="name" type="text" class="w-full border rounded p-2" value="<?php echo e(old('name')); ?>" required>
        </div>
        <div class="mb-4">
            <label for="username" class="block text-gray-700">Username</label>
            <input id="username" name="username" type="text" class="w-full border rounded p-2" value="<?php echo e(old('username')); ?>" required>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input id="email" name="email" type="email" class="w-full border rounded p-2" value="<?php echo e(old('email')); ?>" required>
        </div>
        <div class="mb-4">
            <label for="password" class="block text-gray-700">Password</label>
            <input id="password" name="password" type="password" class="w-full border rounded p-2" required>
        </div>
        <div class="mb-4">
            <label for="password_confirmation" class="block text-gray-700">Confirm Password</label>
            <input id="password_confirmation" name="password_confirmation" type="password" class="w-full border rounded p-2" required>
        </div>
        <div class="mb-4">
            <label for="role" class="block text-gray-700">Role</label>
            <select id="role" name="role" class="w-full border rounded p-2" required>
                <option value="" disabled selected>Select Role</option>
                <option value="admin" <?php echo e(old('role') == 'admin' ? 'selected' : ''); ?>>Admin</option>
                <option value="karyawan" <?php echo e(old('role') == 'karyawan' ? 'selected' : ''); ?>>Karyawan</option>
            </select>
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded">Register</button>
        <p class="mt-4 text-gray-600 text-center">
            Already have an account? <a href="<?php echo e(route('login')); ?>" class="text-blue-500">Login here</a>.
        </p>
    </form>

</body>

</html><?php /**PATH D:\1.Kuliahhh\Semester 3\3. PERANCANGAN DAN PEMROGRAMAN WEB\Webprogganjil2425\week14_tubes\tubes2\resources\views/auth/register.blade.php ENDPATH**/ ?>