@extends('layouts.ofertas.layout')
  
@section('content')
<br>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>AÑADIR NUEVA OFERTA</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('backend.index') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('backend.store') }}" method="POST"  enctype="multipart/form-data" >
    @csrf
    
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Puesto de trabajo:</strong>
                <input type="text" name="puesto_trabajo" class="form-control" placeholder="Puesto de trabajo">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Empresa/Sede:</strong>
                <input type="text" name="empresa"  class="form-control"  placeholder="Introduce el nombre de tu empresa">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descripcion:</strong>
                <textarea class="form-control" style="height:150px" name="descripcion" placeholder="Introduce aqui una breve descripcion"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jornada:</strong>
                <input type="text" name="jornada" class="form-control" placeholder="Jornada/Horas">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Contrato:</strong>
                <input type="text" name="contrato" class="form-control" placeholder="Indefinido/Temporal/etc">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Salario:</strong>
                <input type="decimal" name="salario" class="form-control" placeholder="Introduce la cantidad en numero y sin utilizar comas">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Imagen:</strong>
                    <input type="file" name="imagen">
                </div>
            </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="number" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection