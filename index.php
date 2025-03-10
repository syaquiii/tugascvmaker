<?php
if (!isset($_COOKIE['email'])) {
    $baseUrl = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/') . '/';
    header("Location: " . $baseUrl . "login.php");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $nama = htmlspecialchars($_POST['nama']);
    $tempatTanggalLahir = htmlspecialchars($_POST['tempatTanggalLahir']);
    $riwayatPendidikan = htmlspecialchars($_POST['riwayatPendidikan']);
    $shortDescription = htmlspecialchars($_POST['shortDescription']);
    $alamat = htmlspecialchars($_POST['alamat']);

    setcookie("nama", $nama, time() + (86400 * 30), "/");
    setcookie("tempatTanggalLahir", $tempatTanggalLahir, time() + (86400 * 30), "/");
    setcookie("riwayatPendidikan", $riwayatPendidikan, time() + (86400 * 30), "/");
    setcookie("shortDescription", $shortDescription, time() + (86400 * 30), "/");
    setcookie("alamat", $alamat, time() + (86400 * 30), "/");

    if (isset($_FILES['profilePicture']) && $_FILES['profilePicture']['error'] === UPLOAD_ERR_OK) {
        $imageTmpPath = $_FILES['profilePicture']['tmp_name'];
        $imageName = basename($_FILES['profilePicture']['name']);
        $imageSavePath = 'uploads/' . $imageName;

        if (move_uploaded_file($imageTmpPath, $imageSavePath)) {
            setcookie("profilePicture", $imageSavePath, time() + (86400 * 30), "/");
        }
    }

    $baseUrl = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/') . '/';
    header("Location: " . $baseUrl . "cv.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            background-color: rgb(97, 226, 255);
        }

        input,
        textarea {
            all: unset;
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            border: none;
            font: inherit;
            background: none;
            color: inherit;
            width: 100%;
        }

        .bx-cube-alt {
            font-size: 3rem;
        }

        .background {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-form {
            position: relative;
            background-color: #e6e4e4;
            padding: 4rem;
            border-radius: 0.4rem;
            border-color: gray;
            min-height: 25%;
            width: 30%;
            box-shadow: 4.5px 4.5px 3.6px rgba(0, 0, 0, 0.049),
                12.5px 12.5px 10px rgba(0, 0, 0, 0.07),
                30.1px 30.1px 24.1px rgba(0, 0, 0, 0.091),
                100px 100px 80px rgba(0, 0, 0, 0.14);
        }

        .profile {
            position: absolute;
            top: -3rem;
            left: 15rem;
            background-color: blue;
            width: 6rem;
            display: flex;
            color: white;
            align-items: center;
            justify-content: center;
            min-height: 6rem;
            border-radius: 100%;
        }

        .bxs-user-pin {
            font-size: 3rem;
        }

        .login-form h2 {
            width: 100%;
            text-align: center;
            margin: 0;
        }

        .mylabel {
            margin-top: 1rem;
            font-size: 1rem;
            font-weight: bold;
        }

        .myinput {
            border-radius: 2px;
            background-color: rgb(193, 192, 192);
            padding: 4px;
        }

        .input-cont {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .mybutton {
            color: white;
            font-size: 1rem;
            width: 100%;
            border: 0;
            margin-top: 1rem;
            background-color: green;
            padding-top: 0.5rem;
            font-weight: bold;
            border-radius: 4px;
            cursor: pointer;
            padding-bottom: 0.5rem;
        }
    </style>
</head>

<body>
    <section class="background">
        <form method="post" action="" class="login-form" enctype="multipart/form-data">
            <div class="profile"><i class='bx bx-cube-alt'></i></div>
            <h2>BUILD YOUR CV HERE</h2>
            <div class="input-cont">
                <label class="mylabel" for="nama">Nama:</label>
                <input placeholder="Your Name" required class="myinput" type="text" name="nama" id="nama">
            </div>
            <div class="input-cont">
                <label class="mylabel" for="tempatTanggalLahir">Tempat Tanggal Lahir:</label>
                <input placeholder="Your Place and Date of Birth" required class="myinput" type="text"
                    name="tempatTanggalLahir" id="tempatTanggalLahir">
            </div>
            <div class="input-cont">
                <label class="mylabel" for="riwayatPendidikan">Riwayat Pendidikan Terakhir:</label>
                <input placeholder="Universitas Brawijaya - Sistem Informasi" required class="myinput" type="text"
                    name="riwayatPendidikan" id="riwayatPendidikan">
            </div>
            <div class="input-cont">
                <label class="mylabel" for="shortDescription">Short Description:</label>
                <input placeholder="A brief description about yourself" required class="myinput" type="text"
                    name="shortDescription" id="shortDescription">
            </div>
            <div class="input-cont">
                <label class="mylabel" for="alamat">Alamat:</label>
                <input placeholder="Your Address" required class="myinput" type="text" name="alamat" id="alamat">
            </div>
            <div class="input-cont">
                <label class="mylabel" for="profilePicture">Profile Picture:</label>
                <input class="myinput" type="file" name="profilePicture" id="profilePicture">
            </div>
            <button type="submit" class="mybutton">Submit</button>
        </form>
    </section>
</body>

</html>