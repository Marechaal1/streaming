@extends('site.layout.top')

@section('content')
<div class="background">
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Login</p>
        </div>
        <div class="informacao-pagina">
            <div style="width: 70%; margin-left: auto; margin-right: auto;">
                <span class="error-message">{{$msg ?? ''}}</span>
                <form method="POST" action="{{route('site.login')}}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $supplier->id ?? '' }}">
                    <input type="text" name="email" value="{{ $supplier->name ?? old('email') }}" placeholder="E-MAIL"
                        class="borda-preta">
                    {{ $errors->has('email') ? $errors->first('email') : '' }}
                    <input type="password" name="password" value="{{ $supplier->email ?? old('password') }}" placeholder="SENHA"
                        class="borda-preta">
                    {{ $errors->has('password') ? $errors->first('password') : '' }}
                    <button type="submit">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
