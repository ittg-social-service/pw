@extends('layouts.app')

@section('content')
	<div ng-app="Semester">
		<div ng-controller="subjectController as vm">
			<div class="row">
				.
				<form class="col m3  offset-m5">
				<div class="form  grey lighten-4 z-depth-1">
					

					<div class="row">
				        <div class="input-field col s12 m12">
				          <input  id="key" type="text" class="validate" required ng-model="vm.newSubject.key">
				          <label for="key">Clave</label>
				        </div>
				        <div class="input-field col s12 m12">
				          <input id="name" type="text" class="validate" required ng-model="vm.newSubject.name">
				          <label for="name">Nombre</label>
				        </div>
				        <div class="input-field col s12">
						    <select class="browser-default" required ng-model="vm.newSubject.semester">
						      <option value="" disabled selected>Semestre</option>
						      	<option ng-repeat="semester in vm.semesters" value="<% semester.id %>"><% semester.number %></option> 						      
						    </select>
						  </div>
					      <button class="btn waves-effect waves-light col m4 offset-m4 btn-save" type="submit" name="action" ng-click="vm.storeSubject()">Guardar
						    <i class="material-icons right">send</i>
						  </button>
				      </div>
				</div>
			
				</form>
			</div>
		</div>
	</div>
	
	<script src="/js/semester.js"></script>
@endsection