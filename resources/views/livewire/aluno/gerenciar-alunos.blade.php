<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-slate-800">Gestão de Alunos</h2>
        <button wire:click="$set('showModal', true)" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg font-bold transition">
            + Novo Aluno
        </button>
    </div>

    <div class="mb-4">
        <input wire:model.debounce.300ms="search" type="text" placeholder="Buscar aluno pelo nome..." class="w-full p-3 rounded-lg border border-slate-300 shadow-sm focus:ring-2 focus:ring-orange-500 outline-none">
    </div>

    <div class="bg-white rounded-xl shadow-sm overflow-hidden text-left">
        <table class="w-full">
            <thead class="bg-slate-50 border-b border-slate-200">
                <tr>
                    <th class="p-4 font-semibold text-slate-600">Nome</th>
                    <th class="p-4 font-semibold text-slate-600">Saldo</th>
                    <th class="p-4 font-semibold text-slate-600">Limite Diário</th>
                    <th class="p-4 font-semibold text-slate-600">Ações</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @foreach($alunos as $aluno)
                <tr class="hover:bg-slate-50 transition">
                    <td class="p-4 text-slate-800 font-medium">{{ $aluno->nome }}</td>
                    <td class="p-4 text-green-600 font-bold">R$ {{ number_format($aluno->saldo, 2, ',', '.') }}</td>
                    <td class="p-4 text-slate-600">R$ {{ number_format($aluno->limite_diario, 2, ',', '.') }}</td>
                    <td class="p-4">
                        <button class="text-blue-500 hover:underline mr-2">Editar</button>
                        <button class="text-red-500 hover:underline">Histórico</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="p-4 bg-slate-50">
            {{ $alunos->links() }}
        </div>
    </div>

    @if($showModal)
    <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
        <div class="bg-white rounded-2xl p-8 max-w-md w-full shadow-2xl">
            <h3 class="text-xl font-bold mb-4">Cadastrar Novo Aluno</h3>
            <div class="space-y-4">
                <input wire:model="nome" type="text" placeholder="Nome Completo" class="w-full p-3 border rounded-lg">
                <input wire:model="saldo" type="number" placeholder="Saldo Inicial (R$)" class="w-full p-3 border rounded-lg">
                <input wire:model="limite_diario" type="number" placeholder="Limite Diário (R$)" class="w-full p-3 border rounded-lg">
            </div>
            <div class="flex justify-end mt-6 gap-2">
                <button wire:click="$set('showModal', false)" class="px-4 py-2 text-slate-500">Cancelar</button>
                <button wire:click="store" class="bg-orange-500 text-white px-6 py-2 rounded-lg font-bold">Salvar Aluno</button>
            </div>
        </div>
    </div>
    @endif
</div>
