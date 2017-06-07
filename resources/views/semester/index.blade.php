@extends('layouts.app')

@section('content')
<div ng-app="Semester">
	<div ng-controller="semesterController as vm">
		<div class="row">
			<div class="col" ng-class="{' m6': vm.showReferencesForSubject, 'm12': !vm.showReferencesForSubject}">
				<div class="row">
					
					<div class="col " ng-class="{' m6': vm.showReferencesForSubject, 'm3': !vm.showReferencesForSubject}" ng-repeat="semester in vm.semesters">
						
					  <ul class="collection with-header" >
				        <li class="collection-header"><h4>Semestre <% semester.number %></h4></li>
				        <li class="collection-item" ng-repeat="subject in semester.subjects"><div><% subject.key + "  " + subject.name%><a href="" class="secondary-content" ng-click="vm.toggleReferencesForSubject(subject)"><i class="material-icons">send</i></a></div></li>
				      </ul>
					</div>
				</div>
			</div>
			<div class="col m6 " ng-show="vm.showReferencesForSubject">
				<h4 class="center">Referencias para la materia <% vm.targetSubject.name %></h4>
				<table class="white bordered z-depth-1">
			        <thead>
			          <tr>
			              <th>Descripción</th>
			              <th>Existencia</th>
			              <th>Tipo</th>
			          </tr>
			        </thead>

			        <tbody>
			          <tr ng-repeat="reference in vm.targetSubject.references">
			            <td><% reference.description %></td>
			            <td><% reference.existence %></td>
			            <td><% reference.type.type %></td>
			          </tr>
			     
			        </tbody>
			    </table>
			</div>

			
            
		</div>
	</div>
</div>

<script src="/js/semester.js"></script>
@endsection
