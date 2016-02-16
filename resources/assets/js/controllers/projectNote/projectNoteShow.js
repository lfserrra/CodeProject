angular.module('app.controllers')
    .controller('ProjectNoteShowController',
    [
        '$scope', '$location', '$routeParams', 'ProjectNote',
        function ($scope, $location, $routeParams, ProjectNote) {
            $scope.projectNote = ProjectNote.get({id: $routeParams.id, noteId: $routeParams.noteId});
        }
    ]
);