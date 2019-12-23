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
    <table>
        <tr>
            <td style="width: 5%">
                
            </td>
            <td colspan="6" style="width: 20%; padding-left: 7px;">
                
            </td>
            <td colspan="4" style="text-align: center; width: 40%;">
                FORMULIR <br>
                TECHNOLOGY EXAMINATION
            </td>
            <td colspan="3" style="padding: 7px 0; padding-left: 7px;">
                No Formulir <br>
                No Revisi <br>
                Tanggal <br>
                Halaman
            </td>
        </tr>
        <tr>
            <td>Kepada</td>
            <td colspan="8">: Pengelola Sistem</td>
            <td>Nomor</td>
            <td colspan="4">: 000.<?= date('m') ?> / TO / ENJ / UP .. / <?= date('Y') ?></td>
        </tr>
        <tr>
            <td>Dari</td>
            <td colspan="8">: Technology Owner</td>
            <td>Tanggal</td>
            <td colspan="4">: <?= date('d M Y') ?></td>
        </tr>
        <tr>
            <td>Perihal</td>
            <td colspan="13">: Hasil Pengukuran</td>
        </tr>
        <tr>
            <td colspan="14" style="padding: 7px 0;"></td>
        </tr>
        <tr style="text-align: center"">
            <td colspan="12">DATA PERALATAN</td>
            <td colspan="2">STATUS</td>
        </tr>
        <tr>
            <td colspan="3">Nama Peralatan</td>
            <td colspan="9">: <?= $input['nama_peralatan'] ?></td>
            <td colspan="2" rowspan="2">
                tes
            </td>
        </tr>
        <tr>
            <td colspan="3">No KKS</td>
            <td colspan="9">: <?= $input['kks_number'] ?></td>
        </tr>
        <tr>
            <td colspan="3">MPI</td>
            <td colspan="9">: <?= $input['mpi'] ?></td>
            <td colspan="2" rowspan="3">
                
            </td>
        </tr>
        <tr>
            <td colspan="3">Spesifikasi A</td>
            <td colspan="5">: <?= $input['spek_a'] ?></td>
            <td>Spesifikasi C</td>
            <td colspan="3">: <?= $input['spek_c'] ?></td>
            
        </tr>
        <tr>
            <td colspan="3">Spesifikasi B</td>
            <td colspan="5">: <?= $input['spek_b'] ?></td>
            <td>Spesifikasi D</td>
            <td colspan="3">: <?= $input['spek_d'] ?></td>
        </tr>
        <tr style="text-align: center">
            <td colspan="10">GENERAL DRAWING PERALATAN & TITIK PENGUKURAN</td>
            <td colspan="4">FOTO PERALATAN</td>
        </tr>
        <tr>
            <td colspan="10"></td>
            <td colspan="4"></td>
        </tr>
        <tr style="text-align: center">
            <td colspan="14">FINDING</td>
        </tr>
        <tr>
            <td colspan="14"></td>
        </tr>
        <tr style="text-align: center">
            <td colspan="14">DIAGNOSE</td>
        </tr>
        <tr>
            <td colspan="14"></td>
        </tr>
        <tr style="text-align: center">
            <td colspan="14">ANALYSIS</td>
        </tr>
        <tr>
            <td colspan="14"></td>
        </tr>
        <tr style="text-align: center">
            <td colspan="14">RECOMMENDATION</td>
        </tr>
        <tr>
            <td colspan="14"></td>
        </tr>
        <tr>
            <td colspan="6"></td>
            <td colspan="4"></td>
            <td colspan="4"></td>
        </tr>
    </table>
</div>