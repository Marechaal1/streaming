@extends('site.layout.top')

@section('content')
<div class="background">
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Cadastro</p>
        </div>
        <div class="informacao-pagina">
            <div style="width: 70%; margin-left: auto; margin-right: auto;">
                <span class="error-message">{{$msg ?? ''}}</span>
                <form method="POST" action="{{ route('site.register') }}">
                    @csrf
                    <input type="hidden"    name="id" value="{{ $supplier->id ?? '' }}">
                    <input type="text"      name="name" value="{{ $supplier->name ?? old('name') }}" placeholder="Nome" class="borda-preta">
                    <span class="error-message">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                    <input type="text"      name="email" value="{{ $supplier->email ?? old('email') }}" placeholder="E-mail" class="borda-preta">
                    <span class="error-message">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                    <input type="password"  name="password" value="{{ $supplier->email ?? old('email') }}" placeholder="senha" class="borda-preta">
                    <span class="error-message">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                    <button type="submit">Cadastrar</button>
                </form>
            </div>
        </div>
        
    </div>
</div>
@endsection
