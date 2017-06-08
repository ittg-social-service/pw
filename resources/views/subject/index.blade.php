@extends('layouts.app')

@section('content')
<div ng-app="Semester">
	<div ng-controller="subjectController as vm">
		<div class="row">
        <div class="col m8 offset-m2">
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
            <table class="bordered  my-table z-depth-1 centered">
                <thead>
                  <tr>
                      <th ng-click="vm.sortBy = 'key'; vm.reverse = !vm.reverse">Clave</th>
                      <th ng-click="vm.sortBy = 'name'; vm.reverse = !vm.reverse">Nombre</th>
                      <th ng-click="vm.sortBy = 'semester.number'; vm.reverse = !vm.reverse">Semestre</th>
                      <th ng-click="vm.sortBy = 'references.length'; vm.reverse = !vm.reverse">Referencias</th>
                  </tr>
                </thead>

                <tbody>
                  <tr ng-repeat="subject in vm.subjects | orderBy:vm.sortBy:vm.reverse | filter:searchTarget">
                    <td><% subject.key %></td>
                    <td><% subject.name %></td>
                    <td><% subject.semester.number %></td>
                    <td><% subject.references.length %></td>
                     <td>
                        <a class="btn-flat green-text modal-trigger" href="#update-subject-modal" ng-click="vm.subjectToEdit = subject"><i class="material-icons">mode_edit</i></a>
                        {{-- <button class="btn-flat red-text"><i class="material-icons">delete_forever</i></button> --}}
                     </td>
                     <td>
                        <a href="#add-reference-to-subject-modal" class="btn" ng-click="vm.subjectToAddReference = subject"> Agregar referencia</a>

                    
                     </td>
                  </tr>
                
                </tbody>
              </table>
        </div>      
        </div>
          <div class="fixed-action-btn">
             <a class="btn-floating btn-large red" href="/subjects/create">
               <i class="large material-icons">add</i>
             </a>
           </div>

         <!-- Modal Structure -->
         <div id="update-subject-modal" class="modal modal-fixed-footer">
            <div class="modal-content">
               <h4>Actualizar materia</h4>
              
               <div class="row">
                  <form class="col m8 offset-m2">
                     <div class="row">
                          <div class="input-field col s12 m12">
                            <input  id="key" type="text" class="validate" placeholder="clave" required ng-focus="1==1" ng-model="vm.subjectToEdit.key">
                        {{--     <label for="key">Clave</label> --}}
                          </div>
                          <div class="input-field col s12 m12">
                            <input id="name" type="text" class="validate" placeholder="Nombre" required ng-model="vm.subjectToEdit.name">
                         {{--    <label for="name">Nombre</label> --}}
                          </div>
                          <div class="input-field col s12">
                            <select class="browser-default" required ng-model="vm.subjectToEdit.newSemester">
                              <option value="" disabled>Semestre</option>
                                 <option 
                                    ng-repeat="semester in vm.semesters" 
                                    ng-selected="vm.subjectToEdit.semester.id == semester.id"
                                    value="<% semester.id %>"><% semester.number %></option>                         
                            </select>
                          </div>
                        </div>
                 {{--        <button class="btn waves-effect waves-light" type="submit" name="action" ng-click="vm.storeSubject()">Guardar
                         <i class="material-icons right">send</i>
                       </button> --}}
               
                  </form>
               </div>
            </div>
            <div class="modal-footer">
             <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat " ng-click="vm.updateSubject()">Actualizar</a>
             <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Cancelar</a>
            </div>
         </div>

         {{-- Agregar referncia a materia --}}
         <div id="add-reference-to-subject-modal" class="modal bottom-sheet">
            <div class="modal-content">
               <h4>Agregar referncias a la materia <% vm.subjectToAddReference.name %></h4>
               <table class="white bordered z-depth-1">
                    <thead>
                      <tr>
                          <th>Descripción</th>
                          <th>Existencia</th>
                          <th>Tipo</th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr ng-repeat="reference in vm.references" >
                        <td ng-class="{'red-text': reference.id == vm.subjectToAddReference.references[$index].id}"><% reference.description %></td>
                        <td ><% reference.existence %></td>
                        <td><% reference.type.type %></td>
                        <td>
                           <button class="btn-flat green-text" ng-hide="reference.id == vm.subjectToAddReference.references[$index].id" ng-click="vm.addReferenceToSubject(vm.subjectToAddReference, reference)">
                              <i class="material-icons">add</i>
                           </button>
                           <button class="btn-flat red-text" ng-show="reference.id == vm.subjectToAddReference.references[$index].id" ng-click="vm.removeReferenceToSubject(vm.subjectToAddReference, reference)">
                              -
                           </button>
                        </td>
                   
                      </tr>
                 
                    </tbody>
               </table>
            </div>
            <div class="modal-footer">

               <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Hecho</a>
            </div>
         </div>
	</div>
</div>
<script src="/js/semester.js"></script>
@endsection
