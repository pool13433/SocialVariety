/*
 * reference :: http://hayageek.com/facebook-javascript-sdk/
 */
define(['facebook', 'jquery', 'semantic'], function () {
    FB.init({
        appId: '485131238347701',
        xfbml: true,
        version: 'v2.6',
        status: true, // check login status
        cookie: true, // enable cookies to allow the server to access the
    });
    /*
     * FB.getLoginStatus(function(response) { console.log(response); });
     */

    /*
     * Login
     */
    FB.login(function (response) {
        if (response.authResponse) {
            $('.item').on('click', function () {
                $('.loading').addClass('active');
                FB.api('/216196569814', {
                    fields: 'posts.limit(20){id,message,picture,object_id,created_time,link,comments,likes,shares,permalink_url},app_links,app_id'
                }, function (response) {
                    $('.special').empty();
                    console.log(response);
                    var indexCard = 0;
                    var indexCardSm = 0;
                    $.each(response.posts.data, function (index, post) {
                        console.log('post.picture ::==', post.picture);
                        if (post.picture != undefined) {
                            if (indexCard < 2) {
                                renderCard(basePath + 'Society/cardBig', '.card-big', post);
                            } else {
                                renderCard(basePath + 'Society/cardSmall', '.card-small', post);
                                indexCardSm++;
                            }
                            indexCard++;

                        }
                    });
                    $('.loading').removeClass('active');
                });
                
            })
            $('.item').eq(0).trigger('click');
        } else {
            console.log('Authorization failed.');
        }
    }, {
        scope: 'publish_actions,user_posts,user_likes,user_photos'
    });
});

function renderCard(urlCard, parentCards, post) {
    $.ajax({
        url: urlCard,
        cache: false,
        type: 'get',
        dataType: 'html',
        beforeSend: function () {
            $('.box-loader').addClass('active');
        },
        success: function (htmlCard) {
            $(parentCards).append($(htmlCard));
            var domCardBig = $(parentCards).find('.card').last();
            replaceFBContentInDomCard(domCardBig, post);
            $(domCardBig).transition({animation: 'scale out'}).transition({
                animation: 'scale in',
                reverse: 'auto', // default setting
                interval: 2000,
                duration: 800,
            });
        }
    }).done(function () {
        $('.box-loader').removeClass('active');
    });
}

function handleSizeImage(post, domImage) {
    console.log(' image id ::==' + post.object_id);
    FB.api('/' + post.object_id, {
        fields: 'images'
    }, function (response) {
        if (response.images != undefined) {
            console.log(response.image);
            $(domImage).attr('src', response.images[0].source);
        } else {
            $(domImage).attr('src', post.picture);
        }
    });
    $('.box-loader').removeClass('active');
}

function replaceFBContentInDomCard(domCardSmall, post) {
    handleSizeImage(post, $(domCardSmall).find('img'));
    //$(domCardSmall).find('img').attr('src', post.picture);
    //$(domCardSmall).find('a.header').text(post.message);
    $(domCardSmall).find('span.date').text(formatDateTime(post.created_time));
    $(domCardSmall).find('span.btn-likes').append('<span>' + checkObjectUndefined(post.likes) + '</span>');
    $(domCardSmall).find('span.btn-comments').append('<span>' + checkObjectUndefined(post.comments) + '</span>');
    $(domCardSmall).find('span.btn-shares').append('<span>' + checkObjectUndefined(post.shares) + '</span>');
    $(domCardSmall).attr('data-content', post.message);
    $(domCardSmall).find('a.link-fb').attr('href',post.permalink_url);
    $('.special .image').dimmer({on: 'hover'});
    $('.card').popup({on: 'hover', posistion: 'bottom center'});
    $('.box-loader').removeClass('active');
}
function checkObjectUndefined(datas) {
    if (datas != undefined) {
        if (datas.data != undefined)
            return datas.data.length;
        else
            return 0;
    } else {
        return 0;
    }
}
function formatDateTime(dateStr) {
    var year, month, day, hour, minute, dateUTC, date, ampm, d, time;
    var iso = (dateStr.indexOf(' ') == -1 && dateStr.substr(4, 1) == '-' && dateStr.substr(7, 1) == '-' && dateStr.substr(10, 1) == 'T') ? true : false;

    year = dateStr.substr(0, 4);
    month = parseInt((dateStr.substr(5, 1) == '0') ? dateStr.substr(6, 1) : dateStr.substr(5, 2)) - 1;
    day = dateStr.substr(8, 2);
    hour = dateStr.substr(11, 2);
    minute = dateStr.substr(14, 2);
    dateUTC = Date.UTC(year, month, day, hour, minute);
    date = new Date(dateUTC);
    var curDate = new Date();

    var currentStamp = curDate.getTime();
    var datesec = date.setUTCSeconds(0);
    var difference = parseInt((currentStamp - datesec) / 1000);
    return difference;
}
