@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h2>{{isset($category) ? 'Editar Categoria - ' . $category->name : 'Nova Categoria'}}</h2>


                <form action="{{URL('categories')}}{{isset($category) ? '/' . $category->id : ''}}" method="POST">
                    {{csrf_field()}}

                    @if(isset($category))

                        {{method_field('PUT')}}

                    @endif


                    <div class="form-group">
                        <label for="input-name">Nome:</label>
                        <input type="text" id="input-name" name="name" placeholder="Nome" class="form-control" value="{{isset($category) ? $category->name : ''}}">
                    </div>

                    <div class="form-group">
                        <label for="input-description">Descrição:</label>
                        <textarea name="description" id="input-description" cols="30" rows="10" class="form-control">{{isset($category) ? $category->description : ''}}</textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-success">Enviar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection