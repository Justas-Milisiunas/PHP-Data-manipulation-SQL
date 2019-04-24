<div class="container" style="width: 40%">
    <h2>Užsakymo pridėjimas</h2>
    <?php
    if (isset($_GET['error'])) {
        ?>
        <div class="alert alert-danger" role="alert">
            Neteisingai suvesti duomenys
        </div>
        <?php
    }
    ?>
    <form action="" method="post">
        <div class="form-group">
            <label>Užsakančioji parduotuvė:</label>
            <select name="fk_PARDUOTUVEnr" class="form-control">
                <?php
                include 'services/parduotuve.php';
                $pardService = new parduotuve();

                $parduotuves = $pardService->getAllShops();
                foreach ($parduotuves as $key => $val) {
                    $selected = "";
                    if (isset($data['fk_PARDUOTUVEnr']) && $data['fk_PARDUOTUVEnr'] == $val['nr']) {
                        $selected = " selected='selected'";
                    }
                    echo "<option{$selected} value='{$val['nr']}'>{$val['pavadinimas']}</option>";
                }
                ?>
            </select>
            <label>Užsakytų žaislų gaminimo fabrikas:</label>
            <select name="fb_FABRIKASid_FABRIKAS" class="form-control">
                <?php
                include 'services/fabrikas.php';
                $fabrikService = new fabrikas();

                $fabrikai = $fabrikService->getAllFactories();
                foreach ($fabrikai as $key => $val) {
                    $selected = "";
                    if (isset($data['fk_FABRIKASid_FABRIKAS']) && $data['fk_FABRIKASid_FABRIKAS'] == $val['id_FABRIKAS']) {
                        $selected = " selected='selected'";
                    }
                    echo "<option{$selected} value='{$val['id_FABRIKAS']}'>{$val['pavadinimas']}</option>";
                }
                ?>
            </select>
            <label>Užsakymo būsena:</label>
            <select name="busena" class="form-control">
                <?php
                $busenos = $uzsakService->getAllStatuses();
                foreach ($busenos as $key => $val) {
                    $selected = "";
                    if (isset($data['busena']) && $data['busena'] == $val['id_uzsakymo_busenos']) {
                        $selected = " selected='selected'";
                    }
                    echo "<option{$selected} value='{$val['id_uzsakymo_busenos']}'>{$val['name']}</option>";
                }
                ?>
            </select>
            <fieldset class="border p-2">
                <legend class="w-auto">Žaislai</legend>
                <table id="parent">
                    <tr>
                        <th>Žaislo pavadinimas:</th>
                        <th>Kiekis:</th>
                    </tr>
                    <?php
                    if (isset($data['fk_ZAISLASid'])) {
                        foreach ($data['fk_ZAISLASid'] as $key => $value) {
                            ?>
                            <tr id="childRow">
                                <td>
                                    <select name="fk_ZAISLASid[]" class="form-control">
                                        <?php
                                        $zaisluService = new zaislas();
                                        $zaislai = $zaisluService->getAllToys();

                                        foreach ($zaislai as $k => $val) {
                                            $selected = "";
                                            if (isset($data['fk_ZAISLASid'][$key]) && $data['fk_ZAISLASid'][$key] == $val['id']) {
                                                $selected = " selected='selected'";
                                            }
                                            echo "<option{$selected} value='{$val['id']}'>{$val['pavadinimas']}</option>";
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="Kiekis[]"
                                           value="<?php echo $data['Kiekis'][$key] ?>">
                                </td>
                                <td>
                                    <button id="removeChild" onclick="removeRowLeavingOne(this);" class="btn btn-danger"
                                            type="button">
                                        Pašalinti
                                    </button>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        ?>
                        <tr id="childRow" style="<?php echo isset($_GET['error']) ? 'display: none' : ''; ?>">
                            <td>
                                <select name="fk_ZAISLASid[]" class="form-control">
                                    <?php
                                    $zaislai = $zaisluService->getAllToys();
                                    foreach ($zaislai as $key => $value) {
                                        $selected = "";
                                        if (isset($data['fk_ZAISLASid']) && $data['fk_ZAISLASid'] == $value['id']) {
                                            $selected = " selected='selected'";
                                        }
                                        echo "<option{$selected} value='{$value['id']}'>{$value['pavadinimas']}</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="Kiekis[]">
                            </td>
                            <td>
                                <button id="removeChild" onclick="removeRowLeavingOne(this);" class="btn btn-danger"
                                        type="button">
                                    Pašalinti
                                </button>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
                <button class="btn btn-info addChildWithoutResetting"
                        style="width: 33%; margin-top: 3%; margin-left: 10px <?php echo $action != 'add' ? 'display: none' : '' ?>"
                        type="button">Pridėti
                </button>
            </fieldset>
            <button class="btn btn-success" style="width: 33%; margin-top: 3%; margin-left: 10px" type="submit"
                    name="submit" value="Issaugoti">Išsaugoti
            </button>
        </div>
    </form>
</div>