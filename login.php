<?php
session_start();

if (isset($_SESSION['email']) === true) {
    $baseUrl = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/') . '/';
    header("Location: " . $baseUrl . "index.php");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    if ($email === $password) {
        $_SESSION['email'] = $email;
        $baseUrl = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/') . '/';
        header("Location: " . $baseUrl . "index.php");
        exit();
    } else {
        echo "<script>alert('Invalid login credentials!');</script>";
    }
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
            background-color: rgb(222, 222, 80);
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
            background-color: green;
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

        <form method="post" action="" class="login-form">
            <div class="profile"><i class='bx bxs-user-pin'></i></div>
            <h2>Login Member</h2>
            <div class="input-cont">
                <label class="mylabel" for="email">email:</label>
                <input placeholder="youremail@mail.com" required class="myinput" type="text" name="email" id="email">
            </div>
            <div class="input-cont">
                <label class="mylabel" for="password">password:</label>
                <input placeholder="******" required class="myinput" type="password" name="password" id="password">
            </div>
            <button type="submit" class="mybutton">login</button>
        </form>
    </section>
</body>

</html>