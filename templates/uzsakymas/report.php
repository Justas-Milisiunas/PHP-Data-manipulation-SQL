<div class="container" style="width:100% !important; text-align: center">
    <h2>Užsakymų ataskaita:</h2>
    <?php if (isset($_GET['error']) && $_GET['error'] == 1) { ?>
        <div class="alert alert-danger" role="alert">
            Neteisingai suvesti duomenys.
        </div>
    <?php } ?>
    <?php
    if (empty($data)) { ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="name">Užsakymo sudarytos nuo:</label>
                <input type="date" class="form-control" name="nuo">
                <label for="name">Užsakymo sudarytos iki:</label>
                <input type="date" class="form-control" name="iki">
                <label for="name">Užsakymo būsena:</label>
                <select name="status" class="form-control">
                    <?php
                    include 'services/uzsakymas.php.php';
                    $orderService = new uzsakymas();
                    $ordersStatus = $orderService->getAllStatuses();
                    foreach ($ordersStatus as $key => $val) {
                        echo "<option value='{$val['id_uzsakymo_busenos']}'>{$val['name']}</option>";
                    }
                    ?>
                </select>
                <label for="name">Žaislų kiekis nuo:</label>
                <input type="number" class="form-control" name="kiekis_nuo">
                <label for="name">Žaislų kiekis iki:</label>
                <input type="number" class="form-control" name="kiekis_iki">
            </div>
            <x></x>
            <button type="submit" class="btn btn-success" name="submit" value="Issaugoti" style="width: 100%">Sudaryti
                ataskaitą
            </button>
        </form>
    <?php } else {
        $busName = $uzsakymuService->getStatusName($limits[4])['name'];
        echo "
        <br>
        Užsakymo sudarymo laikotarpis: nuo {$limits[0]} iki {$limits[1]}
        <br>
        Užsakymo būsena: {$busName}
        <br>
        Žaislu kiekis: nuo: {$limits[2]} iki {$limits[3]}
        ";
        ?>
        <table class="table" style="margin-top: 4%">
            <tr style="background: #bfeeff">
                <th>Užsakymo numeris</th>
                <th>Užsakymo data</th>
                <th>Užsakymo būsena</th>
                <th>Fabriko pavadinimas</th>
                <th>Žaislo pavadinimas</th>
                <th>Žaislo kiekis</th>
                <th>Žaislo vertė</th>
                <!--                <th>Žaislų kiekis</th>-->
            </tr>
            <?php
            $visu_uzsakymu_suma = 0;
            foreach ($data as $row) {
                $toys = $uzsakymuService->getOrderToys($row['id']);
                $toys = array_reverse($toys);

                $firstToy = array_pop($toys);
                $suma = $firstToy['verte'] * $firstToy['kiekis'];

                $verte = $firstToy['verte'] >= 1000 ? round(floatval($firstToy['verte']) / 1000, 2) + 'tūkst.' : $firstToy['verte'];
                echo "
                <tr>
                    <td>{$row['id']}</td>
                    <td>{$row['data']}</td>
                    <td>{$row['busena']}</td>
                    <td>{$row['fabrikas']}</td>
                    <td>{$firstToy['name']}</td>
                    <td>{$firstToy['kiekis']}</td>
                    <td>€ {$verte}</td>
                </tr>
                ";

                foreach ($toys as $toy) {
                    $suma += $toy['kiekis'] * $toy['verte'];
                    $verte = $toy['verte'] >= 1000 ? round(floatval($toy['verte']) / 1000, 2) + 'tūkst.' : $toy['verte'];
                    echo "
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>{$toy['name']}</td>
                        <td>{$toy['kiekis']}</td>
                        <td>€ {$verte}</td>
                    </tr>
                ";
                }
                $visu_uzsakymu_suma += $suma;
                echo "
                <tr style='font-weight: bold; background-color: #f2f7ff'>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Iš viso užsakyme:</td>
                    <td>{$row['kiekis']}</td>
                    <td>€ {$suma}</td>
                </tr>
                ";
            }
            echo "
            <tr style='font-weight: bold; background-color: #dce3f2'>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Visų užsakymų suma:</td>
                    <td>€ {$visu_uzsakymu_suma}</td>
                </tr>
            ";
            ?>
        </table>
    <?php } ?>
</div>