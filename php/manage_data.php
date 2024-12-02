<?php 
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
    exit;
}

include "../db/database.php";

$sql = "SELECT * FROM data_client";
$query = mysqli_query($db, $sql);
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: ../index.php");
    exit;
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
    <title>Data Client</title>
</head>
<body>
    <nav class="bg-white w-full px-5 py-2 sticky z-10">
        <div class="w-full flex justify-between items-center">
            <img class="w-60" src="/asset/logo/logo1.png" alt="logotetrajasa">
            <form action="" method="POST">
                <button type="submit" name="logout" class="border border-red-500 hover:bg-red-500 px-4 py-1 h-min rounded-lg hover:text-white transition-all">Logout</button>
            </form>
        </div>
    </nav>

    <container class="flex w-full h-screen bg-slate-100 justify-center pr-5 pt-5 -mt-16 relative">
        <aside id="side-bar" class="w-[300px] bg-white pt-2 shadow-lg mr-5 mt-11 relative flex justify-center transition-[width] duration-300">
            <div class="w-full ">
                <button id="hamburger" class="absolute -right-5 top-6 rounded-full bg-blue-400 p-2 hover:bg-blue-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                    </svg>
                </button>

                <div class="w-full flex flex-col gap-8 mt-3">
                    <div class="flex justify-center w-full p-2 stroke-white">
                        <a href="admin.php" class="group w-3/4 flex justify-center rounded-lg gap-5 stroke-black  hover:text-white hover:bg-blue-500 transition-all py-4 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="" class="size-6 group-hover:stroke-white">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                            </svg>
                            <p class="aside-p">Dashboard</p>
                        </a>
                    </div>  

                    <div class=" flex justify-center w-full p-2  text-white transition-all ">
                       
                        <a href="manage_data.php" class="group w-3/4 flex justify-center rounded-lg gap-5 stroke-white bg-blue-500 py-4 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
                            <p class="aside-p">Manage Data</p>
                        </a>
                    </div>
                </div>
            </div>
        </aside>
    
        <main class="bg-slate-100 w-full flex flex-col mt-16 px-8">
            <h1 class="text-3xl font-semibold mb-5">Manage Data</h1>
            <section class="w-full h-screen flex flex-col bg-white p-5 shadow-lg">
                <h1 class="text-start text-4xl font-semibold mb-5 w-full">Data Client</h1>
                <a href="add_data.php"><button class="bg-blue-500 text-white px-5 py-2 rounded-lg w-max mb-5 hover:bg-blue-700 transition-all">Add Data</button></a>
                <table class="border-2 text-center">
                    <thead>
                        <tr class=" border-b">
                            <th class="border-r p-2">No.</th>
                            <th class='border-r hover:bg-gray-100'>Nama Principal</th>
                            <th class='border-r hover:bg-gray-100'>Jenis Jaminan</th>
                            <th class='border-r hover:bg-gray-100'>Nilai Jaminan</th>
                            <th class='border-r hover:bg-gray-100'>Jangka Waktu Mulai</th>
                            <th class='border-r hover:bg-gray-100'>Jangka Waktu Akhir</th>
                            <th>Option</th>
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while($client = mysqli_fetch_array($query)){
                            echo "<tr class='border-r border-b hover:bg-gray-100'>";
                            echo "<td class='border-r border-b hover:bg-gray-100'>" . $client['nomor_urut'] . "</td>";
                            echo "<td class='border-r border-b hover:bg-gray-100'>" . $client['Nama Principal'] . "</td>";
                            echo "<td class='border-r border-b hover:bg-gray-100'>" . $client['Jenis Jaminan'] . "</td>";
                            echo "<td class='border-r border-b hover:bg-gray-100'>" . $client['Nilai Jaminan'] . "</td>";
                            echo "<td class='border-r border-b hover:bg-gray-100'>" . $client['Jangka Waktu Mulai'] . "</td>";
                            echo "<td class='border-r border-b hover:bg-gray-100'>" . $client['Jangka Waktu Akhir'] . "</td>";
                            echo "<td class='p-1'>
                                    <a href='edit.php?id=" . $client['id'] . "'><button class='bg-yellow-500 hover:bg-yellow-600 py-1 px-4 rounded-md text-white'>Edit</button></a>
                                    <a href='delete.php?id=" . $client['id'] . "'><button class='bg-red-500 hover:bg-red-700 py-1 px-4 rounded-md text-white'>Delete</button></a>
                                </td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </section>
        </main>
    </container>
    <script src="../javascript/script.js?cache-buster=1"></script>
</body>
</html>