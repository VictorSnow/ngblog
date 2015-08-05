// Make sure to include the `ui.router` module as a dependency
angular.module('blog', [
  'ui.router',
  'ngSanitize'
])
.run(['$rootScope', '$state', '$stateParams',
    function ($rootScope,   $state,   $stateParams) {
    $rootScope.$state = $state;
    $rootScope.$stateParams = $stateParams;
    }
  ]
)
.config(
  [          '$stateProvider', '$urlRouterProvider',
    function ($stateProvider,   $urlRouterProvider) {

      $urlRouterProvider.when('/','/list/1').when('','/list/1').otherwise('/');

      $stateProvider
        .state("list", {
          url: "/list/:id",
          templateUrl: '/template/index.html',
          controller:function($scope, $http,$stateParams,$state, $timeout){
            $scope.page = $stateParams.id;
            $scope.pageSize = 10;
            $scope.list = [];
            $scope.total = 0;

            $http.get('/post/list/'+$scope.page).success(function(ret){
                $scope.list = ret['list'];
                $scope.total = ret['total'];

                $scope.pagers = [];
                for(var i=1 ; i <= Math.ceil($scope.total/$scope.pageSize); i++){
                    $scope.pagers.push(i);
                }
            });
          }
        })
        .state("detail",{
          url: "/detail/:id",
          templateUrl: '/template/detail.html',
          controller:function($scope, $http,$stateParams){
            $scope.postid = $stateParams.id;
            $http.get('/post/detail/'+$scope.postid).success(function(ret){
                $scope.post = ret['post'];
            });
          }
        });
    }
  ]
);
