<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="https://connect.facebook.net/en_US/sdk.js"></script>
    </head>
    <body>
        <button type="button" id="btnPostFeed">Click Pots Feed</button>
        <script>
            $(document).ready(function () {
                FB.init({
                    appId: '367848656606301',
                    version: 'v2.5' // or v2.0, v2.1, v2.2, v2.3
                });

                FB.login(function () {
                    // Note: The call will only work if you accept the permission request
                    //FB.api('/me?fields=id,name,birthday,email,picture,photos', 'get', {
                    FB.api('/me?fields=albums.limit(5){name, photos.limit(5)},posts.limit(5)', 'get', {
                    }, function (response) {
                        console.log(response);
                        $.each(response.albums, function (index, album) {
                            console.log(album);
                        });
                    });
                }, {
                    scope: 'publish_actions'
                });

            });
        </script>
    </body>
</html>