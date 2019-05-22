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
            <th>Užsakiusi parduotuvė</th>
            <th>Užsakytas fabrikas</th>
            <th style="width: 25%; text-align: right">
                <a href="index.php?module=uzsakymas&action=report">
                    <button type="button" class="btn btn-success">Sukurti ataskaitą</button>
                </a>
            </th>
            <th style="text-align: right">
                <a href="index.php?module=uzsakymas&action=add">
                    <button type="button" class="btn btn-success">Pridėti</button>
                </a>
            </th>
        </tr>
        </thead>
        <tbody>
        <?php
        include 'services/fabrikas.php';
        include 'services/parduotuve.php';
        $fabrikuService = new fabrikas();
        $pardService = new parduotuve();

        foreach ($data as $item) {
            $fabrikas = $fabrikuService->getFactory($item['fk_FABRIKASid_FABRIKAS'])[0]['pavadinimas'];
            $parduotuve = $pardService->getShop($item['fk_PARDUOTUVEnr'])[0]['pavadinimas'];

            $busena = '';
            switch ($item['busena']) {
                case 1:
                    $busena = 'užsakyta';
                    break;
                case 2:
                    $busena = 'patvirtinta';
                    break;
                case 3:
                    $busena = 'nutraukta';
                    break;
                case 4:
                    $busena = 'užbaigta';
                    break;
            }
            ?>
            <tr>
                <td><?php echo $item['uzsakymo_data']; ?></td>
                <td><?php echo $busena; ?></td>
                <td><?php echo $parduotuve; ?></td>
                <td><?php echo $fabrikas; ?></td>
                <td style="text-align: right">
                    <a href='<?php echo "index.php?module={$module}&action=edit&id={$item['nr']}"; ?>'>
                    <button type="button" class="btn btn-warning">Readaguoti</button>
                    </a>
                </td>
                <td align="right">
                    <a href='#' onclick="showConfirmDialog('<?php echo $module; ?>', '<?php echo $item['nr']; ?>'); return false;">
                        <button type="button" class="btn btn-danger">Pašalinti</button>
                    </a>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    <?php include 'templates/paging.php'?>
</div>





