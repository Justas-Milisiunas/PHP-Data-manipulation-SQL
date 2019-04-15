<div class="container" style="text-align: center; width: 60%">
    <h2>Žaislo pridėjimas</h2>
    <?php if (isset($_GET['error']) && $_GET['error'] == 1) {
        echo <<<HTML
        <div class="alert alert-danger" role="alert">
            Neteisingai suvesti duomenys arba nepavyko pasiekti duomenų bazės.
        </div>
        HTML;
    }

    if(isset($data) && is_array($data['pavadinimas'])) {
        $data['pavadinimas'] = $data['pavadinimas'][0];
        $data['svoris'] = $data['svoris'][0];
        $data['verte'] = $data['verte'][0];
    }
?>
    <form action="" method="post">
        <div class="form-group">
            <table id="parent">
                <tr>
                    <th>Žaislo pavadinimas:</th>
                    <th>Žaislo svoris:</th>
                    <th>Žaislo vertė:</th>
                    <th></th>
                </tr>
                <tr>
                    <td>
                        <input type="text" class="form-control" id="pavadinimas" name="pavadinimas[]"
                               value="<?php echo(isset($data['pavadinimas']) ? $data['pavadinimas'] : ''); ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" id="svoris" name="svoris[]"
                               value="<?php echo(isset($data['svoris']) ? $data['svoris'] : ''); ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" id="verte" name="verte[]"
                               value="<?php echo(isset($data['verte']) ? $data['verte'] : ''); ?>">
                    </td>
                    <td>
                        <!--                        <a href='#' onclick="showConfirmDialog('{$module}', '{$item['id']}'); return false;">-->
                        <!--                            <button type="button" class="btn btn-danger">Pašalinti</button>-->
                        <!--                        </a>-->
                    </td>
                </tr>
                <?php if($action === 'add')
                {
                    echo <<<HTML
                    <tr id="childRow" style="display: none;">
                        <td>
                            <input type="text" class="form-control" name="pavadinimas[]">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="svoris[]">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="verte[]">
                        </td>
                        <td>
                            <button id="removeChild" onclick="removeRow(this);" class="btn btn-danger" type="button">Pašalinti</button>
                        </td>
                    </tr>      
                    HTML;

                }
                ?>
            </table>
            <button class="btn btn-info addChild" style="width: 100%; margin-top: 3%; <?php echo $action != 'add' ? 'display: none' : '' ?>" type="button">Pridėti</button>
        </div>
        <button style="width: 100%" type="submit" class="btn btn-success" name="submit" value="Issaugoti">Išsaugoti
        </button>
    </form>
</div>