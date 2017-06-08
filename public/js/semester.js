angular.module('Semester', ['common'], function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    }
 )
.controller('semesterController', ['$http', 'API', function  ($http, API) {
	var vm = this;
	vm.showReferencesForSubject = false;
	vm.semesters = [];

	API.getSemesters().then(function successCallback(response) {
	    vm.semesters = response.data;
	    
	    vm.semesters.forEach(function (semester) {

	    	API.subjectsForSemester(semester.id).then(function  (response) {
	    		semester.subjects = response.data;
	    		console.log(semester);
	    	});
	    })
	    
	 });

	vm.toggleReferencesForSubject = function(subject) {
		vm.showReferencesForSubject = true;
		vm.targetSubject = subject;
		API.getReferencesForSubject(subject.id).then(function successCallback(response) {
		    vm.targetSubject.references = response.data;
		    
		    vm.targetSubject.references.forEach(function (reference) {

		    	API.getTypeForReference(reference.id).then(function  (response) {
		    		reference.type = response.data;
		    		console.log(reference);
		    	});
		    })
		    
		 });
	}
}])

.controller('subjectController', ['$http', 'API', function  ($http, API) {
	var vm = this;
	vm.title = "mas";
	vm.subjects = [];
	vm.semesters = [];

	API.getSemesters().then(function successCallback(response) {
	    vm.semesters = response.data;
	 });
	getSubjects();
	getReferences();
	function getSubjects() {
		API.getSubjects().then(function successCallback(response) {
		    vm.subjects = response.data;
		    
		    vm.subjects.forEach(function (subject) {

		    	API.getSemesterForSubject(subject.id).then(function  (response) {
		    		subject.semester = response.data;
		    		console.log(subject);
		    	});

		    	API.getReferencesForSubject(subject.id).then(function  (response) {
		    		subject.references = response.data;
		    		console.log(subject);
		    		if (vm.subjectToAddReference) {
		    			if (vm.subjectToAddReference.id == subject.id) {
		    				vm.subjectToAddReference = subject;
		    			}
		    		
						console.log("vm.subjectToAddReference");
						console.log(vm.subjectToAddReference);
		    		}
		    	});
		    })
		    
		 });

	}

	/*traer todas las referencias de la base de datos*/
	function getReferences(){

		API.getReferences().then(function  (response) {
			vm.references = response.data;
			console.log(vm.references);
			vm.references.forEach(function  (reference)	 {
				
				API.getTypeForReference(reference.id).then(function  (response) {
			    		reference.type = response.data;
			    		console.log(reference);
			    });
			});
			if(response.data.status == "1"){
				//API.makeToast("Materia creada", 2);
			}
		});
	}


	vm.storeSubject = function storeSubject () {
		API.storeSubject(vm.newSubject).then(function  (response) {
			if(response.data.status == "1"){
				API.makeToast("Materia creada", 2);
			}
		});
	}

	vm.updateSubject = function updateSubject () {
		if (!vm.subjectToEdit.newSemester) {
			vm.subjectToEdit.newSemester = vm.subjectToEdit.semester.id;
		}

		API.updateSubject(vm.subjectToEdit).then(function  (response) {
			console.log(response);
			if(response.data.status == "1"){
				API.makeToast("Materia actualizada", 2);
				getSubjects();
			}
		});
	}


	vm.addReferenceToSubject = function (subject, ref) {
		API.addReferenceToSubject(subject.id, ref.id).then(function  (response) {
			console.log(response.data);
			API.makeToast("Referencia agregada");
			getSubjects();
		
			getReferences();
		});
	}

	vm.removeReferenceToSubject = function (subject, ref) {
		API.removeReferenceToSubject(subject.id, ref.id).then(function  (response) {
			console.log("response.data");
			console.log(response.data);
			API.makeToast("Referencia removida");
			getSubjects();
			getReferences();
		});
	}
}])


.controller('subjectReferenceController', ['$http', 'API', function  ($http, API) {
var vm = this;
	vm.title = "mas";
	vm.subjects = [];
	vm.semesters = [];

	API.getSemesters().then(function successCallback(response) {
	    vm.semesters = response.data;
	 });
	getSubjects();
	getReferences();
	function getSubjects() {
		API.getSubjects().then(function successCallback(response) {
		    vm.subjects = response.data;
		    
		    vm.subjects.forEach(function (subject) {

		    	API.getSemesterForSubject(subject.id).then(function  (response) {
		    		subject.semester = response.data;
		    		console.log(subject);
		    	});

		    	API.getReferencesForSubject(subject.id).then(function  (response) {
		    		subject.references = response.data;
		    		console.log(subject);
		    		if (vm.subjectToAddReference) {
		    			if (vm.subjectToAddReference.id == subject.id) {
		    				vm.subjectToAddReference = subject;
		    			}
		    		
						console.log("vm.subjectToAddReference");
						console.log(vm.subjectToAddReference);
		    		}
		    	});
		    })
		    
		 });

	}

	/*traer todas las referencias de la base de datos*/
	function getReferences(){

		API.getReferences().then(function  (response) {
			vm.references = response.data;
			console.log(vm.references);
			vm.references.forEach(function  (reference)	 {
				
				API.getTypeForReference(reference.id).then(function  (response) {
			    		reference.type = response.data;
			    		console.log(reference);
			    });
			});
			if(response.data.status == "1"){
				//API.makeToast("Materia creada", 2);
			}
		});
	}


	vm.storeSubject = function storeSubject () {
		API.storeSubject(vm.newSubject).then(function  (response) {
			if(response.data.status == "1"){
				API.makeToast("Materia creada", 2);
			}
		});
	}

	vm.updateSubject = function updateSubject () {
		if (!vm.subjectToEdit.newSemester) {
			vm.subjectToEdit.newSemester = vm.subjectToEdit.semester.id;
		}

		API.updateSubject(vm.subjectToEdit).then(function  (response) {
			console.log(response);
			if(response.data.status == "1"){
				API.makeToast("Materia actualizada", 2);
				getSubjects();
			}
		});
	}


	vm.addReferenceToSubject = function (subject, ref) {
		API.addReferenceToSubject(subject.id, ref.id).then(function  (response) {
			console.log(response.data);
			API.makeToast("Referencia agregada");
			getSubjects();
		
			getReferences();
		});
	}

	vm.removeReferenceToSubject = function (subject, ref) {
		API.removeReferenceToSubject(subject.id, ref.id).then(function  (response) {
			console.log("response.data");
			console.log(response.data);
			API.makeToast("Referencia removida");
			getSubjects();
			getReferences();
		});
	}
}])