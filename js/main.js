require.config({
    //urlArgs: "bust=" +  (new Date()).getTime(),
    baseUrl: basePath + '/js/',
    paths: {
        'facebook': 'sdk',//connect.facebook.net/en_US/sdk',
        'jquery': 'jquery.min',
        'semantic': 'semantic.min',
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

/*define(["moment"], function (moment) {
 console.log(moment().format());
 });*/