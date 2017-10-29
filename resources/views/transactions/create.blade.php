@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h2>{{isset($transaction) ? 'Editar Transaçoes - ' . $transaction->name : 'Nova Transaçoes'}}</h2>

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


                <form action="{{URL('tr')}}{{isset($transaction) ? '/' . $transaction->id : ''}}" method="POST">
                    {{csrf_field()}}

                    @if(isset($transaction))

                        {{method_field('PUT')}}

                    @endif

                    <div class="form-group">
                        <label for="input-description">Descrição:</label>
                        <textarea name="description" id="input-description" cols="30" rows="10"
                                  class="form-control">{{isset($category) ? $category->description : ''}}</textarea>

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
                        <label for="input-prince">Valor da Compra:</label>
                        <input type="text" id="input-prince" name="prince" placeholder="Valor da Compra" class="form-control" value="{{isset($transaction) ? $transaction->prince : ''}}">

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <ul>
                                    @foreach ($errors->get('prince') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                    {{--<div class="form-group">--}}
                        {{--<label for="input-prince_paid">Valor Pago:</label>--}}
                        {{--<input type="text" id="input-prince_paid" name="prince_paid" placeholder="Valor Pago" class="form-control" value="{{isset($transaction) ? $transaction->prince_paid : ''}}">--}}

                        {{--@if ($errors->any())--}}
                            {{--<div class="alert alert-danger alert-dismissible">--}}
                                {{--<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>--}}
                                {{--<ul>--}}
                                    {{--@foreach ($errors->get('prince_paid') as $error)--}}
                                        {{--<li>{{ $error }}</li>--}}
                                    {{--@endforeach--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        {{--@endif--}}
                    {{--</div>--}}

                    <div class="form-group">
                        <label for="input-due_date">Data de Vencimento:</label>
                        <input type="date" id="input-due_date" name="due_date" placeholder="Data de Vencimento" class="form-control" value="{{isset($transaction) ? $transaction->due_date : ''}}">

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <ul>
                                    @foreach ($errors->get('due_date') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="input-category_id">Categoria:</label>
                        <select name="category_id" id="input-category_id" class="form-control">
                            <option value="">Escolha</option>
                            @foreach($categories as $key => $categoryItem)
                                <option value="{{$categoryItem->id}}">{{$categoryItem->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="input-source_id">Origem:</label>
                        <select name="source_id" id="input-source_id" class="form-control">
                            <option value="">Escolha</option>
                            @foreach($sources as $key => $sourceItem)
                                <option value="{{$sourceItem->id}}">{{$sourceItem->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="input-source_id">Tipo:</label>
                        <select name="source_id" id="input-source_id" class="form-control">
                            <option value="">Escolha</option>
                            @foreach($types as $key => $typeItem)
                                <option value="{{$key}}">{{$typeItem}}</option>
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