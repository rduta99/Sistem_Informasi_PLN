<style>
    div {
        font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }

    table {
        border: 1px solid black;
        border-collapse: collapse;
        font-size: 11px;
        width: 100%;
    }

    td {
        border: 1px solid black;
        padding: 5px;
    }

    td#no {
        border: none;
    }
</style>

<div>
    <?php 

    $to = ''; foreach($tool as $k) { 
    $db = $this->db->query('SELECT * FROM log_ukur WHERE id_tools = '.$k->id_tools.' AND MONTH(waktu) = '.$data[1].' AND YEAR(waktu) = '.$data[0]);

    ?>
        <table>
            <tr style="text-align:center">
            <td rowspan="2">
                No.
            </td>
            <td rowspan="2">
                Equipment
            </td>
            <td rowspan="2">
                Tanggal Pengukuran
            </td>
            <td colspan="5" >
                <?= $k->nama_teknologi ?> <span style="color:red">(satuan)</span>
            </td>
            <td rowspan="2">
                Parameter Operasi
            </td>
            <td rowspan="2" >
                Status Peralatan
            </td>
            <td rowspan="2">
                No. Rekomendasi
            </td>
        </tr>
        <tr style="text-align:center">
            <td>
                Standar
            </td>
            <?php
            foreach($eq as $b) {
                $no = 0;
                $ab = $this->db->query('SELECT * FROM log_ukur WHERE id_histori = '.$b->id_pengukuran)->result(); 
                foreach ($ab as $n) {
            ?>
            <td>
                <?= "Titik ".++$no ?>
            </td>
            <?php } } ?>
        </tr>
        <?php 

            $no = 0; foreach($eq as $b) { 
            
        ?>
        <tr>
            <td>
                <?= ++$no.'.'; ?> 
            </td>
            <td>
                <?= $b->desk ?>
            </td>
            <td>
                <?= date('d M Y', strtotime($b->waktu)) ?>
            </td>
            <td>
            </td>
            <?php 
                $ab = $this->db->query('SELECT * FROM log_ukur WHERE id_histori = '.$b->id_pengukuran)->result(); 
                foreach ($ab as $n) {
            ?>
            <td>
                <?= $n->angka ?>
            </td>
            <?php } ?>
            <td>
            </td>
            <td>
            </td>
            <td>

            </td>
            <td>
            </td>
            <td>
            </td>
        </tr>
        <?php } ?>
        
    </table>
    <br>
        <?php } ?>
</div>

