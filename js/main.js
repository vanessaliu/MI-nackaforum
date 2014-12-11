/**
 * MI-NackaForum
 */

'use strict';

(function init() {

    var page1 = $('.page1'),
        page2 = $('.page2'),
        next = $('#next');
    
    page2.hide();
    nextPage();

    menuSwitcher();
    menuRouter();
    menuActiveItem();

    lastGridItemSelector();

    console.log('running');
})();

function nextPage() {
    var page1 = $('.page1'),
        page2 = $('.page2'),
        next = $('#next');

    // page2.hide();

    next.on('click', function(event) {
        event.preventDefault();
        page1.hide();
        page2.show();
        console.log('clicked next');
    });
}


function menuSwitcher() {
    var pages = $('.page');
    pages.hide();

    var navItem = $('#navigation ul li');

    navItem.on('click', function() {
        var page = $(this).attr('data-target');
        console.log('pushed', page);
        window.location = '#/' + page;
        menuRouter();
        menuActiveItem();
    });
}


function menuRouter() {
    var pages = $('.page');
    var navItem = $('#navigation ul li');
    var target = navItem.attr('data-target');

    var path = $(location).attr('href');
    var pieces = path.split('/');
    var url = pieces[pieces.length - 1];

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
}

function menuActiveItem() {
    var path = $(location).attr('href');
    var pieces = path.split('/');
    var url = pieces[pieces.length - 1];

    $('li.active').removeClass('active');

    $('li[data-target=' + url + ']').addClass('active');
}

function lastGridItemSelector() {
    $('.section-grid').each(function() {
        $(this).find('.columns').last().addClass('end');
    });
}

 
