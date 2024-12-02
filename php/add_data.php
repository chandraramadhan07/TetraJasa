<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}

include '../db/database.php';

if(isset($_POST['submit'])) {
    $nama_Principal = $_POST['nama_principal'];

    // Jenis Jaminan
    if ($_POST['jenis_jaminan'] === 'lain' && !empty($_POST['jenis_jaminan_lain'])) {
        $jenis_Jaminan = $_POST['jenis_jaminan_lain'];
    } else {
        $jenis_Jaminan = $_POST['jenis_jaminan'];
    }

    $nilai_Jaminan = $_POST['nilai_jaminan'];
    $waktu_Mulai = $_POST['waktu_mulai'];
    $waktu_Akhir = $_POST['waktu_akhir'];

    // Waktu Klaim
    if ($_POST['waktu_klaim'] === 'lain' && !empty($_POST['waktu_klaim_lain'])) {
        $waktu_Klaim = $_POST['waktu_klaim_lain'];
    } else {
        $waktu_Klaim = $_POST['waktu_klaim'];
    }

    $Obligee = $_POST['obligee'];
    $nama_Pekerjaan = $_POST['nama_pekerjaan'];
    $cash_Collateral = $_POST['cash_collateral'];


$sql = "INSERT INTO data_client (`Nama Principal`, `Jenis Jaminan`, `Nilai Jaminan`, `Jangka Waktu Mulai`,
        `Jangka Waktu Akhir`, `Jangka Waktu Klaim`, `Nama Obligee/Pemberi Kerja`, `Nama Pekerjaan`, `Cash Collateral`)
        VALUES ('$nama_Principal', '$jenis_Jaminan', '$nilai_Jaminan', '$waktu_Mulai', '$waktu_Akhir', '$waktu_Klaim', '$Obligee', '$nama_Pekerjaan', '$cash_Collateral')";
$query = mysqli_query($db, $sql);

    if($query) {
        updateNomorUrut($db);
        header('Location: manage_data.php?status=sukses');
    }
    else {
        header('Location: add_data.php?status=Gagal menambahkan data');
    }
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
    <title>Add Data</title>
</head>
<body>
    <main class="flex justify-center items-center w-full h-auto py-14">
        <section class="bg-slate-200 shadow-lg w-2/5 h-auto p-5 rounded-md">
            <header>
                <h1 class="font-semibold text-3xl text-center mb-10">Add Data Client</h1>
            </header>

            <form action="add_data.php" method="POST" class="flex flex-col w-1/2">
                <!-- Input RADIO -->
                <label>
                    <span>Nama Principal</span><br>
                    <input type="text" name="nama_principal" class="w-full transition-all border-blue-400 border-b bg-transparent  pl-1 py-[2px] focus:border-b-0 focus:rounded-md focus:outline-none focus:ring focus:ring-blue-400">
                </label><br>

                <!-- Input Jaminan Radio -->
                <h3>Jenis Jaminan</h3>
                <label>
                    <input type="radio" name="jenis_jaminan" value="SB PENAWARAN">
                    <span>SB PENAWARAN</span>
                </label>

                <label>
                    <input type="radio" name="jenis_jaminan" value="SB PELAKSANAAN">
                    <span>SB PELAKSANAAN</span>
                </label>
            

                <label>
                    <input type="radio" name="jenis_jaminan" value="SB UANG MUKA">
                    <span>SB UANG MUKA</span>
                </label>
            

                <label>
                    <input type="radio" name="jenis_jaminan" value="SB PEMELIHARAAN">
                    <span>SB PEMELIHARAAN</span>
                </label>
            

                <label>
                    <input type="radio" name="jenis_jaminan" value="SB PEMBAYARAN">
                    <span>SB PEMBAYARAN</span>
                </label>
            

                <label>
                    <input type="radio" name="jenis_jaminan" value="BG PENAWARAN">
                    <span>BG PENAWARAN</span>
                </label>
            

                <label>
                    <input type="radio" name="jenis_jaminan" value="BG PELAKSANAAN">
                    <span>BG PELAKSANAAN</span>
                </label>
            

                <label>
                    <input type="radio" name="jenis_jaminan" value="BG UANG MUKA">
                    <span>BG UANG MUKA</span>
                </label>
            

                <label>
                    <input type="radio" name="jenis_jaminan" value="BG PEMELIHARAAN">
                    <span>BG  PEMELIHARAAN</span>
                </label>
            

                <label>
                    <input type="radio" name="jenis_jaminan" value="BG SP2D/AKHIR TAHUN">
                    <span>BG SP2D/AKHIR TAHUN</span>
                </label>
            

                <label>
                    <input type="radio" name="jenis_jaminan" value="MARINE CARGO">
                    <span>MARINE CARGO</span>
                </label>
            

                <label>
                    <input type="radio" name="jenis_jaminan" value="PROPERTY ALL RISK">
                    <span>PROPERTY ALL RISK</span>
                </label>
            

                <label>
                    <input type="radio" name="jenis_jaminan" value="CONSTRUCTION ALL RISKS">
                    <span>CONSTRUCTION ALL RISKS</span>
                </label>
                
                
                <!-- Radio Option Lain -->
                <label class="mb-[2px] w-full">
                <input type="radio" name="jenis_jaminan" value="lain" onclick="inputJaminan(true)">
                   <span>Yang lain: </span> 
                   <input id="input-jaminan" type="text" class="w-full mt-[2px] hidden transition-all border-blue-400 border-b bg-transparent  pl-1 py-[2px] focus:border-b-0 focus:rounded-md focus:outline-none focus:ring focus:ring-blue-400">
                </label>
                

                <!-- Input Lain -->
                <label class="mt-5">
                    <span>Nilai Jaminan</span><br>
                    <input type="number" name="nilai_jaminan" min="1" class="w-full [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none transition-all border-blue-400 border-b bg-transparent  pl-1 py-[2px] focus:border-b-0 focus:rounded-md focus:outline-none focus:ring focus:ring-blue-400">
                </label><br>

                <label>
                    <span>Jangka Waktu Mulai</span> <br>
                    <input type="date" name="waktu_mulai" class="w-2/5">
                </label><br>

                <label>
                    <span>Jangka Waktu Akhir</span><br>
                    <input type="date" name="waktu_akhir" class="w-2/5">
                </label><br>
                    
                <h3>Jangka Waku Klaim</h3>
                <label>
                    <input type="radio" name="waktu_klaim" value="30">
                    <span>30</span><br>
                </label>
                <label>
                    <input type="radio" name="waktu_klaim" value="14">
                    <span>14</span><br>
                </label>
                <!-- Radio Waktu Klaim Opsi Lain -->
                <label class="mb-[2px]">
                    <input type="radio" name="waktu_klaim" value="lain" onClick="inputKlaim(true)">
                    <span>Yang Lain: </span>
                </label>
                    <input id="input-klaim" type="number" class="hidden w-full [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none transition-all border-blue-400 border-b bg-transparent pl-1 py-[2px] focus:border-b-0 focus:rounded-md focus:outline-none focus:ring focus:ring-blue-400 ">
                <br>

                <!-- Input lain -->
                <label>
                    <span>Nama Obligee/Pemberi Kerja</span>
                    <input type="text" name="obligee" placeholder="Jawaban Anda" class="w-full transition-all border-blue-400 border-b bg-transparent  pl-1 py-[2px] focus:border-b-0 focus:rounded-md focus:outline-none focus:ring focus:ring-blue-400">
                </label><br>

                <label>
                    <span>Nama Pekerjaan</span>
                    <input type="text" name="nama_pekerjaan" placeholder="Jawaban Anda" class="w-full transition-all border-blue-400 border-b bg-transparent  pl-1 py-[2px] focus:border-b-0 focus:rounded-md focus:outline-none focus:ring focus:ring-blue-400">
                </label><br>

                <label>
                    <span>Cash Collateral</span>
                    <input type="number" name="cash_collateral" placeholder="Jawaban Anda" class="w-full transition-all border-blue-400 border-b bg-transparent  pl-1 py-[2px] focus:border-b-0 focus:rounded-md focus:outline-none focus:ring focus:ring-blue-400 [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none">
                </label><br>

                <button name="submit" class="bg-blue-500 text-white rounded-md px-3 py-1 w-max">Submit</button>
            </form>
        </section>
    </main>
    <script src="../javascript/script.js"></script>
</body>
</html>