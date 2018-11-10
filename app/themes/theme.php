
<!DOCTYPE html>
<html>

<head>

    <title>
        <?= isset($page_title) ? site_title . ' &lsaquo ' . $page_title : site_title?>
    </title>

    <?= load_styles(['bootstrap.min', 'app']) ?>

</head>

<body>

    <header class="theme-menu">
        <?php require_once __DIR__ . "/fragments/theme.menu.php" ?>
    </header>

    <main class="container-fluid full-page">
        <?= $content ?>
    </main>

    <footer class="theme-footer">
        <?php require_once __DIR__ . "/fragments/theme.footer.php" ?>
    </footer>

    <!--Import jQuery and tether(dependency for v4) before bootstrap.js-->
    <?php load_scripts(['jquery', 'tether.min', 'bootstrap.min', 'app']) ?>
</body>

</html>
