angular.module('app.controllers')
    .controller('ProjectNewController',
    [
        '$scope', '$location', '$cookies', 'Project', 'Client',
        function ($scope, $location, $cookies, Project, Client) {
            $scope.clients = Client.query();
            $scope.project = new Project();
            $scope.project.owner_id = $cookies.getObject('user').id;
            $scope.status = [
                {"id_status": 1, "status": "Aberto"},
                {"id_status": 2, "status": "Finalizado"},
                {"id_status": 3, "status": "Cancelado"},
            ];

            $scope.save = function () {
                if ($scope.form.$valid) {
                    $scope.project.$save().then(function () {
                        $location.path('/projects');
                    });
                }
            }
        }
    ]
);