<div class="container" style="width:35%; text-align: center;">
    <h2>Miesto pridejimas</h2>
    <?php if (isset($_GET['error']) && $_GET['error'] == 1) { ?>
        <div class="alert alert-danger" role="alert">
            Neteisingai suvesti duomenys.
        </div>
    <?php } ?>
    <form action="" method="post">
        <div class="form-group">
            <label for="name">Miesto pavadinimas:</label>
            <input type="text" class="form-control" id="pavadinimas" name="pavadinimas" value="<?php echo (isset($data['pavadinimas']) ? $data['pavadinimas'] : ''); ?>">
        </div>
        <button type="submit" class="btn btn-success" name="submit" value="Issaugoti" style="width: 100%">Išsaugoti</button>
    </form>
</div>