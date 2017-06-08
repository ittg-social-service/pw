@extends('layouts.app')

@section('content')


<div class="row" style="margin-left:20px;">
  <h3>Actualizar referencia</h3>
  <!--form class="col s12" action="{{url('references/')}}/{{$reference->id}}" method="PUT">
      {{ csrf_field() }}

  </form-->
  <!---->
  {!!Form::model($reference,['route'=>['references.update',$reference],'method'=>'PATCH','class'=>'col s12'])!!}
    {{csrf_field()}}
    <div class="row">
      <div class="input-field col s6">
        <input value="{{$reference->description}}" placeholder="Llena este campo" id="description" type="text" class="validate" name="description">
        <label for="description">Descripción</label>
      </div>
      <div class="input-field col s6">
        <input value="{{$reference->existence}}" id="existence" type="number" class="validate" name="existence">
        <label for="existence">Existencia</label>
      </div>
    </div>
    <div class="input-field col s12" id="all_type_references">
      <p>Tipo de Recurso</p>
      @foreach ($types as $type)
        <p>
          <input type='radio' value='{{$type->id}}' name='reference_type_id' id="{{$type->id}}"/>
          <label for='{{$type->id}}'>{{$type->type}}</label>
        </p>

      @endforeach

  </div>
    <div class="input-field col s12">
      <input type="submit" value="Actualizar" class="btn">
    </div>
  {!!Form::close()!!}
</div>
@endsection
