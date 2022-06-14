@extends('layouts.ofertas.layout')
  
@section('content')
<br>
{{$oferta['empresa']}}
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>INFORMACION OFERTA DE TRABAJO</h2>
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
   

    @csrf
    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Logo:</strong>
                <img src="\images\{{ $oferta['imagen'] }}" alt="NO DISP" width="400px" height="350px"/>            </div>
        </div>
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Puesto de trabajo:</strong>
                <input type="text" name="puesto_trabajo" readonly class="form-control" value="{{$oferta['puesto_trabajo']}}" placeholder="{{$oferta['puesto_trabajo']}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Empresa/Sede:</strong>
                <input type="text" name="empresa" readonly class="form-control" value="{{$oferta['empresa']}}" placeholder="{{$oferta['empresa']}}">
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descripcion:</strong>
                <textarea class="form-control" style="height:150px" readonly name="descripcion" value="{{$oferta['descripcion']}}">{{$oferta['descripcion']}}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jornada:</strong>
                <input type="text" name="jornada" class="form-control" readonly placeholder="Jornada/Horas"  value="{{$oferta['jornada']}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Contrato:</strong>
                <input type="text" name="contrato" class="form-control" readonly placeholder="Indefinido/Temporal/etc"  value="{{$oferta['contrato']}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Salario:</strong>
                <input type="decimal" name="salario" class="form-control" readonly placeholder="Dinero bruto"  value="{{$oferta['salario']}}">
            </div>
        </div>
        
       
    </div>
   
@endsection