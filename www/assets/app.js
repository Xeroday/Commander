'use strict';

var myApp = angular.module('commander', []);

myApp.directive('popover', function () {
    return {
        restrict:'A',
        link: function(scope, element, attrs)
        {
            $(element)
                .attr("data-content", "<img src='filestore/" + scope.$eval(attrs.hwid) + "/latest.png'>")
                .popover({placement: "left", html: true, trigger: "hover"});
        }
    }
})

function AllCtrl($scope) {
    var request = $.post('sql.php', 'function=getAll', function(r) {
        console.log(r);
        $scope.connections = eval(r);
        $scope.sort = 'os';
        $scope.$apply();
    });

    var countAll = $.post('sql.php', 'function=countAll', function(r) {
        $scope.allCount = eval(r);
    });

    var countOnline = $.post('sql.php', 'function=countOnline', function(r) {
        $scope.onlineCount = eval(r);
    });

    $scope.sortBy = function(col) { 
        if ($scope.sort == col) {
            $scope.sort = ('-' + col);
        } else {
            $scope.sort = col;
        }
    }
}

function OnlineCtrl($scope) {
    var request = $.post('sql.php', 'function=getOnline', function(r){ 
        console.log(r);
        $scope.connections = eval(r);
        $scope.$apply();
    });
}

$(function () {
    $('.checkall').on('click', function () {
        $(this).closest('fieldset').find(':checkbox').prop('checked', this.checked);
    });
});