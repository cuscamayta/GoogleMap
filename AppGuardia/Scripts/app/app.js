var app = angular.module('mapGuardiaApp', []);


app.config(function ($routeProvider) {
    $routeProvider
        .when('/home', {
            controller: 'homeController',
            templateUrl: '/Scripts/app/partials/home.html'
        })
        .when('/admin', {
            controller: 'adminController',
            templateUrl: '/Scripts/app/partials/admin.html'
        })
        .otherwise({
            redirectTo: '/home'
        });
});

app.service('homeService', function ($http, $q) {

    //this.devolverEmpresa = function () {
    //    var defer = $q.defer();
    //    $http.get('/Home/DevolverEmpresa').success(function (response) {
    //        defer.resolve(response);
    //    });
    //    return defer.promise;
    //};

    this.mostrarEmpresaDesdeElservidor = function () {
        var defer = $q.defer();
        $http.get('/Home/DevolverEmpresa').success(function (response) {
            defer.resolve(response);
        });
        return defer.promise;
    };

});


app.controller('homeController', function ($scope, homeService) {

    $scope.empresa = {
        Clave: 'myclave',
        Nombre: 'pep',
        Email: 'pepe@gmail.com'
    };


    $scope.mostrarEmpresa = function () {
        var nuevaEmpresa = homeService.mostrarEmpresaDesdeElservidor();
        nuevaEmpresa.then(function (datos) {
            console.log(datos);
            $scope.empresa = datos;
        })

    };


});

app.controller('adminController', function ($scope) {

});

app.service('loginService', function ($http, $q) {

    this.loginUsuario = function (usuario) {
        var defer = $q.defer();
        $http.post('/Home/LoginUsuario', usuario).success(function (response) {
            defer.resolve(response);
        });
        return defer.promise;
    };

});

app.controller('loginController', function ($scope, $location, loginService) {

    $scope.login = function (e) {
        e.preventDefault();
        loginService.loginUsuario($scope.username, $scope.password).then(function (data) {
            if (data)
                $location.path('/admin');
            else {
                alert('usuario incorrecto');
            }
        });
    };

})