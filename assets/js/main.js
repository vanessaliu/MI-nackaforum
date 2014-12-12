/**
 * MI-NackaForum
 */

'use strict';

(function init() {

    menuSwitcher();
    menuRouter();
    menuActiveItem();

    bindPagination();

    bindModal();

    lastGridItemSelector();

    console.log('running');
})();

function bindPagination() {
    $('body').on('click', '#next, #prev', function(event) {
        event.preventDefault();
        $.ajax({
            url: $(this).attr('href')
        }).done(function(data) {
            $('#section-all').remove();
            $(data).insertAfter('#section-start');
            lastGridItemSelector();
        });
    });
}

function menuSwitcher() {
    var pages = $('.page');
    pages.hide();

    var navItem = $('#navigation ul li');
    var pageLink = $('.pagelink');

    navItem.on('click', function() {
        var page = $(this).attr('data-target');
        window.location = '#/' + page;
        menuRouter();
        menuActiveItem();
    });

    pageLink.on('click', function() {
        var page = $(this).attr('data-target');
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
    if (url.length) {
        $('li[data-target=' + url + ']').addClass('active');
    } else {
        $('li[data-target="tavla"]').addClass('active');
    }
}

function lastGridItemSelector() {
    $('.section-grid').each(function() {
        $(this).find('.columns').last().addClass('end');
    });

}


function bindModal() {
    $('.open-modal').on('click', function() {
        var imageId = $(this).attr('data-id');

        $.ajax({
            url: '/loadImage.php?imageId=' + imageId,
        }).done(function(data) {
            $(data).appendTo('body');
            $('.modal-overlay').on('click', function() {
                $('.modal').remove();
                $('.modal-overlay').remove();
            });
            $('.close-modal').on('click', function() {
                $('.modal').remove();
                $('.modal-overlay').remove();
            })
        });
    });
}
