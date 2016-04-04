var app = angular.module('app', [
	'app.filters',
	'app.services',
	'app.components',
	'app.routes',
	'app.config',
	'app.controllers',
	'partialsModule'
]);

angular.module('app.routes', []);
angular.module('app.filters', []);
angular.module('app.services', []);
angular.module('app.config', []);
angular.module('app.controllers', []);
angular.module('app.components', [
	'ui.router', 'ngMaterial', 'ngStorage', 'restangular', 'angular-loading-bar','satellizer'
]);

app.run(function ($rootScope, $state, $auth) {
	$rootScope.$on('$stateChangeStart',
		function (event, toState) {
			var requiredLogin = false;
			if (toState.data && toState.data.requiredLogin)
			{
				requiredLogin = true;
			}
			if (requiredLogin && !$auth.isAuthenticated()) {
				event.preventDefault();
				$state.go('app.login');
			}
		});
});

app.factory('Page', function() {
	var title = 'default';
	console.log('page');
	return {
		title: function() { return title; },
		setTitle: function(newTitle) { title = newTitle }
	};
});