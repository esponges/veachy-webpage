@extends('style')

<style>
body {
    background-color:rgb(230, 189, 224) !important;
}
</style>

<body>
    @section('content')
    <div class="container">
        <a href="/inventory/create" class="btn btn-primary" style="margin: 150px 30px 30px 30px; background:green; border:green;">Añade un producto</a>
        <div class="row">
            @foreach ($allBikinis as $item)
                <div class="col-md-4 sm-12">
                    <div class="container card mx-auto" style="width: 18rem; margin:30px;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                    @switch($item)
                                        @case($item->type == 1)
                                            Bikini
                                            @break
                                        @case($item->type == 2)
                                            Cover Up
                                            @break
                                        @case($item->type == 3)
                                            Entero
                                            @break
                                        @default

                                    @endswitch
                            </h6>
                            <p class="card-text"> Precio ${{ $item->price}} </p>
                            <p class="card-text"> Descripción: {{ $item->description}}</p>
                            <p class="card-text"> Disponibilidad: {{ $item->disponibilidad}}</p>
                            <p class="card-text"> Total fotos: {{ $item->total_fotos}}</p>
                            {{-- <p class="card-text"> Link ml: <br> {{ $item->mlink}}</p> --}}
                        <a href="/inventory/{{$item->id}}/edit" class="btn btn-primary mx-auto border border-light" style="margin:10px; background-color: #FCCC33;">Editar</a>
                        {{-- <form action="{{ url('/delete', ['id' => $item->id]) }}" method="POST">
                            <input class="btn btn-danger" type="submit" value="Delete">
                            @method('delete')
                            @csrf
                        </form> --}}
                        {{-- <form action="{{ route ('inventory.destroy', [$item->id])}}" method="POST">
                            @csrf
                            @method('delete')
                              <button class="btn btn-danger btn-sm" type="submit">
                                  Eliminar
                              </button>
                        </form> --}}
                        {!! Form::open(['action' => ['ProductController@destroy', $item->id], 'method' => 'delete'])!!}
                            {{ Form::hidden('_method','DELETE')}}
                            {{Form::submit('Eliminar', ['class'=>'btn btn-danger'])}}
                        {!! Form::close()!!}
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- pagination -->
            {{$allBikinis->links()}}
        </div>
      </div>
    @endsection
</body>



