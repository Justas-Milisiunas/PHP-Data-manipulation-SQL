<div class="container" style="width:20%; text-align: center;">
    <h2>Parduotuvės pridėjimas</h2>
    <?php if (isset($_GET['error']) && $_GET['error'] == 1) { ?>
        <div class="alert alert-danger" role="alert">
            Neteisingai suvesti duomenys.
        </div>
    <?php } ?>
    <form action="" method="post">
        <div class="form-group">
            <label for="name">Pavadinimas:</label>
            <input type="text" class="form-control" name="pavadinimas" value="<?php echo (isset($data['pavadinimas']) ? $data['pavadinimas'] : ''); ?>">
            <label for="name">Adresas:</label>
            <input type="text" class="form-control" name="adresas" value="<?php echo (isset($data['adresas']) ? $data['adresas'] : ''); ?>">
            <label for="name">Telefonas</label>
            <input type="text" class="form-control" name="telefonas" value="<?php echo (isset($data['telefonas']) ? $data['telefonas'] : ''); ?>">
            <label for="name">E.Paštas:</label>
            <input type="text" class="form-control" name="e_pastas" value="<?php echo (isset($data['e_pastas']) ? $data['e_pastas'] : ''); ?>">
            <label for="name">Dirba nuo:</label>
            <input type="text" class="form-control" name="dirba_nuo" value="<?php echo (isset($data['dirba_nuo']) ? $data['dirba_nuo'] : ''); ?>">
            <label for="name">Pašto kodas:</label>
            <input type="text" class="form-control" name="pasto_kodas" value="<?php echo (isset($data['pasto_kodas']) ? $data['pasto_kodas'] : ''); ?>">
            <label for="name">Darbuotojų skaičius:</label>
            <input type="text" class="form-control" name="darbuotoju_skaicius" value="<?php echo (isset($data['darbuotoju_skaicius']) ? $data['darbuotoju_skaicius'] : ''); ?>">
            <label for="city2">Pasirinkite miestą</label>
            <select name="fk_MIESTASid_MIESTAS" class="form-control" id="city2">
                <?php
                include 'services/miestas.php';
                $miestasService = new miestas();

                $miestai = $miestasService->getAllCities();
                foreach($miestai as $key => $val) {
                    $selected = "";
                    if(isset($data['fk_MIESTASid_MIESTAS']) && $data['fk_MIESTASid_MIESTAS'] == $val['id_MIESTAS']) {
                        $selected = " selected='selected'";
                    }
                    echo "<option{$selected} value='{$val['id_MIESTAS']}'>{$val['pavadinimas']}</option>";
                }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-success" name="submit" value="Issaugoti" style="width: 100%">Išsaugoti</button>
    </form>
</div>