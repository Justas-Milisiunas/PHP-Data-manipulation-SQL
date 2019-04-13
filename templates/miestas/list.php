<div class="container">
    <h2>Miestu sarasas</h2>
    <table class="table">
        <thead>
        <tr>
            <th>Pavadinimas</th>
            <th style="text-align: right">
                <a href="index.php?module=miestas&action=create">
                    <button type="button" class="btn btn-success">Prideti</button>
                </a>
            </th>
        </tr>
        </thead>
        <tbody>
        <?php
        $data = mysql::select("SELECT * FROM miestas");
        foreach ($data as $item) {
            echo "<tr>
                    <td>" . $item['pavadinimas'] . "</td>
                    <td align='right'>
                        <a href='index.php?module=miestas&action=edit'>
                            <button type=\"button\" class=\"btn btn-warning\">Readaguoti</button>
                        </a>
                        <a href='index.php?module=miestas&action=remove'>
                            <button type=\"button\" class=\"btn btn-danger\">Pasalinti</button>
                        </a>
                    </td>

                  </tr>";
        }
        ?>
        </tbody>
    </table>
</div>


