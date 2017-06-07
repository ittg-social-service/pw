@extends('layouts.app')

@section('content')
	<div ng-app="Semester">
		<div ng-controller="subjectController as vm">
			<div class="row">
				<form class="col m3">
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
				      </div>
				      <button class="btn waves-effect waves-light" type="submit" name="action" ng-click="vm.storeSubject()">Guardar
					    <i class="material-icons right">send</i>
					  </button>
			
				</form>
			</div>
		</div>
	</div>
	
	<script src="/js/semester.js"></script>
@endsection