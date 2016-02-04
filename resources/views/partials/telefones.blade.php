<p class="btn-row">
    <a href="{{route('telefone.create', ['id' => $pessoa->id])}}" class="label label-primary">Novo telefone</a>
</p>
<table class="table table-hover">
    @foreach($pessoa->telefones as $telefone)
        <tr>
            <td> {{ $telefone->descricao }}</td>
            <td> {{ $telefone->numero }} </td>
            <td>
                <a href="{{route('telefone.edit', ['pessoaId' => $pessoa->id, 'id' => $telefone->id])}}" data-toggle="tooltip" data-placement="top" title="Alterar" class="text-danger"><i class="fa fa-edit"></i></a>
                <a href="{{route('telefone.delete', ['id' => $telefone->id])}}" data-toggle="tooltip" data-placement="top" title="Apagar" class="text-danger"><i class="fa fa-minus-circle"></i></a>
            </td>
        </tr>
    @endforeach
</table>