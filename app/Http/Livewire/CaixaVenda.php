<?php

namespace App\Http\Livewire; // <--- Verifique se o caminho é este mesmo

use Livewire\Component;
use App\Models\Aluno;
use App\Models\Produto;
use App\Models\Transacao;
use App\Models\LoteEstoque;
use Illuminate\Support\Facades\DB;

class CaixaVenda extends Component
{
    public $aluno_id;
    public $alunoSelecionado;

    public function updatedAlunoId($id)
    {
        $this->alunoSelecionado = Aluno::find($id);
    }

    public function vender($produtoId)
    {
        if (!$this->aluno_id) {
            session()->flash('erro', 'Selecione um aluno primeiro!');
            return;
        }

        $aluno = Aluno::find($this->aluno_id);
        $produto = Produto::find($produtoId);

        // 1. Validar Saldo
        if ($aluno->saldo < $produto->preco_venda) {
            session()->flash('erro', 'Saldo insuficiente!');
            return;
        }

        // 2. Executar Lógica de Venda
        try {
            DB::transaction(function () use ($aluno, $produto) {
                // LIFO: Pega o lote mais recente com estoque
                $lote = LoteEstoque::where('produto_id', $produto->id)
                    ->where('quantidade_atual', '>', 0)
                    ->orderBy('created_at', 'desc')
                    ->first();

                if (!$lote) {
                    throw new \Exception('Estoque esgotado para este produto!');
                }

                // Baixas
                $lote->decrement('quantidade_atual', 1);
                $aluno->decrement('saldo', $produto->preco_venda);
                $produto->decrement('estoque_atual', 1);

                // Registrar Histórico
                Transacao::create([
                    'aluno_id' => $aluno->id,
                    'produto_id' => $produto->id,
                    'valor' => $produto->preco_venda
                ]);
            });

            // Atualiza o estado da tela
            $this->alunoSelecionado = $aluno->fresh();
            session()->flash('sucesso', 'Venda realizada com sucesso!');

        } catch (\Exception $e) {
            session()->flash('erro', $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.caixa-venda', [
            'alunos' => Aluno::orderBy('nome')->get(),
            'produtos' => Produto::where('estoque_atual', '>', 0)->get()
        ])->layout('layouts.app');
    }
}
