<div class="container">
    <h2>Žaislų sąrašas</h2>
    <?php if (isset($_GET['error']) && $_GET['error'] == 2) { ?>
        <div class="alert alert-danger" role="alert">
            Zaislas nebuvo pasalintas. Pirma ji reiktu pasalinti is kitu lenteliu.
        </div>
    <?php } ?>
    <table class="table">
        <thead>
        <tr style="background: #bfeeff">
            <th>Pavadinimas</th>
            <th>Svoris (g)</th>
            <th>Verte (€)</th>
            <th style="text-align: right">
                <a href="index.php?module=zaislas&action=add">
                    <button type="button" class="btn btn-success">Pridėti</button>
                </a>
            </th>
        </tr>
        </thead>
        <tbody>
<?php
foreach ($data as $item) {
    echo <<<HTML
            <tr>
                <td>{$item['pavadinimas']}</td>
                <td>{$item['svoris']}</td>
                <td>{$item['verte']}</td>
                <td align="right">
                  <a href='index.php?module=zaislas&action=edit&id={$item['id']}'>
                    <button type="button" class="btn btn-warning">Readaguoti</button>
                  </a>
                  <a href='#' onclick="showConfirmDialog('{$module}', '{$item['id']}'); return false;">
                    <button type="button" class="btn btn-danger">Pašalinti</button>
                  </a>  
                </td>
            </tr>
    HTML;
}
?>
        </tbody>
    </table>
    <?php include 'templates/paging.php'?>
</div>





