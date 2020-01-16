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
    $db = $this->db->query('SELECT * FROM log_ukur WHERE id_tools = '.$k->id_tools.' AND MONTH(waktu) = '.$data[1].' AND YEAR(waktu) = '.$data[0])->result();
        if($db != null) {
            if($to == '' || $to != $k->id_tools) {
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
            <td colspan="6">
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
        
        <?php 

        $equipment = $this->db->query("SELECT * FROM histori_pengukuran INNER JOIN data_barang ON histori_pengukuran.id_equipment = data_barang.asset_id INNER JOIN log_ukur ON histori_pengukuran.id_pengukuran = log_ukur.id_histori WHERE log_ukur.id_tools = ".$k->id_tools." AND MONTH(histori_pengukuran.waktu) = ".$data[1]." AND YEAR(histori_pengukuran.waktu) = ".$data[0])->result();
        $eq = '';
        $no = 0;
        foreach($equipment as $c) {
            if($eq == '' || $eq != $c->id_pengukuran) {
                $angka = $this->db->query("SELECT * FROM log_ukur WHERE id_histori = ".$c->id_pengukuran." AND id_tools = ".$k->id_tools." AND MONTH(waktu) = ".$data[1]." AND YEAR(waktu) = ".$data[0])->result(); 
                $num = count($angka); 
                $nn = 1; 
                if($no == 0) {
        ?>
        <tr style="text-align:center">
            <td>
                Standar
            </td>
            <?php $cc = 0; foreach ($angka as $y) { ?>
            <td>
                Titik <?= ++$cc ?>
            </td>
        <?php }?>
        </tr>
        <?php } ?>

        <tr>
            <td>
                <?= ++$no ?>
            </td>
            <td>
                <?= $c->desk." | ".$c->id_histori." | ".$c->id_log ?>
            </td>
            <td>
                <?= date('d M Y', strtotime($c->waktu)) ?>
            </td>
            <td></td>
            <?php 

            foreach ($angka as $n) {
                if($num < 6) { 
                    if($num == $nn) { ?>

            <td colspan="<?= 6-$num ?>">
            <?php
                    } else {
                        echo "<td>";
                    } 
                } ++$nn;
            ?>
                <?= $n->angka ?>
            </td>
            <?php }?>
            <td>  
            </td>
            <td>
                <?php print_r($c); $con = ['', 'Good', 'Warning', 'Bad']; echo $con[$c->kondisi]; ?>
            </td>
            <td></td>
            
        </tr>
        <?php } $eq = $c->id_pengukuran; } ?>
        
        
    </table>
    <br>
        <?php } } $to = $k->id_tools; } ?>
</div>

