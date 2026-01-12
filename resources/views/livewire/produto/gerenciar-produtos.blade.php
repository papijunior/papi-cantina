<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-slate-800 border-l-4 border-orange-500 pl-3">Almoxarifado de Produtos</h2>
        <button wire:click="$set('showModal', true)" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-bold shadow-md transition">
            + Novo Produto
        </button>
    </div>

    <div class="mb-4">
        <input wire:model.debounce.300ms="search" type="text" placeholder="Pesquisar produto..." class="w-full p-3 rounded-xl border-none shadow-sm ring-1 ring-slate-200 focus:ring-2 focus:ring-blue-500 outline-none">
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($produtos as $produto)
        <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100 flex justify-between items-center">
            <div>
                <h3 class="font-bold text-slate-700 text-lg">{{ $produto->nome }}</h3>
                <p class="text-sm text-slate-500 font-medium">Venda: <span class="text-blue-600">R$ {{ number_format($produto->preco_venda, 2, ',', '.') }}</span></p>
                <div class="mt-2 text-xs inline-block px-2 py-1 rounded bg-slate-100 text-slate-600">
                    Estoque Total: <strong>{{ $produto->estoque_atual }}</strong>
                </div>
            </div>
            <div class="flex flex-col gap-2 text-right">
                <a href="{{ route('lotes.create', $produto->id) }}" class="text-xs bg-green-100 text-green-700 px-3 py-1 rounded-full font-bold hover:bg-green-200 text-center">
                    + Lote/Estoque
                </a>

                <button class="text-xs text-slate-400 hover:text-blue-500">Editar</button>
            </div>
        </div>
        @endforeach
    </div>

    @if($showModal)
    <div class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm flex items-center justify-center p-4 z-50">
        <div class="bg-white rounded-3xl p-8 max-w-md w-full shadow-2xl">
            <h3 class="text-xl font-bold mb-6 text-slate-800">Novo Produto</h3>
            <div class="space-y-4">
                <div>
                    <label class="text-xs font-bold text-slate-400 uppercase">Nome do Item</label>
                    <input wire:model="nome" type="text" class="w-full p-3 bg-slate-50 border-none ring-1 ring-slate-200 rounded-xl mt-1">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="text-xs font-bold text-slate-400 uppercase">Preço Custo</label>
                        <input wire:model="preco_custo" type="number" step="0.01" class="w-full p-3 bg-slate-50 border-none ring-1 ring-slate-200 rounded-xl mt-1">
                    </div>
                    <div>
                        <label class="text-xs font-bold text-slate-400 uppercase">Preço Venda</label>
                        <input wire:model="preco_venda" type="number" step="0.01" class="w-full p-3 bg-slate-50 border-none ring-1 ring-slate-200 rounded-xl mt-1">
                    </div>
                </div>
            </div>
            <div class="flex justify-end mt-8 gap-3">
                <button wire:click="$set('showModal', false)" class="px-5 py-2 text-slate-400 font-medium">Cancelar</button>
                <button wire:click="store" class="bg-blue-600 text-white px-8 py-2 rounded-xl font-bold shadow-lg shadow-blue-200">Cadastrar</button>
            </div>
        </div>
    </div>
    @endif
</div>
