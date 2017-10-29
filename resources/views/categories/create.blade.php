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
                        <input type="text" id="input-name" name="name" placeholder="Nome" class="form-control"
                               value="{{isset($category) ? $category->name : ''}}" required>
                    </div>

                    <div class="form-group">
                        <label for="input-description">Descrição:</label>
                        <textarea name="description" id="input-description" cols="30" rows="10"
                                  class="form-control">{{isset($category) ? $category->description : ''}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="input-parent_id">Categoria descendente de:</label>
                        <select name="parent_id" id="input-parent_id" class="form-control">
                            <option value="0">Sem vinculo com outra categoria</option>
                            @foreach($categories as $key => $categoryItem)
                                <option value="{{$categoryItem->id}}">{{$categoryItem->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-success">Enviar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection