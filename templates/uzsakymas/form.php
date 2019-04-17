<div class="container" style="width: 40%">
    <h2>Užsakymo pridėjimas</h2>
    <?php
    if (isset($_GET['error']) && $_GET['error'] == 1) {
        echo <<<HTML
        <div class="alert alert-danger" role="alert">
            Neteisingai suvesti duomenys
        </div>
HTML;
    }
    ?>
    <form action="" method="post">
        <div class="form-group">
            <label>Užsakančioji parduotuvė:</label>
            <select name="fk_PARDUOTUVESnr" class="form-control">
                <?php
                include 'services/parduotuve.php';
                $pardService = new parduotuve();

                $parduotuves = $pardService->getAllShops();
                foreach($parduotuves as $key => $val) {
                    $selected = "";
                    if(isset($data['fk_PARDUOTUVESnr']) && $data['fk_PARDUOTUVESnr'] == $val['nr']) {
                        $selected = " selected='selected'";
                    }
                    echo "<option{$selected} value='{$val['nr']}'>{$val['pavadinimas']}</option>";
                }
                ?>
            </select>
            <label style="margin-top: 1%">Užsakymo žaislų gaminimo fabrikas:</label>
            <select name="fk_MIESTASid_MIESTAS" class="form-control">
                <?php
                include 'services/fabrikas.php';
                $fabrikService = new fabrikas();

                $fabrikai = $fabrikService->getAllFactories();
                foreach($fabrikai as $key => $val) {
                    $selected = "";
                    if(isset($data['fk_FABRIKASid_FABRIKAS']) && $data['fk_FABRIKASid_FABRIKAS'] == $val['id_FABRIKAS']) {
                        $selected = " selected='selected'";
                    }
                    echo "<option{$selected} value='{$val['id_FABRIKAS']}'>{$val['pavadinimas']}</option>";
                }
                ?>
            </select>
            <label style="margin-top: 1%">Užsakymo būsena</label>
            <select name="busena" class="form-control">
                <?php
                $busenos = $uzsakService->getAllStatuses();
                foreach($busenos as $key => $val) {
                    $selected = "";
                    if(isset($data['busena']) && $data['busena'] == $val['id_uzsakymo_busenos']) {
                        $selected = " selected='selected'";
                    }
                    echo "<option{$selected} value='{$val['id_uzsakymo_busenos']}'>{$val['name']}</option>";
                }
                ?>
            </select>
            <table>
                <tr>
                    <th>Žaislo pavadinimas</th>
                    <th>Kiekis</th>
                </tr>
                <tr>
                    <td>

                    </td>
                    <td>
                        <input type="text" class="form-control" id="kiekis" name="kiekis[]"
                               value="<?php echo(isset($data['kiekis']) ? $data['kiekis'] : ''); ?>">
                    </td>
                </tr>
            </table>
        </div>
    </form>
</div>

