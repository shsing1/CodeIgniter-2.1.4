/*global $*/
/*jslint browser : true, devel: true, regexp: true */
$(function () {
    'use strict';
    var site_root = '/admin',
        my_alert,
        // win = $(window),
        // content = $('#content'),
        doc = $(document);

    $.ajaxSetup({
        type: 'POST',
        dataType: 'json',
        /*complete: function(xhr, textStatus) {
            //called when complete
        },
        success: function(data, textStatus, xhr) {
            //called when successful
        },*/
        error: function(xhr) {
            //called when there is an error
            if (xhr.status !== 200) {
                my_alert(xhr.statusText);
            }
        }
    });

    my_alert = function (message) {
        var div = $('<div>');
        div.attr({'title' : 'title'}).append(message).dialog({'modal' : true});
    };

    /**
     * [load_list_elm description]
     * @return {[type]} [description]
     */
    // function load_list_elm() {
    //     $.ajax({
    //         'url' : site_root + 'admin/entity/list_elm'
    //     });

    // }
    // load_list_elm();

    // 設定主區塊高度
    function set_east_height() {
        var nh = $('#north').height(),
            sh = $('#south').height();
        $('#west, #east').height(doc.height() - nh - sh);
    }
    set_east_height();

    // 設定不換頁連結
    function set_address_link() {
        // Init and change handlers
        $.address.init(function() {
            $('a:not([href^=http])').address();
        }).bind('change', function(event) {
            // Identifies the page selection
            var handler;

            handler = function(data) {
                $('.content').html($('.content', data).html()).parent().show();
                $.address.title(/>([^<]*)<\/title/.exec(data)[1]);
            };
            // Loads the page content and inserts it into the content area
            $.ajax({
                url: site_root + event.path,
                success: function(data) {
                    handler(data);
                }
            });
        });
    }
    set_address_link();
});