<div style="width: 50%; margin: auto">
    <h2>Užsakymų sąrašas</h2>
    <?php if (isset($_GET['error']) && $_GET['error'] == 2) { ?>
        <div class="alert alert-danger" role="alert">
            Užsakymas nebuvo pašalintas. Pirma reikia pašalinti tą užsakymą iš kitų lentelių.
        </div>
    <?php } ?>
    <table class="table">
        <thead>
        <tr style="background: #bfeeff">
            <th>Užsakymo data</th>
            <th>Būsena</th>
            <th style="text-align: right">
                <a href="index.php?module=uzsakymas&action=add">
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
                <td>{$item['uzsakymo_data']}</td>
                <td>{$item['busena']}</td>
                <td align="right">
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





