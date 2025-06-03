<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Autentikasi</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-200 min-h-screen flex items-center justify-center">

    <!-- Container Utama -->
    <div class="relative w-full max-w-[70rem] h-[700px] bg-white rounded-2xl shadow-2xl overflow-hidden flex">

        <!-- Left Side - Login Form -->
        <div id="login-form" class="w-1/2 p-10 flex flex-col justify-center transition-transform duration-700 ease-in-out transform translate-x-0">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Login</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2" for="">Email</label>
                    <input name="email" type="text" class="w-full px-4 py-2 border rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2" for="">Password</label>
                    <input name="password" type="password" class="w-full px-4 py-2 border rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">
                    Login
                </button>
            </form>
        </div>

        <!-- Right Side - Register Form -->
        <div id="register-form" class=" w-1/2 p-10 flex flex-col justify-center item-center transition-transform duration-700 ease-in-out transform ">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Register</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2" for="">Username</label>
                    <input name="username" type="text" class="w-full px-4 py-2 border rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-green-400">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2" for="">Email</label>
                    <input name="email" type="email" class="w-full px-4 py-2 border rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-green-400">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2" for="">Password</label>
                    <input name="password" type="password" class="w-full px-4 py-2 border rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-green-400">
                </div>
                <button type="submit" class="w-full bg-green-500 text-white py-2 rounded-lg hover:bg-green-600 transition">
                    Create Account
                </button>
            </form>
        </div>

        <!-- Background Image di sebelah kanan (bisa diganti sesuai tema) -->
        <div id="welcome" class="absolute top-0 right-0 h-full w-1/2 bg-gradient-to-br from-blue-500 to-purple-600 text-white flex items-center justify-center p-10 transition-transform duration-700 ease-in-out transform translate-x-0">
            <div class="text-center">
                <h3 class="text-3xl font-bold mb-4">Welcome!</h3>
                <p>Join us and start your journey with us.</p>
                <button id="tombol" class="mt-4 text-sm bg-green-500 p-3 rounded-xl">
                    Don't have an account? Register
                </button>
            </div>
        </div>

    </div>

    <!-- Script untuk animasi transisi -->
    <script>
        // const switchToRegister = document.getElementById("switch-to-register");
        // const switchToLogin = document.getElementById("switch-to-login");
        // const loginForm = document.getElementById("login-form");
        // const registerForm = document.getElementById("register-form");

        // switchToRegister.addEventListener("click", () => {
        //     loginForm.style.transform = "translateX(-100%)";
        //     registerForm.style.transform = "translateX(0)";
        // });

        // switchToLogin.addEventListener("click", () => {
        //     loginForm.style.transform = "translateX(0)";
        //     registerForm.style.transform = "translateX(100%)";
        //     loginForm.classList.remove("hidden");
        //     registerForm.classList.add("hidden");
        // });

        const tombol = document.getElementById("tombol");
        const welcome = document.getElementById("welcome");
        const login = document.getElementById("login-form");
        const register = document.getElementById("register-form");

        tombol.addEventListener("click", () => {
            const currentText = tombol.textContent;

            if (currentText.includes("Register")) {
                welcome.style.transform = "translateX(-100%)";
                tombol.textContent = "Kamu Punya Akun? Login";
            } else {
                welcome.style.transform = "translateX(0)";
                login.style.display = "hidden";
                tombol.textContent = "Gapunya Akun? Register";
            }

        });
    </script>

</body>
</html>