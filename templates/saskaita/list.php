<div style="width: 50%; margin: auto">
    <h2>Sąskaitų sąrašas</h2>
    <?php if (isset($_GET['error']) && $_GET['error'] == 2) { ?>
        <div class="alert alert-danger" role="alert">
            Sąskaita nebuvo pašalinta. Pirma reikia pašalinti tą sąskaita iš kitų lentelių.
        </div>
    <?php } ?>
    <table class="table">
        <thead>
        <tr style="background: #bfeeff">
            <th>Klientas</th>
            <th>Sąskaitos sukurymo data</th>
            <th>Suma (€)</th>
            <th style="text-align: right">
                <a href="index.php?module=saskaita&action=add">
                    <button type="button" class="btn btn-success">Pridėti</button>
                </a>
            </th>
        </tr>
        </thead>
        <tbody>
<?php
include 'services/klientas.php';
$klientuService = new klientas();

foreach ($data as $item) {
    $klientas = $klientuService->getClient($item['fk_KLIENTASasmens_kodas']);

    echo <<<HTML
            <tr>
                <td>{$klientas['vardas']} {$klientas['pavarde']}</td>
                <td>{$item['data']}</td>
                <td>{$item['suma']}</td>
                <td align="right">
                  <a href='index.php?module={$module}&action=edit&id={$item['nr']}'>
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





