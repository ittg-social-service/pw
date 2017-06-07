@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col s12">
		<h4>Agregar referencia</h4>
		 <table>
	        <thead>
	          <tr>
	              <th>Descripción</th>
	              <th>Existecia</th>
	              
	          </tr>
	        </thead>

	        <tbody id="tbl-for-references">
	          
	        </tbody>
	      </table>
	</div>

  <!-- Modal Trigger -->
  

  <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Agregar datos de referencia</h4>
      
	  <div class="row">
	    <form class="col s12">
	      <div class="row">
	        <div class="input-field col s6">
	          <input placeholder="Llena este campo" id="description" type="text" class="validate" name="description">
	          <label for="description">Descripción</label>
	        </div>
	        <div class="input-field col s6">
	          <input id="existence" type="number" class="validate">
	          <label for="existence">Existencia</label>
	        </div>
	      </div>
	      <div class="input-field col s12" id="all_type_references">
	      	<p>Tipo de Recurso</p>
		    
		    
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
          
	<div class="fixed-action-btn">
             <a class="btn-floating btn-large red" href="#modal1">
               <i class="large material-icons">add</i>
             </a>
           </div>
</div>

<script>
	$(document).ready(function(){
		function loadReferences(){
			$.ajax({
	          url: 'http://localhost:8000/references/all',
	          type: 'GET',
	          dataType:"jsonp",
	          success: function(data) {
	          	
	          },
	          error: function(jqXHR, textStatus, error) {
	          	data1 = jqXHR.responseText;
	          	data = JSON.parse(data1);
	            $.each(data, function(i,item) {
	            	
	            	$("#tbl-for-references").append("<tr><td>"+data[i].description+"</td><td><span class='new badge'>"+data[i].existence+"</span></td></tr>");
				});
	          }
	        });	
		}
		loadReferences();
		function loadTypeReferences(){
			$.ajax({
	          url: 'http://localhost:8000/referencestype/all',
	          type: 'GET',
	          dataType:"jsonp",
	          success: function(data) {
	          
	          },
	          error: function(jqXHR, textStatus, error) {
	          	
	          	data2 = jqXHR.responseText;
	          	data3 = JSON.parse(data2);
	            $.each(data3, function(i,item) {
	            	console.log(data3[i]);
	            	$("#all_type_references").append("<p><input name='type_reference' type='radio' id='"+data3[i].id+"' /> <label for='"+data3[i].id+"'> "+ data3[i].type+"</label></p>");
				});
				
	          }
	        });
		}
		loadTypeReferences();
	});

</script>
@endsection
