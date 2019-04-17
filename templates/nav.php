<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <ul class="navbar-nav">
        <li class="nav-item <?php echo (isset($_GET['module']) ? ($_GET['module'] === 'miestas' ? 'active' : '') : '') ?>">
            <a class="nav-link" href="index.php?module=miestas&action=list">Miestai</a>
        </li>
        <li class="nav-item <?php echo (isset($_GET['module']) ? ($_GET['module'] === 'zaislas' ? 'active' : '') : '') ?>">
            <a class="nav-link" href="index.php?module=zaislas&action=list">Žaislai</a>
        </li>
        <li class="nav-item <?php echo (isset($_GET['module']) ? ($_GET['module'] === 'parduotuve' ? 'active' : '') : '') ?>">
            <a class="nav-link" href="index.php?module=parduotuve&action=list">Parduotuvės</a>
        </li>
        <li class="nav-item <?php echo (isset($_GET['module']) ? ($_GET['module'] === 'darbuotojas' ? 'active' : '') : '') ?>">
            <a class="nav-link" href="index.php?module=darbuotojas&action=list">Darbuotojai</a>
        </li>
        <li class="nav-item <?php echo (isset($_GET['module']) ? ($_GET['module'] === 'saskaita' ? 'active' : '') : '') ?>">
            <a class="nav-link" href="index.php?module=saskaita&action=list">Sąskaita</a>
        </li>
<!--        <li class="nav-item --><?php //echo (isset($_GET['module']) ? ($_GET['module'] === 'uzsakymas' ? 'active' : '') : '') ?><!--">-->
<!--            <a class="nav-link" href="index.php?module=uzsakymas&action=list">Užsakymai</a>-->
<!--        </li>-->
    </ul>
</nav>