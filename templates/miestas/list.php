<div class="container">
    <h2>Miestu sarasas</h2>
    <?php if (isset($_GET['error']) && $_GET['error'] == 2) { ?>
        <div class="alert alert-danger" role="alert">
            Miestas nebuvo pasalintas. Pirma reikia pasalinti to miesto parduotuves.
        </div>
    <?php } ?>
    <table class="table">
        <thead>
        <tr style="background: #bfeeff">
            <th>Pavadinimas</th>
            <th style="text-align: right">
                <a href="index.php?module=miestas&action=add">
                    <button type="button" class="btn btn-success">Prideti</button>
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
                    <button type="button" class="btn btn-danger">Pasalinti</button>
                  </a>  
                </td>
            </tr>
    HTML;
}
?>
        </tbody>
    </table>
    <div class="container-fluid" style="display: flex; justify-content: center;">
        <?php include 'templates/paging.php'?>
    </div>
</div>





