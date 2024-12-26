<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js" defer></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <!-- Navbar -->
    <nav class="bg-blue-500 p-4 shadow-lg">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <!-- Mobile menu button-->
                </div>
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div href="<?php echo e(route('dashboard')); ?>" class="flex-shrink-0 text-white text-xl font-bold">Absensi Karyawan</div>
                </div>
                <div class="ml-4 flex items-center md:ml-6">
                    <!-- Right side links (login/logout) -->
                    <?php if(auth()->guard()->check()): ?>
                    <a href="<?php echo e(route('presensi.index')); ?>" class="text-white px-4 py-2 hover:bg-blue-700 rounded-md">Presensi</a>
                    <a href="<?php echo e(route('izin.index')); ?>" class="text-white px-4 py-2 hover:bg-blue-700 rounded-md">Izin</a>
                    <a href="<?php echo e(route('lembur.index')); ?>" class="text-white px-4 py-2 hover:bg-blue-700 rounded-md">Lembur</a>
                        <a href="<?php echo e(route('logout')); ?>" class="text-white px-4 py-2 hover:bg-blue-700 rounded-md" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="hidden">
                            <?php echo csrf_field(); ?>
                        </form>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>" class="text-white px-4 py-2 hover:bg-blue-700 rounded-md">Login</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <?php if(session('error')): ?>
        <script>
            alert("<?php echo e(session('error')); ?>");  // Menampilkan pesan error dalam bentuk pop-up
        </script>
    <?php endif; ?>
    <!-- Main Content -->
    <div class="container mx-auto px-4 py-8">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

</body>
</html>
<?php /**PATH D:\1.Kuliahhh\Semester 3\3. PERANCANGAN DAN PEMROGRAMAN WEB\Webprogganjil2425\week14_tubes\tubes2\resources\views/layouts/app.blade.php ENDPATH**/ ?>