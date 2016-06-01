require.config({
    //urlArgs: "bust=" +  (new Date()).getTime(),
    baseUrl: basePath + '/js/',
    paths: {
        'facebook': 'sdk', //connect.facebook.net/en_US/sdk',
        'jquery': 'jquery.min',
        'semantic': 'semantic.min',        
        'jquerypp': 'jquerypp.custom',
        'perfect-scrollbar.jquery': 'perfect-scrollbar.jquery',
        'perfect-scrollbar' : 'perfect-scrollbar',
    },
    shim: {
        'facebook': {
            exports: 'FB',
            deps: ['moment']
        }, 'jquery': {
            exports: 'jquery'
        }, 'semantic': {
            exports: 'semantic'
        }
    },
})


require(['fb']);

define(["jquery","perfect-scrollbar","perfect-scrollbar.jquery"], function () {
    $('#carousel').perfectScrollbar();
});