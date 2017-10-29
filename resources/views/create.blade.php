@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h2>{{isset($user) ? 'Editar Usuário - ' . $user->name : 'Novo Usuário'}}</h2>


                <form action="{{URL('users')}}{{isset($user) ? '/' . $user->id : ''}}" method="POST">
                    {{csrf_field()}}

                    @if(isset($user))

                        {{method_field('PUT')}}

                    @endif


                    <div class="form-group">
                        <label for="input-name">Nome:</label>
                        <input type="text" id="input-name" name="name" placeholder="Nome" class="form-control" value="{{isset($user) ? $user->name : ''}}">
                    </div>

                    <div class="form-group">
                        <label for="input-email">Nome:</label>
                        <input type="email" id="input-email" name="email" placeholder="Email" class="form-control" value="{{isset($user) ? $user->email : ''}}">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-success">Enviar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection