<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.7.5/angular.min.js" integrity="sha256-QRJz3b0/ZZC4ilKmBRRjY0MgnVhQ+RR1tpWLYaRRjSo=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.7.5/angular-route.min.js" integrity="sha256-PQfkC+TI/HZv0O9JbmrLmPyhgOT2hry24vA5yAV59zY=" crossorigin="anonymous"></script>
		
		<!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body ng-app="app">
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="content">
                <div ng-view></div>
				<div class="links">
				  <a href="#!/">Add Customer</a>
				  <a href="#!/search">Search Customer</a>
				</div>
            </div>
        </div>
    </body>
	<script>
	var app = angular.module("app", ["ngRoute"]);
    app.config(function($routeProvider) {
      $routeProvider
      .when("/", {
        templateUrl : "adduser.part",
		controller: "AddUserController"
      })
      .when("/search", {
        templateUrl : "searchuser.part",
		controller: "SearchUserController"
      })
	  .otherwise({
		templateUrl : "adduser.part",
		controller: "AddUserController"
	  });
    });
	app.controller("AddUserController",function($scope,$http){
		$scope.name=null;
		$scope.address=null;
		$scope.isWaiting=false;
		$scope.bknd_response=null;
		$scope.addCustomer = function(){
		    console.debug($scope.name,$scope.address);
			$scope.isWaiting=true;
			$scope.bknd_response=false;
			$http.post('/customer/add',{
				name: $scope.name,
				address: $scope.address
			}).then(function(response){
				$scope.bknd_response=response.data.data;
				$scope.name=$scope.address=null;
				console.debug();
			},function(err){
				console.debug(err);
			}).finally(function(){
				$scope.isWaiting=false;
			});
		}
	});
	app.controller("SearchUserController",function($scope,$http,$sce){
		$scope.name_input=null;
		$scope.name=null;
		$scope.address=null;
		$scope.isWaiting=false;
		$scope.bknd_response=null;
		$scope.searchCustomer = function(){
			$scope.isWaiting=true;
			$scope.bknd_response=false;
			$http.post('/customer/search',{
				name: $scope.name_input
			}).then(function(response){
				$scope.name=response.data.data.name;
				$scope.address=$sce.trustAsHtml(response.data.data.address.replace(/\n/g, "<br />"));
				console.debug();
			},function(err){
				console.debug(err);
				$scope.bknd_response=err.data.message;
		        $scope.name=null;
		        $scope.address=null;
			}).finally(function(){
				$scope.isWaiting=false;
			});
		}
	});
	</script>
</html>
