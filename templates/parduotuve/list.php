<div style="width: 90vw; margin: auto">
    <h2>Parduotuvių sąrašas</h2>
    <?php if (isset($_GET['error']) && $_GET['error'] == 2) { ?>
        <div class="alert alert-danger" role="alert">
            Parduotuvė nebuvo pašalinta. Pirma reikia pašalinti tą parduotuvę iš kitų lentelių.
        </div>
    <?php } ?>
    <table class="table">
        <thead>
        <tr style="background: #bfeeff">
            <th>Pavadinimas</th>
            <th>Adresas</th>
            <th>Telefonas</th>
            <th>E.Paštas</th>
            <th>Pašto kodas</th>
            <th style="text-align: right">
                <a href="index.php?module=parduotuve&action=add">
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
                <td>{$item['adresas']}</td>
                <td>{$item['telefonas']}</td>
                <td>{$item['e_pastas']}</td>
                <td>{$item['pasto_kodas']}</td>
                <td align="right">
                  <a href='index.php?module=parduotuve&action=edit&id={$item['nr']}'>
                    <button type="button" class="btn btn-warning">Readaguoti</button>
                  </a>
                  <a href='#' onclick="showConfirmDialog('{$module}', '{$item['nr']}'); return false;">
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





