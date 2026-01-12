namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Produto;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    // Adicionar saldo (Crédito do Pai)
    public function adicionarCredito(Request $request, $id)
    {
        $aluno = Aluno::findOrFail($id);
        $aluno->increment('saldo', $request->valor);

        return response()->json([
            'mensagem' => "R$ {$request->valor} adicionados com sucesso!",
            'saldo_atual' => $aluno->saldo
        ]);
    }

    // Configurar o que o filho NÃO pode comer
    public function definirRestricoes(Request $request, $id)
    {
        $aluno = Aluno::findOrFail($id);

        // Salvamos um array de IDs de produtos proibidos
        // O campo 'restricoes' na migration deve ser do tipo JSON
        $aluno->update([
            'restricoes' => $request->produtos_proibidos
        ]);

        return response()->json(['mensagem' => 'Restrições alimentares atualizadas!']);
    }
}
