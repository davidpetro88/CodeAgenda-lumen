<div class="panel @if($pessoa->sexo == 'F') panel-danger @else panel-info @endif">
    <div class="panel-heading">
        <h3 class="panel-title">
            @if ($pessoa->sexo == 'F')
                <i class="fa fa-female"></i>
            @else
                <i class="fa fa-male"></i>
            @endif
            {{ $pessoa->apelido }}
            <span class="pull-right">
                <a href="{{route('pessoa.edit', ['id' => $pessoa->id])}}" data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>
                <a href="{{route('pessoa.delete', ['id' => $pessoa->id])}}" data-toggle="tooltip" data-placement="top" title="Apagar" class="btn btn-danger btn-xs"><i class="fa fa-minus-circle"></i></a>
            </span>
        </h3>

    </div>
    <div class="panel-body">
        <h3>{{ $pessoa->nome }}</h3>

        <div id="tabs">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#telefones" aria-controls="telefones" role="tab" data-toggle="tab">Telefones</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="telefones">
                    @include('partials.telefones', ['telefones' => $pessoa->telefones])
                </div>
            </div>
        </div>

    </div>
</div>