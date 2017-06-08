angular.module('common',[])
.service('API', ['$http', function($http){
   this.token = $('meta[name="csrf-token"]').attr('content');

   /*
      SEMESTRES
   */

   this.getSemesters = function  () {
      
      return $http({ method: 'GET', url: '/semester/all/' });
    }
    
    this.subjectsForSemester = function  (semester) {
      
      return $http({ method: 'GET', url: '/semester/' + semester + '/subjects' });
    }

    /*
      MATERIAS
    */
    this.getSubjects = function  () {
      
      return $http({ method: 'GET', url: '/subject/all/' });
    }
    this.getReferencesForSubject = function  (subject) {
      
      return $http({ method: 'GET', url: '/subject/' + subject + '/references' });
    }
    this.getSemesterForSubject = function  (subject) {
      
      return $http({ method: 'GET', url: '/subject/' + subject + '/semester' });
    }
     this.storeSubject = function (data) {
      return $http({ 
        method: 'POST',
        url: '/subjects',
          headers: {
              'X-CSRF-TOKEN': this.token
            },
          data: data 
        })
    }
    this.updateSubject = function (data) {
      return $http({ 
        method: 'PUT',
        url: '/subjects/'+ data.id ,
          headers: {
              'X-CSRF-TOKEN': this.token
            },
          data: data 
        })
    }

    this.addReferenceToSubject = function (subject, ref) {
      return $http({ 
        method: 'POST',
        url: '/subject/newReference',
          headers: {
              'X-CSRF-TOKEN': this.token
            },
          data: {'id': subject, 'reference_id': ref} 
        })
    }
     this.removeReferenceToSubject = function (subject, ref) {
      return $http({ 
        method: 'POST',
        url: '/subject/quitReference',
          headers: {
              'X-CSRF-TOKEN': this.token
            },
          data: {'id': subject, 'reference_id': ref} 
        })
    }

    /*
      REFERENCIAS
    */
    this.getReferences = function  () {
      
      return $http({ method: 'GET', url: '/references/all' });
    }
    this.getTypeForReference = function  (reference) {
      
      return $http({ method: 'GET', url: '/reference/' + reference + '/type' });
    }

    this.storeReference = function (data) {
      return $http({ 
        method: 'POST',
        url: '/reference',
          headers: {
              'X-CSRF-TOKEN': this.token
            },
          data: data 
        })
    }


    this.getGroups = function() {
      return $http({ method: 'GET', url: '/group/list' });
    }

    this.getStudents = function  (page, period) {
      
      return $http({ method: 'GET', url: '/student/list/' + period + '', params: {page: page,amount:30} });
    }
    this.getGroupsInPeriod = function(period) {
      return $http({ method: 'GET', url: '/group/list-for-period/' + period + '' });
    }

    this.getStudentsInPeriod = function  (period) {
      return $http({ method: 'GET', url: '/student/list-for-period/' + period + '' });
    }
    this.getStudentsForGroup = function  (group) {
      return $http({ method: 'GET', url: '/group/' + group + '/students' + '' });
    }
    this.getTutors = function  () {
      return $http({ method: 'GET', url: '/tutor/list' })
    }
    this.getPeriods = function  () {
      return $http({ method: 'GET', url: '/period/list' })
    }
    this.storeStudent = function (data) {
      return $http({ 
        method: 'POST',
        url: '/student',
          headers: {
              'X-CSRF-TOKEN': this.token
            },
          data: data 
        })
    }
    this.storeTutor = function (data) {
      return $http({ 
        method: 'POST',
        url: '/tutor',
          headers: {
              'X-CSRF-TOKEN': this.token
            },
          data: data 
        })
    }


    this.makeToast =  function makeToast (text, error) {
      var className;
      switch(error) {
        case 1:
            className = 'red';
          break;
        case 2:
            className = 'green';
          break;
        default:
          className = 'blue';
          break;
      }
      var $toastContent = $('<span> ' + text + '</span>');
      Materialize.toast($toastContent, 5000, className);
    }

}])
.directive('select', materialSelect);
materialSelect.$inject = ['$timeout'];

  function materialSelect($timeout) {
    var directive = {
      link: link,
      restrict: 'E',
      require: '?ngModel'
    };

    function link(scope, element, attrs, ngModel) {
      if (ngModel) {
        ngModel.$render = create;
      }else {
        $timeout(create); 
      }

      function create() {
        element.material_select();
      }

      //if using materialize v0.96.0 use this
      element.one('$destroy', function () {
        element.material_select('destroy');
      });
      
      //not required in materialize v0.96.0
      element.one('$destroy', function () {
        var parent = element.parent();
        if (parent.is('.select-wrapper')) {
          var elementId = parent.children('input').attr('data-activates');
          if (elementId) {
            $('#' + elementId).remove();
          }
          parent.remove();
          return;
        }

        element.remove();
      });
    }

    return directive;
  }
