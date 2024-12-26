<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex justify-center items-center h-screen">

    <form method="POST" action="<?php echo e(route('login')); ?>" class="bg-white p-8 rounded shadow-md w-96">
        <?php echo csrf_field(); ?>
        <h1 class="text-2xl font-bold mb-6">Login</h1>

        <?php if(session('success')): ?>
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            <?php echo e(session('success')); ?>

        </div>
        <?php endif; ?>
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
            <label for="email" class="block text-gray-700">Email or Username</label>
            <input id="email" name="email" type="text" class="w-full border rounded p-2" value="<?php echo e(old('email')); ?>" required>
        </div>
        <div class="mb-4">
            <label for="password" class="block text-gray-700">Password</label>
            <input id="password" name="password" type="password" class="w-full border rounded p-2" required>
        </div>
        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded">Login</button>
        <p class="mt-4 text-gray-600 text-center">
            Don't have an account? <a href="<?php echo e(route('register')); ?>" class="text-blue-500">Register here</a>.
        </p>
    </form>


</body>


</html><?php /**PATH D:\1.Kuliahhh\Semester 3\3. PERANCANGAN DAN PEMROGRAMAN WEB\Webprogganjil2425\week14_tubes\tubes2\resources\views/auth/login.blade.php ENDPATH**/ ?>