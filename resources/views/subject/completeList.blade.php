@extends('layouts.app')

@section('content')
	<div ng-app="Semester">
		<div ng-controller="subjectReferenceController as vm">
		<div class="row">
			
			   <div class="col m8 offset-m2 white">
			        <nav>
				    <div class="nav-wrapper my-table">
				      <form>
				        <div class="input-field">
				          <input id="search" type="search" required ng-model="searchTarget">
				          <label class="label-icon" for="search"><i class="material-icons">search</i></label>
				          <i class="material-icons">close</i>
				        </div>
				      </form>
				    </div>
				  </nav>
	            <table class="bordered striped my-table z-depth-1 centered">
	                <thead>
	                  <tr>
	                    <th ng-click="vm.sortBy = 'key'; vm.reverse = !vm.reverse">Clave</th>
                      <th ng-click="vm.sortBy = 'name'; vm.reverse = !vm.reverse">Nombre</th>
                      <th ng-click="vm.sortBy = 'semester.number'; vm.reverse = !vm.reverse">Semestre</th>
                      <th ng-click="vm.sortBy = 'references.length'; vm.reverse = !vm.reverse">Referencias</th>
	                  </tr>
	                </thead>

	                <tbody>
	                  <tr ng-repeat="subject in vm.subjects| orderBy:vm.sortBy:vm.reverse | filter:searchTarget">
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