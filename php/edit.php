<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
    exit;
}

include '../db/database.php';

$id = $_GET['id'];
$query = mysqli_query($db,"select * from data_client where id='$id'");

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    
    $name = $_POST['NamaPrincipal'];
    $jenis_jaminan = $_POST['JenisJaminan'];
    $nilai_jaminan = $_POST['NilaiJaminan'];
    $waktu_mulai = $_POST['JangkaWaktuMulai'];
    $waktu_akhir = $_POST['JangkaWaktuAkhir'];
    $waktu_klaim = $_POST['JangkaWaktuKlaim'];
    $obligee = $_POST['NamaObligee'];
    $pekerjaan = $_POST['NamaPekerjaan'];
    $cash_coll = $_POST['CashCollateral'];
        

    $result = mysqli_query($db, "UPDATE data_client SET `Nama Principal`='$name', `Jenis Jaminan`='$jenis_jaminan', `Nilai Jaminan`='$nilai_jaminan', `Jangka Waktu Mulai`='$waktu_mulai', 
    `Jangka Waktu Akhir`='$waktu_akhir', `Jangka Waktu Klaim`='$waktu_klaim', `Nama Obligee/Pemberi Kerja`='$obligee', `Nama Pekerjaan`='$pekerjaan', `Cash Collateral`='$cash_coll' WHERE id=$id");
    
    updateNomorUrut($db);
    header("Location: manage_data.php");
    exit;
}
if(isset($_POST['back'])) {
    header("Location: manage_data.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/output.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="/asset/logo/logo2.png">
    <title>Edit Data</title>
</head>
<body>
    <container id="edit-data" class="flex justify-center items-center w-full h-screen bg-slate-100">
        <main class="w-[800px] h-[500px] bg-white shadow-xl">
            <section class="flex flex-col items-center p-10 w-full h-full">
                <h1 class="font-semibold text-xl mb-10">Edit Data Client</h1>
            <?php while($client = mysqli_fetch_array($query)){ ?>

                    <form action="edit.php" method="POST" class="w-full">
                        <table class="text-lg w-full">
                            <tr class="border-b-2">			
                                <td class="px-5">Nama Principal</td>
                                <td>
                                    <input type="hidden" name="id" value="<?php echo ($client['id']); ?>">
                                    <label for="nama">: </label>
                                    <input type="text" name="NamaPrincipal" value="<?php echo $client['Nama Principal']; ?>">
                                </td>
                            </tr>
                            <tr class="border-b-2">
                                <td class="px-5">Jenis Jaminan</td>
                                <td>
                                    <label for="jenis">: </label>
                                    <input class="shadow-inner" type="text" name="JenisJaminan" value="<?php echo $client['Jenis Jaminan']; ?>">
                                </td>
                            </tr>
                            <tr class="border-b-2">
                                <td class="px-5">Nilai Jaminan</td>
                                <td>
                                    <label for="jaminan">: </label>
                                    <input type="text" name="NilaiJaminan" value="<?php echo $client['Nilai Jaminan']; ?>">
                                </td>
                            </tr>
                            <tr class="border-b-2">
                                <td class="px-5">Jangka Waktu Mulai</td>
                                <td>
                                    <label for="mulai">: </label>
                                    <input type="text" name="JangkaWaktuMulai" value="<?php echo $client['Jangka Waktu Mulai']; ?>">
                                </td>
                            </tr>
                            <tr class="border-b-2">
                                <td class="px-5">Jangka Waktu Akhir</td>
                                <td>
                                    <label for="akhir">: </label>
                                    <input type="text" name="JangkaWaktuAkhir" value="<?php echo $client['Jangka Waktu Akhir']; ?>">
                                </td>
                            </tr>
                            <tr class="border-b-2">
                                <td class="px-5">Jangka Waktu Klaim</td>
                                <td>
                                    <label for="klaim">: </label>
                                    <input type="text" name="JangkaWaktuKlaim" value="<?php echo $client['Jangka Waktu Klaim']; ?>">
                                </td>
                            </tr>
                            <tr class="border-b-2">
                                <td class="px-5">Nama Obligae</td>
                                <td>
                                    <label for="obligee">: </label>
                                    <input type="text" name="NamaObligee" value="<?php echo $client['Nama Obligee/Pemberi Kerja']; ?>">
                                </td>
                            </tr>
                            <tr class="border-b-2">
                                <td class="px-5">Nama Pekerjaan:</td>
                                <td>
                                    <label for="pekerjaan">: </label>
                                    <input type="text" name="NamaPekerjaan" value="<?php echo $client['Nama Pekerjaan']; ?>">
                                </td>
                            </tr>
                            <tr class="border-b-2">
                                <td class="px-5">Cash Collateral</td>
                                <td>
                                    <label label for="c-collateral">: </label>
                                    <input type="text" name="CashCollateral" value="<?php echo $client['Cash Collateral']; ?>">
                                </td>
                            </tr>
                            <tr>
                                
                                <td class="pt-5"><input type="submit" name="back" value="Back" class="bg-blue-500 hover:bg-blue-700 cursor-pointer px-4 py-1 rounded-lg text-white"></td>
                                <td class="pt-5 text-end"><input type="Submit" name="edit" class="bg-green-500 hover:bg-green-700 cursor-pointer px-4 py-1 rounded-lg text-white"></td>
                            </tr>		
                        </table>
                    </form>
                    <?php } ?>
            </section>
        </main>

    </container>
</body>
</html>