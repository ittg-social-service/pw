@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col s12">
		<h4>Referencias</h4>
		 <table>
	        <thead>
	          <tr>
	              <th>Clave</th>
	              <th>Nombre</th>
								<th>
									Semestre
								</th>
								<!--th>
									Elimincacion
								</th-->
	          </tr>
	        </thead>

	        <tbody id="tbl-for-references">
						@foreach ($subjects as $subject)
              <tr>
                <th>
                  {{$subject->key}}
                </th>
                <th>
                  {{$subject->name}}
                </th>
                <th>
                  {{$subject->semester_id}}
                </th>
              </tr>
						@endforeach
	        </tbody>
	      </table>
	</div>
</div>
@endsection
