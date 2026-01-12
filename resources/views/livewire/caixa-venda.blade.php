<div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-6">
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-bold mb-4">🛒 Registro de Venda</h2>

        <label class="block text-sm font-medium text-gray-700">Selecione o Aluno</label>
        <select wire:model.live="aluno_id" class="mt-1 block w-full p-2 border rounded-md mb-6">
            <option value="">Escolha o aluno...</option>
            @foreach($alunos as $aluno)
                <option value="{{ $aluno->id }}">{{ $aluno->nome }}</option>
            @endforeach
        </select>

        <div class="grid grid-cols-2 gap-4">
            @foreach($produtos as $produto)
                <button class="p-4 border rounded-lg hover:bg-blue-50 transition text-left">
                    <p class="font-bold">{{ $produto->nome }}</p>
                    <p class="text-green-600 font-semibold">R$ {{ number_format($produto->preco_venda, 2, ',', '.') }}</p>
                </button>
            @endforeach
        </div>
    </div>

    <div class="bg-slate-800 text-white p-6 rounded-lg shadow-xl">
        <h2 class="text-xl font-bold mb-4 border-b border-slate-700 pb-2">Informações do Aluno</h2>

        @if($alunoSelecionado)
            <div class="space-y-4">
                <p class="text-2xl font-light">{{ $alunoSelecionado->nome }}</p>
                <div class="flex justify-between">
                    <span>Saldo:</span>
                    <span class="text-green-400 font-bold">R$ {{ number_format($alunoSelecionado->saldo, 2, ',', '.') }}</span>
                </div>
                <div class="p-3 bg-slate-700 rounded text-sm text-yellow-300">
                    <strong>Atenção:</strong> Limite diário: R$ {{ $alunoSelecionado->limite_diario }}
                </div>
            </div>
        @else
            <p class="text-slate-400 italic">Selecione um aluno para ver o saldo e restrições.</p>
        @endif
    </div>
</div>
