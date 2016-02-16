angular.module('app.controllers')
    .controller('ProjectNoteRemoveController',
    [
        '$scope', '$location', '$routeParams', 'ProjectNote',
        function ($scope, $location, $routeParams, ProjectNote) {
            $scope.projectNote = ProjectNote.get({id: $routeParams.id, noteId: $routeParams.noteId});

            $scope.remove = function () {
                ProjectNote.delete(
                    {id: $scope.projectNote.project_id, noteId: $scope.projectNote.id},
                    $scope.projectNote,
                    function () {
                        $location.path('/project/'+$routeParams.id+'/notes');
                    },
                    function () {
                        alert('Erro!');
                    }
                );
            }
        }
    ]
);