<div class="container" style="width: 40%">
    <h2>Sąkaitos pridėjimas</h2>
    <?php
    if (isset($_GET['error']) && $_GET['error'] == 1) {
        ?>
        <div class="alert alert-danger" role="alert">
            Neteisingai suvesti sąskaitos duomenys
        </div><?php
    } elseif (isset($_GET['error']) && $_GET['error'] == 2) {
        ?>
        <div class="alert alert-danger" role="alert">
            Neteisingai suvesti mokėjimų duomenys
        </div><?php
    }
    ?>
    <form action="" method="post">
        <div class="form-group">
            <label>Darbuotojas kuris bus atsakingas už šios sąskaitos patvirtinimą</label>
            <select name="fk_DARBUOTOJASasmens_kodas" class="form-control">
                <?php
                include 'services/darbuotojas.php';
                $darbuotojuService = new darbuotojas();
                $darbuotojai = $darbuotojuService->getAllEmployees();

                foreach ($darbuotojai as $key => $val) {
                    $selected = "";
                    if (isset($data['fk_DARBUOTOJASasmens_kodas']) && $data['fk_DARBUOTOJASasmens_kodas'] == $val['asmens_kodas']) {
                        $selected = " selected='selected'";
                    }

                    echo "<option{$selected} value='{$val['asmens_kodas']}'>{$val['vardas']} {$val['pavarde']}</option>";
                }
                ?>
            </select>
            <label style="margin-top: 1%">Klientas</label>
            <select name="fk_KLIENTASasmens_kodas" class="form-control">
                <?php
                include 'services/klientas.php';
                $klientuService = new klientas();
                $klientai = $klientuService->getAllClients();

                foreach ($klientai as $key => $val) {
                    $selected = "";
                    if (isset($data['fk_KLIENTASasmens_kodas']) && $data['fk_KLIENTASasmens_kodas'] == $val['asmens_kodas']) {
                        $selected = " selected='selected'";
                    }

                    echo "<option{$selected} value='{$val['asmens_kodas']}'>{$val['vardas']} {$val['pavarde']}</option>";
                }
                ?>
            </select>
            <label style="margin-top: 1%">Sąskaitos suma:</label>
            <input type="text" class="form-control" name="suma"
                   value="<?php echo isset($data['suma']) ? $data['suma'] : '' ?>">
            <fieldset class="border p-2">
                <legend class="w-auto">Mokėjimai</legend>
                <table id="parent">
                    <tr id="childRowHeader" style="display: none">
                        <td style="padding: 5px 10px 5px 10px">Suma</td>
                    </tr>
                    <?php
                    if (empty($data['sumaMok'])) {
                        ?>
                        <tr id="childRow" style="display: none">
                            <td style="padding: 5px 10px 5px 10px">
                                <input type="text" class="form-control" id="suma" name="sumaMok[]">
                            </td>
                            <td>
                                <button id="removeChild" onclick="removeRow(this);" class="btn btn-danger"
                                        type="button">
                                    Pašalinti
                                </button>
                            </td>
                        </tr>
                        <?php
                    } else {
                        foreach ($data['sumaMok'] as $item) {
                            if(empty($item))
                                continue;
                            ?>
                            <script>document.getElementById('childRowHeader').style.display = '';</script>
                            <tr id="childRow">
                                <td style="padding: 5px 10px 5px 10px">
                                    <input type="text" class="form-control" id="sumaMok" name="sumaMok[]"
                                           value="<?php echo $item; ?>">
                                </td>
                                <td>
                                    <button id="removeChild" onclick="removeRow(this);" class="btn btn-danger"
                                            type="button">
                                        Pašalinti
                                    </button>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </table>
                <button class="btn btn-info addChild"
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

