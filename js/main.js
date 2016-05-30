require.config({
    //urlArgs: "bust=" +  (new Date()).getTime(),
    baseUrl: basePath + '/js/',
    paths: {
        'facebook': 'sdk', //connect.facebook.net/en_US/sdk',
        'jquery': 'jquery.min',
        'semantic': 'semantic.min',
        'elastislide': 'jquery.elastislide',
        'modernizr': 'modernizr.custom.17475',
        'jquerypp': 'jquerypp.custom'
    },
    shim: {
        'facebook': {
            exports: 'FB',
            deps: ['moment']
        }, 'jquery': {
            exports: 'jquery'
        }, 'semantic': {
            exports: 'semantic'
        }, 'elastislide' : {
            exports : 'elastislide',
        }
    },
})


require(['fb']);

define(["jquery","elastislide","modernizr"], function () {
    $('#carousel').elastislide({
        minItems : 2
    });
});