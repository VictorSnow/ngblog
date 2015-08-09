// Make sure to include the `ui.router` module as a dependency
angular.module('blog', [
  'ui.router',
  'ngSanitize',
  'angular-loading-bar'
])
.run(['$rootScope', '$state', '$stateParams',
    function ($rootScope,   $state,   $stateParams) {
    $rootScope.$state = $state;
    $rootScope.$stateParams = $stateParams;
    }
  ]
)
.config(['$stateProvider', '$urlRouterProvider', function ($stateProvider,   $urlRouterProvider) {

      $urlRouterProvider.when('/','/list/1').when('','/list/1').otherwise('/');

      $stateProvider
        .state("list", {
          url: "/list/:id",
          templateUrl: '/template/index.html',
          resolve:{
            lists:['$http','$stateParams',function($http, $stateParams){
              return $http.get('/post/list/'+$stateParams.id).then(function(response){
                return response.data;
              });
            }]
          },
          controller:['$scope','$stateParams','lists',function($scope,$stateParams,lists){
            $scope.page = $stateParams.id;
            $scope.list = lists['list'];
            $scope.total = lists['total'];
            $scope.pagers = [];
            
            for(var i=1 ; i <= Math.ceil($scope.total/10); i++){
                $scope.pagers.push(i);
            }
          }]
        })
        .state("detail",{
          url: "/detail/:id",
          templateUrl: '/template/detail.html',
          resolve:{
            post:['$http','$stateParams',function($http,$stateParams){
              var postid = $stateParams.id;
              return $http.get('/post/detail/'+postid).then(function(response){
                return response.data['post'];
              });
            }]
          },
          controller:['$scope','post',function($scope, post){
            $scope.post = post;
          }
        ]});
    }
  ]
);
