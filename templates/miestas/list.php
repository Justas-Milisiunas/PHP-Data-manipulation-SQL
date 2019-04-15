<div class="container">
    <h2>Miestų sąrašas</h2>
    <?php if (isset($_GET['error']) && $_GET['error'] == 2) { ?>
        <div class="alert alert-danger" role="alert">
            Miestas nebuvo pašalintas. Pirma reikia pašalinti to miesto parduotuves.
        </div>
    <?php } ?>
    <table class="table">
        <thead>
        <tr style="background: #bfeeff">
            <th>Pavadinimas</th>
            <th style="text-align: right">
                <a href="index.php?module=miestas&action=add">
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
                <td align="right">
                  <a href='index.php?module=miestas&action=edit&id={$item['id_MIESTAS']}'>
                    <button type="button" class="btn btn-warning">Readaguoti</button>
                  </a>
                  <a href='#' onclick="showConfirmDialog('{$module}', '{$item['id_MIESTAS']}'); return false;">
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





