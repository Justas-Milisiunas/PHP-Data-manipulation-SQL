<div style="width: 90vw; margin: auto">
    <h2>Darbuotojų sąrašas</h2>
    <?php if (isset($_GET['error']) && $_GET['error'] == 2) { ?>
        <div class="alert alert-danger" role="alert">
            Darbuotojas nebuvo pašalintas. Pirma reikia pašalinti tą darbuotoją iš kitų lentelių.
        </div>
    <?php } ?>
    <table class="table">
        <thead>
        <tr style="background: #bfeeff">
            <th>Vardas</th>
            <th>Pavarde</th>
            <th>Dirba nuo</th>
            <th>Atlyginimas</th>
            <th>Adresas</th>
            <th>Telefonas</th>
            <th>E.Paštas</th>
            <th style="text-align: right">
                <a href="index.php?module=darbuotojas&action=add">
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
                <td>{$item['vardas']}</td>
                <td>{$item['pavarde']}</td>
                <td>{$item['dirba_nuo']}</td>
                <td>{$item['atlyginimas']}</td>
                <td>{$item['adresas']}</td>
                <td>{$item['telefonas']}</td>
                <td>{$item['elektroninis_pastas']}</td>
                <td align="right">
                  <a href='index.php?module={$module}&action=edit&id={$item['asmens_kodas']}'>
                    <button type="button" class="btn btn-warning">Readaguoti</button>
                  </a>
                  <a href='#' onclick="showConfirmDialog('{$module}', '{$item['asmens_kodas']}'); return false;">
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





