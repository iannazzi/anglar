export function SatellizerConfig($authProvider) {
    'ngInject';

    $authProvider.loginUrl = '/api/auth/login';
    $authProvider.signupUrl = '/auth/signup';
    $authProvider.tokenRoot = 'data';




}