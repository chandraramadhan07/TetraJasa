<?php
    include "db/database.php";
    session_start();
    if(isset($_POST['login'])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $hash_password = hash('sha256', $password);

        $sql = "SELECT * FROM admin WHERE username='$username' AND password='$hash_password'";
        $result = $db->query($sql);

        if($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            $_SESSION["username"] = $data["username"];
            $_SESSION["isLogin"] = true;
            header("location: /php/admin.php");
            exit();
        }else {
            header("location: index.php?error.php");
            exit();
        };
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/output.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="./asset/logo/logo2.png">
    <title>Login admin</title>
</head>
<body>
    <main class="flex items-center justify-center w-full h-screen">
        <section class="shadow-md bg-slate-50 w-2/5 h-3/6 flex justify-center">
            <div class="w-full h-full flex flex-col items-center p-5 mt-5">
                <h1 class="text-4xl mb-20">Login Admin</h1>
                <div class="w-full  p-5">
                    <form method="POST">
                        <label class="ml-2">Username</label>
                        <input type="text" name="username" id="username" placeholder="Type your username" required class="border-solid border-b-[1px] border-black pl-2 w-full h-10 bg-slate-50">
                        <label class="ml-2 mt-5">Password</label>
                        <input type="password" name="password" id="password" placeholder="Type your password" required class="border-solid border-b-[1px] border-black pl-2 w-full h-10 bg-slate-50">
                        <button type="submit" name="login" class="mt-5 w-full border border-solid border-slate-800 rounded-lg bg-blue-500 h-10 text-white hover:bg-blue-700 transition-all">Login</button>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <footer>

    </footer>
</body>
</html>