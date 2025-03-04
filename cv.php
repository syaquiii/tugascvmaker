<?php
session_start();
if (!isset($_SESSION['email'])) {
    $baseUrl = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/') . '/';
    header("Location: " . $baseUrl . "login.php");
    exit();
}

$nama = $_SESSION['nama'] ?? '';
$tempatTanggalLahir = $_SESSION['tempatTanggalLahir'] ?? '';
$riwayatPendidikan = $_SESSION['riwayatPendidikan'] ?? '';
$shortDescription = $_SESSION['shortDescription'] ?? '';
$alamat = $_SESSION['alamat'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your CV</title>
    <link href="./style/output.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body class="flex justify-center">
    <section class="lg:w-[60rem] md:w-[40rem] m-4 w-full border-gray-300 shadow-2xl">
        <div
            class="bg-slate-600 w-full gap-10 min-h-60 flex flex-col p-10 lg:flex-row lg:justify-center items-center px-10">
            <div>
                <h1 class="text-white md:text-5xl font-bold uppercase"><?= $nama ?> <span class="text-green-600"></span>
                </h1>
            </div>
        </div>
        <div class="h-fit lg:flex">
            <div class="bg-slate-700 p-10 text-slate-200">
                <h4 class="uppercase font-bold">About </h4>
                <hr class="mt-2">
                <p class="text-sm text-justify mt-2"><?= $shortDescription ?></p>
                <h4 class="mt-10 font-bold">Alamat</h4>
                <hr class="mt-2">
                <span class="text-sm text-justify"><?= $alamat ?></span>
                <h4 class="mt-10 font-bold">Tempat Tanggal Lahir</h4>
                <hr class="mt-2">
                <span class="text-sm text-justify"><?= $tempatTanggalLahir ?></span>
            </div>
            <div class="bg-white p-10 text-slate-700 w-full lg:w-2/3">
                <h4 class="uppercase font-bold">Education History</h4>
                <hr class="mt-2">
                <p class="text-sm text-justify mt-2"><?= $riwayatPendidikan ?></p>
            </div>
        </div>
    </section>
</body>

</html>