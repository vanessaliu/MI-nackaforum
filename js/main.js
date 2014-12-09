/**
 * MI-NackaForum
 */

'use strict';

(function init() {

    menuRouter();

    console.log('running');
})();


/**
 * [calculateFullHeight description]
 * @param  {[type]} el [description]
 * @return {[type]}    [description]
 */
function menuRouter() {
    var pages = $('.page');
    pages.hide();
    $('#section-start').show();


    var navItem = $('#navigation ul li');
    navItem.on('click', function() {
        var page = $(this).attr('data-target');
        console.log('pushed', page);
        window.location = '#/' + page;


        var path = $(location).attr('href');
        var pieces = path.split('/');
        var url = pieces[5];
        console.log(path, pieces, url);

        switch(url) {
            case 'tavla':
                pages.hide();
                $('#section-start').show();
            break;

            case 'allabidrag':
                pages.hide();
                $('#section-all').show();
            break;

            case 'topplista':
                pages.hide();
                $('#section-top').show();
            break;

            case 'vinnare':
                pages.hide();
                $('#section-winners').show();
            break;

            case 'reglerochpriser':
                pages.hide();
                $('#section-rules').show();
            break;

            default:
                pages.hide();
                $('#section-start').show();
            break;
        }
    });

}






// };
