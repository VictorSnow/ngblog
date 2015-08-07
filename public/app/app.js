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
          resolve:{
            lists:function($http, $stateParams){
              $http.get('/post/list/'+$stateParams.id).success(function(response){
                return response.data
              });
            }
          },
          controller:function($scope,$stateParams,lists){
            $scope.page = $stateParams.id;
            $scope.list = lists['list'];
            $scope.total = list['total'];
            $scope.pagers = [];
            
            for(var i=1 ; i <= Math.ceil($scope.total/$scope.pageSize); i++){
                $scope.pagers.push(i);
            }
          }
        })
        .state("detail",{
          url: "/detail/:id",
          templateUrl: '/template/detail.html',
          resolve:{
            post:function($http,$stateParams){
              var postid = $stateParams.id;
              return $http.get('/post/detail/'+postid).then(function(response){
                return response.data['post'];
              });
            }
          },
          controller:function($scope, post){
            $scope.post = post;
          }
        });
    }
  ]
);
