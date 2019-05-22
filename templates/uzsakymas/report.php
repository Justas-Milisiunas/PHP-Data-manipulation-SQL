<div class="container" style="width:50%; text-align: center">
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
                <label for="name">Žaislų kiekis nuo:</label>
                <input type="number" class="form-control" name="kiekis_nuo">
                <label for="name">Žaislų kiekis iki:</label>
                <input type="number" class="form-control" name="kiekis_iki">
            </div><x></x>
            <button type="submit" class="btn btn-success" name="submit" value="Issaugoti" style="width: 100%">Sudaryti
                ataskaitą
            </button>
        </form>
    <?php } else {
        echo "
        <br>
        Užsakymo sudarymo laikotarpis: nuo {$limits[0]} iki {$limits[1]}
        <br>
        Žaislu kiekis: nuo: {$limits[2]} iki {$limits[3]}
        ";
        ?>
        <table class="table" style="margin-top: 4%">
            <tr style="background: #bfeeff">
                <th>Fabriko pavadinimas</th>
                <th>Užsakymo būsena</th>
                <th>Užsakymo data</th>
                <th>Žaislų kiekis</th>
            </tr>
            <?php foreach ($data as $row) {
                echo "
                <tr>
                    <td>{$row['fabrikas']}</td>
                    <td>{$row['busena']}</td>
                    <td>{$row['data']}</td>
                    <td>{$row['kiekis']}</td>
                </tr>
                ";
            } ?>
        </table>
    <?php } ?>
</div>