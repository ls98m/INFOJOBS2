@extends('layouts.app')

@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif   
	@section('content')
    </div>
		<form action="search" method="get">
			<button style="width:100%;padding-bottom:1px " type="submit" class = "btn btn-info"><H5>B U S C A R</H5></button>

            <div class="panel-body">
                <input type="text" name="puesto_trabajo" class="form-control" placeholder="REALIZAR BUSQUEDA POR TITULO / PUESTO TRABAJO" required="required">
				<a href="{{route('backend.index')}}"  class="btn btn-warning">DESHACER BUSQUEDA</a>

        </div>
		<br>
        </form>
    </div>
@if(Auth::check()) 
<div class="panel panel-success">
<div class="panel-footer">
	
      

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="panel-body">
                <a style="width:100%;margin-bottom:1px;color:black;font-weight:bold;letter-spacing: 2px
" class="btn btn-success" href="{{ route('backend.create') }}"> CREAR NUEVA OFERTA</a>
            </div>
        </div>
    </div>
	
@endif

<table class="table table-bordered">
        <tr>
            <th>Foto</th>
            <th>Titulo/Puesto Trabajo</th>
            <th>Empresa/Sede</th>
			<th>Salario</th>
            <th colspan="3" width="240px">Opciones</th>
        </tr>
	
		@if(Auth::check()) 
		@foreach($ofertas as $oferta) 
		@if(Auth::user()->id == $oferta['id_empresa']) 
			<td>                <img src="\images\{{ $oferta['imagen'] }}" alt="NO DISP" width="150" height="100px"/>            </div>
</td>
			<td>{{$oferta['puesto_trabajo']}}</td>
			<td>{{$oferta['empresa']}}</td>
			<td>{{$oferta['salario']}}</td>

			<td  style="border:none"> <form action="{{ route('backend.destroy',$oferta['id_oferta']) }}" method="POST">
   
   <a class="btn btn-info" href="{{ route('backend.show',$oferta['id_oferta']) }}">MOSTRAR</a>

   <a class="btn btn-primary" href="{{ route('backend.edit',$oferta['id_oferta']) }}">EDITAR</a>

   @csrf
   @method('DELETE')

   <button type="submit" class="btn btn-danger">BORRAR</button>
</form>
            </td>
        </tr>
		@endif
        @endforeach
   
		@else

		@foreach($ofertas as $oferta) 
			<td>no funcion</td>
			<td>{{$oferta['puesto_trabajo']}}</td>
			<td>{{$oferta['empresa']}}</td>
			<td>{{$oferta['salario']}}</td>
			<td>  <a class = "btn btn-info" href = "{{ route('backend.show',$oferta['id_oferta'])}}"> Mostrar </a>
        </tr>
        @endforeach
		</table>
		@endif	
@endsection