<div class="container" style="width: 100%">
    <h2>Darbuotojo pridėjimas</h2>
    <?php
    if (isset($_GET['error']) && $_GET['error'] == 1) {
        echo <<<HTML
<div class="alert alert-danger" role="alert">
            Neteisingai suvesti duomenys arba nepavyko pasiekti duomenų bazės.
</div>
HTML;
    } elseif (isset($_GET['error']) && $_GET['error'] == 2) {
        echo <<<HTML
<div class="alert alert-danger" role="alert">
            Vieno ar kelių įrašu nepavyko išsaugoti;
</div>
HTML;
    }

    if (isset($data) && is_array($data['asmens_kodas'])) {
        $data['asmens_kodas'] = $data['asmens_kodas'][0];
        $data['vardas'] = $data['vardas'][0];
        $data['pavarde'] = $data['pavarde'][0];
        $data['dirba_nuo'] = $data['dirba_nuo'][0];
        $data['atlyginimas'] = $data['atlyginimas'][0];
        $data['adresas'] = $data['adresas'][0];
        $data['telefonas'] = $data['telefonas'][0];
        $data['elektroninis_pastas'] = $data['elektroninis_pastas'][0];
        $data['pareigos'] = $data['pareigos'][0];
        $data['fk_PARDUOTUVEnr'] = $data['fk_PARDUOTUVEnr'][0];
    }

    ?>
    <form action="" method="post">
        <div class="container">
            <label for="city2">Pasirinkite parduotuvę</label>

            <select name="fk_PARDUOTUVEnr" class="form-control" id="empl" style="width: 40%">
                <?php
                include 'services/parduotuve.php';
                $pardService = new parduotuve();

                $parduotuves = $pardService->getAllShops();

                foreach ($parduotuves as $key => $val) {
                    $selected = "";
                    if (isset($data['fk_PARDUOTUVEnr']) && $data['fk_PARDUOTUVEnr'] == $val['nr']) {
                        $selected = " selected='selected'";
                    }
                    echo <<<HTML
                    <option{$selected} value="{$val['nr']}">{$val['nr']} > {$val['pavadinimas']}</option>
                    HTML;
                }
                ?>
            </select>
            <table id="parent" style="width: 100%">
                <tr>
                    <th style="<?php echo $action === 'edit' ? 'display: none' : '' ?>">Asmens kodas</th>
                    <th>Vardas</th>
                    <th>Pavardė</th>
                    <th>Dirba nuo</th>
                    <th>Atlyginimas</th>
                    <th>Adresas</th>
                    <th>Telefonas</th>
                    <th>E.Paštas</th>
                    <th>Pareigos</th>
                </tr>
                <tr>
                    <td style="<?php echo $action === 'edit' ? 'display: none' : '' ?>">
                        <input type="text" class="form-control" id="asmens_kodas" name="asmens_kodas[]"
                               value="<?php echo(isset($data['asmens_kodas']) ? $data['asmens_kodas'] : ''); ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" id="vardas" name="vardas[]"
                               value="<?php echo(isset($data['vardas']) ? $data['vardas'] : ''); ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" id="pavarde" name="pavarde[]"
                               value="<?php echo(isset($data['pavarde']) ? $data['pavarde'] : ''); ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" id="dirba_nuo" name="dirba_nuo[]"
                               value="<?php echo(isset($data['dirba_nuo']) ? $data['dirba_nuo'] : ''); ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" id="atlyginimas" name="atlyginimas[]"
                               value="<?php echo(isset($data['atlyginimas']) ? $data['atlyginimas'] : ''); ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" id="adresas" name="adresas[]"
                               value="<?php echo(isset($data['adresas']) ? $data['adresas'] : ''); ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" id="telefonas" name="telefonas[]"
                               value="<?php echo(isset($data['telefonas']) ? $data['telefonas'] : ''); ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" id="elektroninis_pastas" name="elektroninis_pastas[]"
                               value="<?php echo(isset($data['elektroninis_pastas']) ? $data['elektroninis_pastas'] : ''); ?>">
                    </td>
                    <td>
                        <select name="pareigos[]" class="form-control">
                            <?php
                            include 'services/pareigos.php';
                            $pareigService = new pareigos();

                            $pareigos = $pareigService->getAllDuties();

                            foreach ($pareigos as $key => $val)  {
                                $selected = "";
                                if(isset($data['pareigos']) && $data['pareigos'] == $val['id_darbuotojo_pareigos']) {
                                    $selected = " selected='selected'";
                                }

                                echo <<<HTML
                                <option{$selected} value="{$val['id_darbuotojo_pareigos']}">{$val['id_darbuotojo_pareigos']} > {$val['name']}</option>
                                HTML;

                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <?php
                if($action === 'add')
                {
                    echo <<<HTML
                    <tr id="childRow" style="display: none">
                        <td>
                            <input type="text" class="form-control" name="asmens_kodas[]">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="vardas[]">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="pavarde[]">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="dirba_nuo[]">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="atlyginimas[]">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="adresas[]">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="telefonas[]">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="elektroninis_pastas[]">
                        </td>
                        <td>
                            <select name="pareigos[]" class="form-control" id="">
                    HTML;
//                            include 'services/pareigos.php';
//                            $pareigService = new pareigos();
//
//                            $pareigos = $pareigService->getAllDuties();

                            foreach ($pareigos as $key => $val) {
                                $selected = "";
                                if (isset($data['id_darbuotojo_pareigos']) && $data['id_darbuotojo_pareigos'] == $val['id_darbuotojo_pareigos']) {
                                    $selected = " selected='selected'";
                                }
                                echo <<<HTML
                                <option{$selected} value="{$val['id_darbuotojo_pareigos']}">{$val['id_darbuotojo_pareigos']} > {$val['name']}</option>
                                HTML;
                            }
                            echo <<<HTML
                            </select>
                        </td>
                        <td>
                            <button id="removeChild" onclick="removeRow(this);" class="btn btn-danger" type="button">Pašalinti</button>
                        </td>
                    </tr>
                    HTML;
                }
                ?>
            </table>
            <button class="btn btn-info addChild" style="width: 40%; margin-top: 1%; <?php echo $action != 'add' ? 'display: none' : '' ?>" type="button">Pradėti</button>
        </div>
        <button style="width: 39%; margin-left: 1.5%; margin-top: 1%" type="submit" class="btn btn-success" name="submit" value="Issaugoti">Išsaugoti
    </form>
</div>