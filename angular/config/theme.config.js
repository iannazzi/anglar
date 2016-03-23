export function ThemeConfig($mdThemingProvider) {
	'ngInject';
	/* For more info, visit https://material.angularjs.org/#/Theming/01_introduction */
	$mdThemingProvider.theme('default')
		.primaryPalette('grey')
		.accentPalette('orange')
		.warnPalette('red');

	;
}
