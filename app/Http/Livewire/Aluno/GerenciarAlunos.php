<?php

namespace App\Http\Livewire\Aluno;

use Livewire\Component;
use App\Models\Aluno;
use Livewire\WithPagination;

class GerenciarAlunos extends Component
{
    use WithPagination;

    public $search = '';
    public $nome, $saldo, $limite_diario = 50.00;
    public $showModal = false;

    // Função para salvar o novo aluno
    public function store()
    {
        $this->validate([
            'nome' => 'required|min:3',
            'saldo' => 'required|numeric',
            'limite_diario' => 'required|numeric',
        ]);

        Aluno::create([
            'nome' => $this->nome,
            'saldo' => $this->saldo,
            'limite_diario' => $this->limite_diario,
        ]);

        $this->reset(['nome', 'saldo', 'showModal']);
        session()->flash('message', 'Aluno cadastrado com sucesso!');
    }

    public function render()
    {
        return view('livewire.aluno.gerenciar-alunos', [
            'alunos' => Aluno::where('nome', 'like', '%' . $this->search . '%')
                        ->orderBy('nome')
                        ->paginate(10)
        ])->layout('layouts.app');
    }
}
