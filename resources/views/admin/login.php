<!DOCTYPE html>
<html lang="en" data-theme="admin">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#111827">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="<?= base_url('resources/css/admin-compiled.css') ?>" rel="stylesheet">
    <title>Admin Login | Portfolio</title>
    <link rel="icon" type="image/x-icon" href="<?= base_url('images/favicon.ico') ?>">
</head>

<body class="bg-base-100 min-h-screen flex items-center justify-center p-4">

    <!-- Login Container -->
    <div class="w-full max-w-md">
        <!-- Logo/Brand -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-br from-pink-500 to-rose-600 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
            </div>
            <h1 class="text-2xl font-bold text-base-content">Admin Panel</h1>
            <p class="text-base-content/60 text-sm mt-1">Portfolio Management System</p>
        </div>

        <!-- Login Card -->
        <div class="card bg-base-200 border border-primary/20 shadow-xl">
            <div class="card-body">
                <!-- Warning Badge -->
                <div class="flex justify-center mb-4">
                    <div class="badge badge-warning gap-2 py-3 px-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                        <span class="font-semibold text-xs uppercase tracking-wide">Authorized Personnel Only</span>
                    </div>
                </div>

                <!-- Flash Messages -->
                <?php if (has_flash('error')): ?>
                    <div role="alert" class="alert alert-error alert-soft mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                        <span><?= get_flash('error') ?></span>
                    </div>
                <?php endif ?>

                <?php if (has_flash('success')): ?>
                    <div role="alert" class="alert alert-success alert-soft mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span><?= get_flash('success') ?></span>
                    </div>
                <?php endif ?>

                <!-- Login Form -->
                <form action="<?= base_url('admin/authenticate') ?>" method="POST" class="space-y-4">
                    <?= csrf_field() ?>

                    <!-- Username Field -->
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend text-base-content/70">Username</legend>
                        <label class="input w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-base-content/50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <input type="text" name="username" placeholder="Enter your username" required autofocus>
                        </label>
                    </fieldset>

                    <!-- Password Field -->
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend text-base-content/70">Password</legend>
                        <label class="input w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-base-content/50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                            <input type="password" name="password" placeholder="Enter your password" required>
                        </label>
                    </fieldset>

                    <!-- Login Button -->
                    <button type="submit" class="btn btn-primary w-full mt-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                        </svg>
                        Sign In
                    </button>
                </form>
            </div>
        </div>

        <!-- Back to Site Link -->
        <div class="text-center mt-6">
            <a href="<?= base_url('/') ?>" class="text-sm text-base-content/50 hover:text-primary transition-colors">
                ← Back to Portfolio
            </a>
        </div>

        <!-- Footer -->
        <div class="text-center mt-8">
            <p class="text-xs text-base-content/30">
                &copy; <?= date('Y') ?> Portfolio Admin Panel
            </p>
        </div>
    </div>

</body>

</html>