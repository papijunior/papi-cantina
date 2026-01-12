<?php

namespace App\Http\Livewire\Produto;

use Livewire\Component;
use App\Models\Produto;
use Livewire\WithPagination;

class GerenciarProdutos extends Component
{
    use WithPagination;

    public $search = '';
    public $nome, $preco_venda, $preco_custo, $estoque_minimo = 5;
    public $showModal = false;

    public function store()
    {
        $this->validate([
            'nome' => 'required|min:3',
            'preco_venda' => 'required|numeric',
            'preco_custo' => 'required|numeric', // Aqui valida a variável da tela
        ]);

        Produto::create([
            'nome' => $this->nome,
            'preco_venda' => $this->preco_venda,
            'preco_custo_medio' => $this->preco_custo, // variável da tela -> coluna do banco
            'estoque_atual' => 0,
        ]);

        $this->reset(['nome', 'preco_venda', 'preco_custo', 'showModal']);
        session()->flash('message', 'Produto cadastrado!');
    }

    public function render()
    {
        return view('livewire.produto.gerenciar-produtos', [
            'produtos' => Produto::where('nome', 'like', '%' . $this->search . '%')
                        ->orderBy('nome')
                        ->paginate(10)
        ])->layout('layouts.app');
    }
}
