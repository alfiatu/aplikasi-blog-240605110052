<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Aplikasi Blog'); ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f4f9;
            font-family: Arial, Helvetica, sans-serif;
        }

        .navbar-custom {
            background-color: #2C3E50;
        }

        .navbar-brand {
            color: #fff !important;
            font-weight: 600;
            font-size: 20px;
        }

        .navbar-text {
            color: #dcdcdc !important;
            font-size: 14px;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .card-title a {
            text-decoration: none;
            color: #2C3E50;
        }

        .card-title a:hover {
            color: #0d6efd;
        }

        .sidebar-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 15px;
            color: #2C3E50;
        }

        .list-group-item a {
            text-decoration: none;
            color: #444;
        }

        .list-group-item a:hover {
            color: #0d6efd;
        }

        footer {
            margin-top: 40px;
            padding: 20px 0;
            background-color: #2C3E50;
            color: #ffffff;
            text-align: center;
            font-size: 14px;
        }

        .article-image {
            width: 100%;
            height: 220px;
            object-fit: cover;
            border-radius: 8px;
        }

        .meta-text {
            font-size: 13px;
            color: #777;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom mb-4">
        <div class="container">
            <a class="navbar-brand" href="<?php echo e(route('home')); ?>">
                Aplikasi Blog
            </a>

            <span class="navbar-text">
                Sistem Informasi Artikel
            </span>
        </div>
    </nav>

    <!-- Konten -->
    <div class="container">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            &copy; <?php echo e(date('Y')); ?> Aplikasi Blog - Dibuat dengan Laravel
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html><?php /**PATH C:\xampp\htdocs\aplikasi-blog\resources\views/layouts/pengunjung.blade.php ENDPATH**/ ?>