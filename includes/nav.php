<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <ul class="navbar-nav">
        <li class="nav-item <?php echo (isset($_GET['module']) ? ($_GET['module'] === 'miestas' ? 'active' : '') : '') ?>">
            <a class="nav-link" href="index.php?module=miestas&action=list">Miestai</a>
        </li>
        <li class="nav-item <?php echo (isset($_GET['module']) ? ($_GET['module'] === '' ? 'active' : '') : '') ?>">
            <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item <?php echo (isset($_GET['module']) ? ($_GET['module'] === '' ? 'active' : '') : '') ?>">
            <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item <?php echo (isset($_GET['module']) ? ($_GET['module'] === '' ? 'active' : '') : '') ?>">
            <a class="nav-link disabled" href="#">Disabled</a>
        </li>
    </ul>
</nav>