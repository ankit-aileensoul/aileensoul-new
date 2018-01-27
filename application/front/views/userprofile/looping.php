 <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
 <script src="<?php echo base_url('assets/js/infinite-scroll.js'); ?>"></script>

<div ng-app='myApp' ng-controller='DemoController'>
  <div infinite-scroll='loadMore()' infinite-scroll-distance='2'>
    <img ng-repeat='image in images' ng-src='http://placehold.it/225x250&text={{image}}'><br>
  </div>
</div>
<script type='text/javascript'>
var myApp = angular.module('myApp', ['infinite-scroll']);
myApp.controller('DemoController', function($scope) {
  $scope.images = [1, 2, 3, 4, 5, 6, 7, 8];
//  $scope.images = [1, 2, 3];

  $scope.loadMore = function() {
    var last = $scope.images[$scope.images.length - 1];
    alert(last);
    for(var i = 1; i <= 8; i++) {
      $scope.images.push(last + i);
    }
  };
});
</script>
