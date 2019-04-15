<div class="container" style="width: 50%">
    <h2>Žaislo pridėjimas</h2>
    <?php if (isset($_GET['error']) && $_GET['error'] == 1) { ?>
        <div class="alert alert-danger" role="alert">
            Neteisingai suvesti duomenys arba nepavyko pasiekti duomenų bazės.
        </div>
    <?php } ?>
    <form action="" method="post">
        <div class="form-group">
            <label for="name">Žaislo pavadinimas:</label>
            <input type="text" class="form-control" id="pavadinimas" name="pavadinimas" value="<?php echo (isset($data['pavadinimas']) ? $data['pavadinimas'] : ''); ?>">
            <label for="name">Žaislo svoris:</label>
            <input type="text" class="form-control" id="svoris" name="svoris" value="<?php echo (isset($data['svoris']) ? $data['svoris'] : ''); ?>">
            <label for="name">Žaislo vertė:</label>
            <input type="text" class="form-control" id="verte" name="verte" value="<?php echo (isset($data['verte']) ? $data['verte'] : ''); ?>">
        </div>
        <button type="submit" class="btn btn-success" name="submit" value="Issaugoti">Išsaugoti</button>
    </form>
</div>