<div class="max-w-2xl mx-auto p-6">
    <div class="bg-white rounded-3xl shadow-xl overflow-hidden">
        <div class="bg-blue-600 p-6 text-white">
            <h2 class="text-xl font-bold">Entrada de Estoque</h2>
            <p class="opacity-80">Produto: {{ $produto->nome }}</p>
        </div>

        <form wire:submit.prevent="salvarLote" class="p-8 space-y-6">
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-bold text-slate-700">Quantidade</label>
                    <input type="number" wire:model="quantidade" class="w-full mt-1 p-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700">Data de Validade</label>
                    <input type="date" wire:model="data_validade" class="w-full mt-1 p-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700">Custo unitário deste lote (R$)</label>
                <input type="number" step="0.01" wire:model="preco_custo" class="w-full mt-1 p-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
            </div>

            <div class="flex justify-between items-center pt-4">
                <a href="/produtos" class="text-slate-400 hover:text-slate-600">Voltar</a>
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-8 py-3 rounded-xl font-bold shadow-lg transition">
                    Confirmar Entrada
                </button>
            </div>
        </form>
    </div>
</div>
