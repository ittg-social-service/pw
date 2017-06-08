@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col s12">
		<h4>Referencias</h4>
		 <table>
	        <thead>
	          <tr>
	              <th>Descripción</th>
	              <th>Existecia</th>
								<th>
									Edicion
								</th>
								<!--th>
									Elimincacion
								</th-->
	          </tr>
	        </thead>

	        <tbody id="tbl-for-references">
						@foreach ($references as $reference)
							<tr>
								<td>
									{{$reference->description}}
								</td>
								<td>
									{{$reference->existence}}
								</td>
								<td>
									<a href="{{route('references.show',$reference->id)}}" class="btn waves-effect">Editar</a>
								</td>
								<!--td>

								</td-->
							</tr>
						@endforeach
	        </tbody>
	      </table>
	</div>

  <!-- Modal Trigger -->


  <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Agregar datos de referencia</h4>

	  <div class="row">
	    <form class="col s12" action="{{route('references.store')}}" method="POST">
	      	{{ csrf_field() }}
	      <div class="row">
	        <div class="input-field col s6">
	          <input placeholder="Llena este campo" id="description" type="text" class="validate" name="description">
	          <label for="description">Descripción</label>
	        </div>
	        <div class="input-field col s6">
	          <input id="existence" type="number" class="validate" name="existence">
	          <label for="existence">Existencia</label>
	        </div>
	      </div>

	      	<div class="input-field s12">
	      		<p>Tipo de Recurso</p>
	      	</div>
		    	@foreach ($types as $type)
						<p>

							<input type="radio" value="{{$type->id}}" name="reference_type_id" id="{{$type->id}}"/>
							<label for='{{$type->id}}'>*{{$type->type}}*</label>
						</p>
		    	@endforeach


	      <div class="input-field col s12">
	      	<input type="submit" value="Registrar" class="btn">
	      </div>
	    </form>
	  </div>

    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
  </div>
  <div id="modal2" class="modal">
    <div class="modal-content">
      <h4>Agregar Tipo de referencia</h4>

	  <div class="row">
	    <form class="col s12" method="POST" action="{{route('referencetype.store')}}">
	          {{ csrf_field() }}
	      <div class="row">

	        <div class="input-field col s6">
	          <input placeholder="Llena este campo" type="text" class="validate" name="type">
	          <label for="description">Descripción</label>
	        </div>

	      </div>

	      <div class="input-field col s12">
	      	<input type="submit" value="Registrar" class="btn">
	      </div>
	    </form>
	  </div>

    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
  </div>

  <div class="fixed-action-btn horizontal">
    <a class="btn-floating btn-large red">
      <i class="large material-icons">add</i>
    </a>
    <ul>
      <li><a class="btn-floating red tooltipped z-depth-2" data-position="left" data-tooltip="Agregar referencia" href="#modal1" ><i class="material-icons">class</i></a></li>
      <li><a class="btn-floating red tooltipped z-depth-2" data-position="left" data-tooltip="Agregar nuevo tipo dereferencia" href="#modal2" ><i class="material-icons">subject</i></a></li>
    </ul>
  </div>


</div>

<script>

</script>
@endsection
