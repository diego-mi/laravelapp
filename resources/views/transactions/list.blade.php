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


                <h2>Transaçoes</h2>

                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead>
                        <tr>
                            {{--<th>Id</th>--}}
                            <th>Responsavel</th>
                            <th>Descrição</th>
                            <th>Valor da Compra</th>
                            {{--<th>Valor Pago</th>--}}
                            <th>Data de Vencimento</th>
                            {{--<th>Data do Pagamento</th>--}}
                            <th>Operaçao</th>
                            <th>Origem</th>
                            <th>Categoria</th>
                            <th><a href="{{URL('transactions/create')}}" class="btn btn-xs btn-success">New</a></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($transactions as $key => $transaction)
                            <tr>
                                {{--<td>{{$transaction->id}}</td>--}}
                                <td>{{$transaction->user->name}}</td>
                                <td>{{$transaction->description}}</td>
                                <td>{{$transaction->prince}}</td>
                                {{--<td>{{$transaction->prince_paid}}</td>--}}
                                <td>{{(new DateTime($transaction->due_date))->format('d/m/y')}}</td>
                                {{--<td>{{$transaction->payment_date}}</td>--}}
                                <td>{{$transaction->type}}</td>
                                <td>{{$transaction->source->name}}</td>
                                <td>{{$transaction->category->name}}</td>
                                <td>
                                    <center>
                                        <a href="{{URL('transactions/'.$transaction->id.'/edit')}}"
                                           class="btn btn-xs btn-info">Editar</a>

                                        <form action="{{URL('transactions/'.$transaction->id)}}" method="POST">
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