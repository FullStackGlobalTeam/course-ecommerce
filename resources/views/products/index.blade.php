@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Products</div>
        <div class="panel-body">
            <table class="table table-hover">
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td><a href="{{route('products.edit', ['id'=>$product->id])}}" class="btn btn-xs btn-default">Editar</a>
                        </td>
                        <td>
                            <form action="{{ route('products.destroy', ['id' => $product->id]) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button class="btn btn-xs btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>


@stop