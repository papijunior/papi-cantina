<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Papi Cantina - PDV</title>
    <script src="https://cdn.tailwindcss.com"></script> @livewireStyles
</head>
<body class="bg-slate-100 font-sans antialiased">
    <div class="min-h-screen flex flex-col">
        <header class="bg-white border-b border-slate-200 p-4 shadow-sm">
            <div class="container mx-auto flex justify-between items-center">
                <div class="flex items-center gap-2">
                    <span class="text-2xl">🍎</span>
                    <h1 class="text-xl font-bold text-slate-800">Papi <span class="text-orange-500">Cantina</span></h1>
                </div>
                <nav class="flex gap-6 text-sm font-medium text-slate-600">
                    <a href="/caixa" class="text-orange-600 border-b-2 border-orange-500 pb-1">PDV Caixa</a>
                    <a href="#" class="hover:text-orange-500">Estoque</a>
                    <a href="#" class="hover:text-orange-500">Relatórios</a>
                </nav>
                <div class="flex items-center gap-3">
                    <span class="text-sm text-slate-500">Operador: <strong>Paulo</strong></span>
                    <button class="text-xs bg-slate-200 px-3 py-1 rounded hover:bg-red-100 hover:text-red-600 transition">Sair</button>
                </div>
            </div>
        </header>

        <main class="flex-grow container mx-auto py-8 px-4">
            {{ $slot }}
        </main>

        <footer class="p-4 text-center text-slate-400 text-xs">
            &copy; 2026 Papi Cantina System - Gestão Escolar Inteligente
        </footer>
    </div>
    @livewireScripts
</body>
</html>
