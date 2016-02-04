@extends('layout')
@section('content')
    <div class="col-md-6">
        <form action="{{route('telefone.store')}}" method="post" class="form-horizontal">

            <input type="hidden" name="pessoa_id" value="{{$pessoa->id}}" />

            <div class="page-header">
                Adicionar novo telefone
            </div>

            <div class="form-group">
                <label for="descricao" class="col-sm-2 control-label">Descrição</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="descricao" name="descricao" value="{{old('descricao')}}" placeholder="Descrição do telefone">
                </div>
            </div>

            <div class="form-group">
                <label for="codPais" class="col-sm-2 control-label">Código Pais</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="codPais" name="codPais" value="{{old('codPais')}}" placeholder="Código do País">
                </div>
            </div>

            <div class="form-group">
                <label for="ddd" class="col-sm-2 control-label">DDD</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="ddd" name="ddd" value="{{old('ddd')}}" placeholder="DDD">
                </div>
            </div>

            <div class="form-group">
                <label for="prefixo" class="col-sm-2 control-label">Número</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="prefixo" name="prefixo" value="{{old('prefixo')}}" placeholder="Prefixo">
                </div>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="sufixo" name="sufixo" value="{{old('sufixo')}}" placeholder="Sufixo">
                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        @if (isset($errors) AND count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @include('partials.contato', ['pessoa' => $pessoa])
    </div>

@endsection