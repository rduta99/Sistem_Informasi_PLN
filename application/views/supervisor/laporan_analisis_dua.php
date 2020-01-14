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

<?php print_r($eq); ?>

<div>
    <?php $to = ''; foreach($tool as $k) { ?>
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
            <td>
                Titik 1
            </td>
            <td>
                Titik 2
            </td>
            <td>
                Titik 3
            </td>
            <td>
                Titik...
            </td>
        </tr>
        <?php $no = 0; foreach($eq as $b) { ?>
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
            <?php $ab = $this->db->query('SELECT * FROM log_ukur WHERE id_histori = '.$b->id_pengukuran.' AND waktu = '.$b->waktu)->result(); print_r($ab); ?>
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

