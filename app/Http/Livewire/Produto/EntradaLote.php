<?php

namespace App\Http\Livewire\Produto;

use Livewire\Component;
use App\Models\Produto;
use App\Models\Lote; // Certifique-se de ter o Model Lote

class EntradaLote extends Component
{
    public $produtoId, $quantidade, $data_validade, $preco_custo;
    public $produto;

    public function mount($produtoId)
    {
        $this->produto = Produto::find($produtoId);
        $this->produtoId = $produtoId;
        $this->preco_custo = $this->produto->preco_custo_medio;
    }

    public function salvarLote()
    {
        $this->validate([
            'quantidade' => 'required|integer|min:1',
            'data_validade' => 'required|date|after:today',
            'preco_custo' => 'required|numeric',
        ]);

        // 1. Criar o Lote
        Lote::create([
            'produto_id' => $this->produtoId,
            'quantidade_inicial' => $this->quantidade,
            'quantidade_atual' => $this->quantidade,
            'data_validade' => $this->data_validade,
            'preco_custo' => $this->preco_custo,
        ]);

        // 2. Atualizar o estoque total no cadastro do produto
        $this->produto->increment('estoque_atual', $this->quantidade);

        session()->flash('message', 'Lote adicionado com sucesso!');
        return redirect()->to('/produtos');
    }

    public function render()
    {
        return view('livewire.produto.entrada-lote')->layout('layouts.app');
    }
}
