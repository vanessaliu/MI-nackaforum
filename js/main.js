/**
 * MI-NackaForum
 */

'use strict';

(function init() {

    var page1 = $('.page1'),
        page2 = $('.page2');

    page2.hide();
    nextPage();

    menuSwitcher();
    menuRouter();
    menuActiveItem();

    bindModal();

    lastGridItemSelector();

    console.log('running');
})();

function nextPage() {
    var page1 = $('.page1'),
        page2 = $('.page2'),
        next = $('#next'),
        prev = $('#prev');

    next.on('click', function(event) {
        event.preventDefault();
        page1.hide();
        page2.show();
    });
    prev.on('click', function(event) {
        event.preventDefault();
        page2.hide();
        page1.show();
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
