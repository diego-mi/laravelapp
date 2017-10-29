@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <ul>
                            <li>{{Session::get('success')}}</li>
                        </ul>
                    </div>
                @endif

                @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <h2>Usuários</h2>

                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th><a href="{{URL('users/create')}}" class="btn btn-xs btn-success">New</a></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $key => $user)
                            <tr>
                                <td>{{($key+1)}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <center>
                                        <a href="{{URL('users/'.$user->id.'/edit')}}"
                                           class="btn btn-xs btn-info">Editar</a>

                                        <form action="{{URL('users/'.$user->id)}}" method="POST">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <button class="btn btn-xs btn-danger">Remover</button>
                                        </form>
                                    </center>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection