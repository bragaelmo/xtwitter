<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>XTwitter - Acontecendo agora</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="h-screen bg-white">
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        <!-- Lado esquerdo: Logo -->
        <div class="w-1/2 flex items-center justify-center bg-white">
            <img src="{{ asset('images/logo-x.png') }}" alt="Logo X" class="w-1/2">
        </div>

        <!-- Lado direito: Texto e botões -->
        <div class="w-1/2 flex flex-col justify-center px-16">
            <h1 class="text-5xl font-bold mb-8">Acontecendo agora</h1>

            <h2 class="text-2xl font-semibold mb-6">Inscreva-se hoje</h2>

            <div class="space-y-4">
                <button class="w-full py-2 px-4 border rounded-full flex items-center justify-center gap-2 text-sm hover:bg-gray-100">
                    <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-5 h-5" alt="">
                    Inscrever-se no Google
                </button>

                <button class="w-full py-2 px-4 border rounded-full flex items-center justify-center gap-2 text-sm hover:bg-gray-100">
                    <img src="https://www.svgrepo.com/show/475679/apple-color.svg" class="w-5 h-5" alt="">
                    Inscrever-se com Apple
                </button>

                <div class="text-center text-sm text-gray-500">OU</div>

                <a href="{{ route('register') }}" class="block w-full text-center bg-blue-500 text-white py-2 rounded-full font-medium hover:bg-blue-600 transition">
                    Criar conta
                </a>

                <p class="text-xs text-gray-500 leading-tight">
                    Ao se inscrever, você concorda com os <a href="#" class="underline">Termos de Serviço</a> e a <a href="#" class="underline">Política de Privacidade</a>, incluindo o <a href="#" class="underline">Uso de Cookies</a>.
                </p>
            </div>

            <div class="mt-8 text-sm">
                Já tem uma conta?
                <a href="{{ route('login') }}" class="text-blue-500 font-semibold hover:underline">Entrar</a>
            </div>
        </div>
    </div>
</body>
</html>
