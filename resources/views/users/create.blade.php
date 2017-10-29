@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h2>{{isset($user) ? 'Editar Usuário - ' . $user->name : 'Novo Usuário'}}</h2>

                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <ul>
                            <li>{{Session::get('success')}}</li>
                        </ul>
                    </div>
                @endif


                <form action="{{URL('users')}}{{isset($user) ? '/' . $user->id : ''}}" method="POST">
                    {{csrf_field()}}

                    @if(isset($user))

                        {{method_field('PUT')}}

                    @endif

                    <div class="form-group">
                        <label for="input-name">Nome:</label>
                        <input type="text" id="input-name" name="name" placeholder="Nome" class="form-control" value="{{isset($user) ? $user->name : ''}}">

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <ul>
                                    @foreach ($errors->get('name') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="input-email">Email:</label>
                        <input type="email" id="input-email" name="email" placeholder="Email" class="form-control" value="{{isset($user) ? $user->email : ''}}">

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <ul>
                                    @foreach ($errors->get('email') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-success">Enviar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection