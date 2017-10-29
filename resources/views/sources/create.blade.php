@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h2>{{isset($source) ? 'Editar Origem - ' . $source->name : 'Nova Origem'}}</h2>

                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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


                <form action="{{URL('sources')}}{{isset($source) ? '/' . $source->id : ''}}" method="POST">
                    {{csrf_field()}}

                    @if(isset($source))

                        {{method_field('PUT')}}

                    @endif

                    <div class="form-group">
                        <label for="input-name">Nome:</label>
                        <input type="text" id="input-name" name="name" placeholder="Nome" class="form-control" value="{{isset($source) ? $source->name : ''}}">

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
                        <label for="input-initial_balance">Valor Inicial:</label>
                        <input type="text" id="input-initial_balance" name="initial_balance" placeholder="Valor Inicial" class="form-control" value="{{isset($source) ? $source->initial_balance : ''}}">

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <ul>
                                    @foreach ($errors->get('initial_balance') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="input-description">Descrição:</label>
                        <textarea name="description" id="input-description" cols="30" rows="10"
                                  class="form-control">{{isset($source) ? $source->description : ''}}</textarea>

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <ul>
                                    @foreach ($errors->get('description') as $error)
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