@extends('layouts.app')

@section('content')
	<div ng-app="Semester">
		<div ng-controller="subjectReferenceController as vm">
		<div class="row">
			
			   <div class="col m8 offset-m2 white">
	            <table class="bordered striped my-table z-depth-1 centered">
	                <thead>
	                  <tr>
	                      <th>Clave</th>
	                      <th>Nombre</th>
	                      <th>Semestre</th>
	                      <th>Referencias</th>
	                  </tr>
	                </thead>

	                <tbody>
	                  <tr ng-repeat="subject in vm.subjects">
	                    <td><% subject.key %></td>
	                    <td><% subject.name %></td>
	                    <td><% subject.semester.number %></td>
	                    <td>
	                    	<ul>
	                    		<li ng-repeat="reference in subject.references"><% reference.description%></li>
	                    	</ul>
	                    </td>
	                  </tr>
	                
	                </tbody>
	              </table>
	        </div> 
		</div>
		</div>
	</div>
	<script src="/js/semester.js"></script>
@endsection