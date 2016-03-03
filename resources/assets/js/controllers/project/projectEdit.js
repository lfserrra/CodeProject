angular.module('app.controllers')
    .controller('ProjectEditController',
    [
        '$scope', '$location', '$routeParams', 'Project', 'Client',
        function ($scope, $location, $routeParams, Project, Client) {

            $scope.clients = Client.query();
            $scope.project = Project.get({id: $routeParams.id});
            $scope.status = [
                {"id_status": 1, "status": "Aberto"},
                {"id_status": 2, "status": "Finalizado"},
                {"id_status": 3, "status": "Cancelado"},
            ];

            $scope.save = function () {
                if ($scope.form.$valid) {
                    Project.update(
                        {id: $scope.project.project_id},
                        $scope.project,
                        function () {
                            $location.path('/projects');
                        },
                        function () {
                            alert('Erro!');
                        }
                    );
                }
            }
        }
    ]
);