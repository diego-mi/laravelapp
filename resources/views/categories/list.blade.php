@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if (Session::has('success'))
                    <h3>{{Session::get('success')}}</h3>
                @endif


                <h2>Categorias</h2>

                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th><a href="{{URL('categories/create')}}" class="btn btn-xs btn-success">New</a></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $key => $category)
                            <tr>
                                <td>{{($key+1)}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->description}}</td>
                                <td>
                                    <center>
                                        <a href="{{URL('categories/'.$category->id.'/edit')}}"
                                           class="btn btn-xs btn-info">Editar</a>

                                        <form action="{{URL('categories/'.$category->id)}}" method="POST">
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