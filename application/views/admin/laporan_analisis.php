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
        /* border: 1px solid black; */
        padding: 3px;
    }

    .border {
        border: 1px solid black !important;
    }
</style>

<div>
    <table>
        <tr>
            <td style="width: 5%; border: none">
                <img height="50" src="<?= base_url('assets/dist/img/Logo_PLN.png') ?>" alt="" srcset="">
            </td>
            <td colspan="6" style="width: 20%; padding-left: 7px;">
                PT PLN (Persero) <br>
                UIK Sumbagsel <br>
                UP
            </td>
            <td colspan="4" class="border" style="text-align: center;">
                FORMULIR <br>
                TECHNOLOGY EXAMINATION
            </td>
            <td colspan="3" class="border" style="padding: 7px 0; padding-left: 7px;">
                No Formulir <br>
                No Revisi <br>
                Tanggal <br>
                Halaman
            </td>
        </tr>
        <tr>
            <td colspan="14" class="border" style="padding: 10px;"></td>
        </tr>
        <tr>
            <td>Kepada</td>
            <td colspan="8">: Pengelola Sistem</td>
            <td style="width: 10%">Nomor</td>
            <td colspan="4">: 000.<?= date('m', strtotime($input->waktu)) ?> / TO / ENJ / UP .. / <?= date('Y', strtotime($input->waktu)) ?></td>
        </tr>
        <tr>
            <td>Dari</td>
            <td colspan="8">: Technology Owner</td>
            <td>Tanggal</td>
            <td colspan="4">: <?= date('d M Y', strtotime($input->waktu)) ?></td>
        </tr>
        <tr>
            <td>Perihal</td>
            <td colspan="13">: Hasil Pengukuran</td>
        </tr>
        <tr>
            <td colspan="14" class="border" style="padding: 10px;"></td>
        </tr>   
        <tr style="text-align: center;">
            <td colspan="12" class="border">DATA PERALATAN</td>
            <td colspan="2" class="border">STATUS</td>
        </tr>
        <tr>
            <td colspan="3">Nama Peralatan</td>
            <td colspan="9">: <?= $input->desk ?></td>
            <td colspan="2" class="border" rowspan="2">
                tes
            </td>
        </tr>
        <tr>
            <td colspan="3">No KKS</td>
            <td colspan="9">: <?= $input->kks_number ?></td>
        </tr>
        <tr>
            <td colspan="3">MPI</td>
            <td colspan="9">: <?= $input->mpi ?></td>
            <td colspan="2" class="border" rowspan="3">
                
            </td>
        </tr>
        <tr>
            <td colspan="3">Spesifikasi A</td>
            <td colspan="5">: <?= $input->spek_a ?></td>
            <td>Spesifikasi C</td>
            <td colspan="3">: <?= $input->spek_c ?></td>
            
        </tr>
        <tr>
            <td colspan="3">Spesifikasi B</td>
            <td colspan="5">: <?= $input->spek_b ?></td>
            <td>Spesifikasi D</td>
            <td colspan="3">: <?= $input->spek_d ?></td>
        </tr>
        <tr style="text-align: center">
            <td colspan="10" class="border">GENERAL DRAWING PERALATAN & TITIK PENGUKURAN</td>
            <td colspan="4" class="border">FOTO PERALATAN</td>
        </tr>
        <tr>
            <td colspan="10"><?= $input->general_draw ?></td>
            <td colspan="4"></td>
        </tr>
        <tr style="text-align: center">
            <td colspan="14" class="border">FINDING</td>
        </tr>
        <tr>
            <td colspan="14"><?= $input->finding ?></td>
        </tr>
        <tr style="text-align: center">
            <td colspan="14" class="border">DIAGNOSE</td>
        </tr>
        <tr>
            <td colspan="14"><?= $input->diagnose ?></td>
        </tr>
        <tr style="text-align: center">
            <td colspan="14" class="border">ANALYSIS</td>
        </tr>
        <tr>
            <td colspan="14"><?= $input->analysis ?></td>
        </tr>
        <tr style="text-align: center">
            <td colspan="14" class="border">RECOMMENDATION</td>
        </tr>
        <tr>
            <td colspan="14"><?= $input->recommendation ?></td>
        </tr>
        <tr>
            <td colspan="6"></td>
            <td colspan="4"></td>
            <td colspan="4"></td>
        </tr>
    </table>
</div>