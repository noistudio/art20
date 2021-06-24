// JavaScript Document
(function() {
    'use strict';
    $(document).ready(function(){

        var doc_url_path = document.location.pathname.replace(/\//g, ''),
            search_url_in_nav;

        if (document.getElementById('sideBar')){

            var this_nav_url;
            var str_array = $('.sidebar-link');

            $.each(str_array,function(){
                this_nav_url = $(this).attr('href').replace(/\//g, '');

                console.log('doc = '+doc_url_path);
                console.log('nav = '+this_nav_url);

                if( this_nav_url.match(doc_url_path) ){
                    var this_link_wrap = $(this).closest('.first-level').closest('.sidebar-item');

                    this_link_wrap.find('.has-arrow').addClass('active');
                    $(this).closest('.first-level').addClass('in');
                    $(this).addClass('active');

                }

            });


        }




//=============== FORM == LINKED SELECT == CHECK ===============
        //$('.dzenkit-selections-setting select').val('0');
       // $('.dzenkit-selections-setting input').val('').prop('checked',false);



        //---------- SELECT GROUP CHAIN ----------------
        $.each( $('.dzenkit-form-select-group-chain'), function(){
            var this_select_group = $(this);
            var this_selects = this_select_group.find('select');

            $.each(this_selects, function(i){

                if(i>0){
                    $(this).prop('disabled',true);
                }

                // ------ select change event --- without last select ------
                if(i < this_selects.length-1){
                    $(this).on('change', function(){
                        var next_select = $(this_selects.get(i+1));

                        if( $(this).val() !== '0' ){
                            next_select.prop('disabled',false);
                        } else {
                            for(var x=i+1; x<this_selects.length; x++ ){
                                $(this_selects.get(x)).prop('disabled',true).val('0');
                            }
                        }
                    });
                }
                // ------ select change event --- without last select ------
            });
        });
        //---------- / SELECT GROUP CHAIN ----------------



        $.each( $('select[data-disabled-alert]'), function(){
            $(this).after( '<span class="dzenkit-disabled-alert">' + $(this).data('disabled-alert') + '</span>' );
        });


        $.each( $('.dzenkit-form-range-box'), function(){
            var this_select = $(this).find('select'),
                this_range_input = $(this).find('.dzenkit-range-input'),
                this_ph = this_range_input.find('input[data-ph-double]').data('ph-double');

            this_range_input.addClass('hide');

            var currentVal=$(this).find('select').val();
            if(currentVal === '0'){
                this_range_input.addClass('hide');
              //  this_range_input.find('input').val('');
            } else if (currentVal === '1' || currentVal === '2') {
                this_range_input.removeClass('hide').addClass('single');
                $(this_range_input.find('input').get(0)).attr('placeholder','');
                //this_range_input.find('input').val('');
            } else {
                this_range_input.removeClass('hide single').addClass('double');
                //this_range_input.find('input').val('');
                $(this_range_input.find('input').get(0)).attr('placeholder',this_ph);
            }

            this_select.on('change',function(){
                var val = this_select.val();
                if(val === '0'){
                    this_range_input.addClass('hide');
                  //  this_range_input.find('input').val('');
                } else if (val === '1' || val === '2') {
                    this_range_input.removeClass('hide').addClass('single');
                    $(this_range_input.find('input').get(0)).attr('placeholder','');
                   // this_range_input.find('input').val('');
                } else {
                    this_range_input.removeClass('hide single').addClass('double');
                    //this_range_input.find('input').val('');
                    $(this_range_input.find('input').get(0)).attr('placeholder',this_ph);
                }

            });
        });
//=============== / FORM == LINKED SELECT == CHECK ===============




        var globalW = $(window).width();
        var header = $('header');

        var sideBar = $('#sideBar'),
            sideBarNav = $('#sideBarNav'),
            sidebarScrollyBox = $('#sidebarScrollyBox'),
            sidebarScrolly = $('#sidebarScrolly'),
            sideBar_H,
            sideBarNav_H,
            sidebarScrollyBox_H,
            sidebarScrolly_H,
            relativeY;

        var winH, winW, bodyH, scrollBarW;
        var headerH, footerH;
        var breadcrumbsH;

        var scroll_Top = $(window).scrollTop();


        var overLay = $('#overLay'), overLayBg = $('#overLayBg'), overLayContent = $('#overLayContent .container');
        var overlayBoxes = $('.js_overlay_box'),
            overLayCancel = $('#overLay .close-btn'),
            overContainer = $('.over-container');

        var orderForm = $('#orderForm'),
            orderFormBox = $('#orderFormBox'),
            orderFormMessage = $('#orderFormMessage');

        var mainSldr = $('#mainSldr'),
            mainSldrItemsBox = mainSldr.find('.items');

        var startCover = $('#startCover');

        var ItemPageProductCardH, ItemPagePicsBoxTop, ItemPagePicsBoxH;
        var contentWid;

        var mainParallaxBox, mainParallaxBoxH;
        if(document.getElementById('main_parallax_box')){
            mainParallaxBox = $('#main_parallax_box');
        }






// ============ ZAMER ===============================================
        function zamer(){
            if($(window).scrollTop() > 0){ $('body').addClass('scroll'); }

            scrollBarWidth();

            winH = $(window).height();
            winW = $(window).width();
            bodyH = $('body').outerHeight();

            headerH = $('#header').outerHeight();
            breadcrumbsH = $('#breadcrumbs').outerHeight(); console.log(breadcrumbsH);
            footerH = $('#footer').outerHeight();

            contentWid = $('#jsContentWid').width();

            if(winH>bodyH){
                $('html').css('padding-bottom',footerH);
                $('#footer').addClass('down');
            } else {
                $('html').css('padding-bottom',0);
                $('#footer').removeClass('down');
            }

            if(document.getElementById('itemPagePicsBox')){
                var itemPPB = $('#itemPagePicsBox');
                var itemProdCard = $('#itempageProductCard');
                itemPPB.css('position','relative');

                ItemPagePicsBoxTop = headerH + breadcrumbsH;
                ItemPagePicsBoxH = itemPPB.outerHeight(); console.log('ItemPagePicsBoxH = ' + ItemPagePicsBoxH);
                ItemPageProductCardH = itemProdCard.outerHeight(); console.log('ItemPageProductCardH = ' + ItemPageProductCardH);
            }
        }



// ============ Scroll Bar Width ====================================
        function scrollBarWidth() {
            var div = document.createElement('div');

            div.style.overflowY = 'scroll';
            div.style.width = '50px';
            div.style.height = '50px';

            document.body.append(div);
            scrollBarW = div.offsetWidth - div.clientWidth;

            div.remove();
        }









// ============ PRELOAD COVER ===============================================
        function preloaderCover(){
            if( winH < bodyH ){
                $('body').css('padding-right', scrollBarW);
                $('header nav').css('padding-right', scrollBarW);
            }

            $('body').addClass('loaded unlock');

            setTimeout(function(){
                $('body').removeClass('over-hidd');
                $('body').css('padding-right', '');
                $('header nav').css('padding-right', '');
            },100);
        }

// ========== CLICK - PRELOAD COVER CLOSE ====================



        /*var selectedHref;

        var allHrefs = $('a');
        $.each( allHrefs, function(){
            if( ! ( $(this).hasClass('js_request_btn') || $(this).hasClass('js_no_clickpoint') || $(this).attr('target') === '_blank' || $(this).attr('href')[0] === '#' || $(this).data('fancybox') ) ) {

                $(this).on('click', function(e){
                    selectedHref = $(this).attr('href');
                    e.preventDefault();

                    $('body').addClass('unload').removeClass('unlock');
                    setTimeout(function(){ window.location = selectedHref; }, 500);
                });

           }
        });*/

// ========== / CLICK - POINT -- CIRCLE ====================

// ----- используются для перезапуска функции по возврату на страницу
        window.onbeforeunload = function() {
            setTimeout(function() { console.log('BEFOR!!!'); }, 3000);
        };

        window.onpageshow  = function() {
            $('body').removeClass('unload').attr('style','');
        };

        window.onunload  = function() {
            $('body').removeClass('unload').attr('style','');
        };
// ----- / используются для перезапуска функции по возврату на страницу








//======== OVERLAYS ================================
        function openOverlay() {
            if (bodyH > winH) {
                $('body').css('padding-right', scrollBarW);
                /*desktopMenu.css('padding-right', scrollBarW);
                contactBarBtn.css('margin-right', scrollBarW);
                submenuCloseX.css('margin-right', scrollBarW);*/
            }
            $('html').addClass('over-hidd');
            overLay.addClass('actv');
        }

        function openOverlayContent() {
            overLay.addClass('show-content-box');
        }

        function removeOverlay() {
            $('html').removeClass('over-hidd');
            overLay.removeClass('show-content-box');
            overLayContent.empty();
            overlayBoxes.removeClass('actv');
            $('body').css('padding-right', 0);
            /*desktopMenu.css('padding-right', 0);
            contactBarBtn.css('margin-right', 0);
            submenuCloseX.css('margin-right', 0);*/
        }

        function closeOverContainer() {
            overContainer.removeClass('actv');
            removeOverlay();

        }

        overLayBg.on('click', function () {
            removeOverlay();
        });

        overLayCancel.on('click', function () {
            removeOverlay();
        });

        $('.js_close_over_container').on('click', function () {
            closeOverContainer();
        });



        /* +++++ OPEN -- SUBMENU +++++ */
        /*$('.js_open_submenu').on('click', function(){
            var This = $(this);
            var submenu_id = $('#' + $(this).data('submenu-id'));

            $('.js_submenu').removeClass('actv');

            orderForm.removeClass('actv');
            orderFormBox.removeClass('actv');
            overContainer.removeClass('actv');

            if( This.hasClass('actv')){
                This.removeClass('actv');
                submenu_id.removeClass('actv');
                removeOverlay();

               } else {
                   $('.js_open_submenu').removeClass('actv');
                   This.addClass('actv');
                   submenu_id.addClass('actv');
                   openOverlay();
               }

            return false;
        });*/
        /* +++++ / OPEN -- SUBMENU +++++ */

        /* +++++ CLOSE -- SUBMENU +++++ */
        /*$('.js_close_submenu').on('click', function(){
            $('.js_open_submenu').removeClass('actv');
            $('.js_submenu').removeClass('actv');

            orderForm.removeClass('actv');
            orderFormBox.removeClass('actv');
            overContainer.removeClass('actv');


            removeOverlay();
            return false;
        });*/
        /* +++++ / OPEN - CLOSE -- SUBMENU +++++ */



//======== / OVERLAYS ================================





// ========== M I N E == S L I D E R ==========
        var mainSlider = {

            len: 0,
            count: 0,

            picsbox: mainSldr.find('.items'),
            pics: mainSldr.find('.item'),
            picsboxH: mainSldr.find('.items').height(),

            sizing: function(){
                $('.common').css('padding-top', headerH);

                var ratio_box = this.picsbox.width()/this.picsbox.height();
                this.len = this.pics.length;

                $.each(this.pics, function(){
                    var i_pic = $(this).find('img');
                    var ratio_i = i_pic.width()/i_pic.height();

                    if (ratio_box < ratio_i){
                        i_pic.css({"height":"100%", "width":"auto"});
                    } else {
                        i_pic.css({"height":"auto", "width":"100%"});
                    }
                });
            },

            start: function(){
                mainSldr.addClass('actv');
                var mainSlider_interval = setInterval(function(){
                    mainSlider.change(); 		console.log(mainSlider_interval);
                }, 4000);
            },

            change: function(){
                this.count = this.count+1 === this.len ? 0 : this.count+1;
                $( this.pics[this.count] ).addClass('actv').siblings().removeClass('actv');
            }

        };
// ========== / M I N E == S L I D E R ==========




// ========= S I D E B A R =======================
        function sideBarStart(){
            $('.sidebar-link').on('click',function(){
                sideBar.addClass('inresize');
                var this_click = $(this),
                    parents_ul_first = this_click.parents("ul:first"),
                    next_ul = this_click.next("ul");

                if (!this_click.hasClass("active")) {
                    // hide any open menus and remove all other classes
                    $("a", parents_ul_first).removeClass("active");
                    $("ul", parents_ul_first).slideUp(function() {
                        $("ul", parents_ul_first).removeClass("in");
                    });
                    // open our new menu and add the open class
                    this_click.addClass("active");

                    next_ul.slideDown(function() {
                        next_ul.addClass("in");
                        sidebarScrollySize();
                    });

                } else if (this_click.hasClass("active")) {
                    this_click.removeClass("active");
                    parents_ul_first.removeClass("active");

                    next_ul.slideUp(function() {
                        next_ul.removeClass("in");
                        sidebarScrollySize();
                    });
                }
            });
        }

// =============== SIDEBAR SCROLLBAR Y =======================================

        function sidebarScrollySize(){
            sideBar_H = sideBar.height();
            sideBarNav_H = sideBarNav.height();
            sidebarScrollyBox_H = sidebarScrollyBox.height();
            sidebarScrolly_H = sideBar_H/sideBarNav_H * sidebarScrollyBox_H;

            sidebarScrolly.css('height',sidebarScrolly_H).css('top', sidebarScrolly.offset().top - sidebarScrollyBox.offset().top );
        }

        //--------------------

        sideBar.on('scroll',function(){
            var scrl_top = sideBar.scrollTop(),
                top_offset = (scrl_top * sidebarScrollyBox_H / sideBar_H) * (sidebarScrollyBox_H / sideBarNav_H);
            sidebarScrolly.css('top',top_offset);
        });


        sidebarScrollyBox.on('mouseover', function(){
            sideBar.removeClass('inresize');
        });

        //--------------------

        sidebarScrollyBox.on('mousedown click touch', function(e){
            relativeY = (e.pageY - $(this).offset().top);
            var koef = sideBarNav_H/sidebarScrollyBox_H,
                top_offset = relativeY - sidebarScrolly_H/2;

            if (top_offset < 0){ top_offset = 0; }
            if (top_offset+sidebarScrolly_H > sidebarScrollyBox_H ){ top_offset = sidebarScrollyBox_H - sidebarScrolly_H; }

            sideBar.animate({ scrollTop: top_offset*koef }, 500 );
            sidebarScrolly.animate({ top: top_offset }, 500 );
        });

        //--------------------

        sidebarScrolly.on('click touch', function(e) {
            e.stopPropagation();
        });

        //--------------------

        sidebarScrolly.on('mousedown', function(e) {
            var start_top_offset = sidebarScrolly.offset().top - sidebarScrollyBox.offset().top,
                firstY = e.pageY,
                koef = sideBarNav_H/sidebarScrollyBox_H;

            $('body').addClass('sidebar-in-focus');

            $(window).on('mousemove', function(e) {
                $('body').addClass('sidebar-in-scrolling');
                var dragY = e.pageY,
                    drag_offset = dragY-firstY,
                    top_offset = start_top_offset + drag_offset;

                if(top_offset<0){
                    top_offset=0;
                    start_top_offset = 0;
                    firstY = dragY;
                }
                if(top_offset+sidebarScrolly_H > sidebarScrollyBox_H){
                    top_offset = sidebarScrollyBox_H - sidebarScrolly_H;
                    start_top_offset = sidebarScrolly.offset().top - sidebarScrollyBox.offset().top;
                    firstY = dragY;
                }
                sidebarScrolly.css('top',top_offset);
                sideBar.scrollTop(top_offset*koef);
            });

            $(window).on('mouseup', function(e) {
                $('body').removeClass('sidebar-in-scrolling').removeClass('sidebar-in-focus');
                $(window).off('mousemove');
                e.stopPropagation();
            });

        });

        //--------------------

// =============== / SIDEBAR SCROLLBAR Y =======================================
// ========= / S I D E B A R =======================





// =============== DZENKIT THEMES ===============
        var dzenkitThemesArr = ['dzenkit-theme-default','dzenkit-theme-corall','dzenkit-theme-blue','dzenkit-theme-violet','dzenkit-theme-grey'];
        var dzenkitThemesBgArr = ['dzenkit-theme-bg-default','dzenkit-theme-bg-darkblue'];

        $('.js_dzenkit_themes i').on('click',function(){
            var num = $(this).index();
            var this_theme = dzenkitThemesArr[num];

            $.each( $('.js_dzenkit_themes i'), function(i){
                $('body').removeClass( dzenkitThemesArr[i] );
            });

            $('body').addClass(this_theme);
            $(this).addClass('actv').siblings().removeClass('actv');
        });

        $('.js_dzenkit_themes_bg i').on('click',function(){
            var num = $(this).index();
            var this_theme = dzenkitThemesBgArr[num];

            $.each( $('.js_dzenkit_themes_bg i'), function(i){
                $('body').removeClass( dzenkitThemesBgArr[i] );
            });

            $('body').addClass(this_theme);
            $(this).addClass('actv').siblings().removeClass('actv');
        });

// =============== / DZENKIT THEMES ===============



// =============== TABLE ROW ITEM DESCRIPTION ===============
        $('.js_open_link_descript').on('click',function(){
            $('.dropdown-toggle, .dropdown-menu').removeClass('show');
            $(this).parent().toggleClass('actv');
            return false;
        });


        $('.js_show_hide_table_descripts').on('click',function(){
            $(this).toggleClass('actv');
            $(this).closest('.dzenkit-basic-card').toggleClass('descripts-showing');
            return false;
        });
// =============== / TABLE ROW ITEM DESCRIPTION ===============



// =============== T A B L E === I D === C H E C K B O X ===============
        /*var thead_first_cell = $('thead tr > *:first-child');
        var tbody_first_cell_arr = $('tbody tr > *:first-child');*/

        $('.form-check-all-numbers').prop('checked', false);
        $('.form-check-number').prop('checked', false);


        $('.form-check-all-numbers').on('click',function(){
            var this_table = $(this).closest('table');
            var this_actions = this_table.next('.actions-for-table-rows');
            var this_actions_count = this_actions.find('.js_total_table_rows_selected');
            var this_arr = this_table.find('.form-check-number');

            if ( $(this).is(':checked')){
                $.each(this_arr,function(){
                    $(this).prop('checked', true);
                });
                this_actions.addClass('actv');
                this_actions_count.html(this_arr.length);

            } else {
                $.each(this_arr,function(){
                    $(this).prop('checked', false);
                });
                this_actions_count.html(0);
                this_actions.removeClass('actv');
            }
        });


        $('.form-check-number').on('click',function(){
            var this_table = $(this).closest('table');
            var this_check_all_numbers = $('.form-check-all-numbers');
            var this_actions = this_table.next('.actions-for-table-rows');
            var this_actions_count = this_actions.find('.js_total_table_rows_selected');
            var this_arr = this_table.find('.form-check-number');
            var this_arr_len = this_arr.length;
            var checked_count = 0;

            if ( $(this).is(':checked')){
                $.each(this_arr,function(){
                    if($(this).is(':checked')){
                        checked_count ++;
                    }
                });

            } else {
                $.each(this_arr,function(){
                    if($(this).is(':checked')){
                        checked_count ++;
                    }
                });
            }

            if(checked_count === this_arr_len){
                this_check_all_numbers.prop('checked',true);
                this_actions_count.html(this_arr.length);

            } else if (checked_count === 0){
                this_actions_count.html(0);
                this_actions.removeClass('actv');

            } else {

                this_actions.addClass('actv');
                this_actions_count.html(checked_count);
            }
        });


        //++++++++++ ACTIONS TOTAL BAR ++++++++++
        $('.js_form_tablerow_on').on('click',function(){
            var this_table = $($(this).closest('form')).find('table');
            var checked_row_arr = this_table.find('.form-check-number:checked');

            $.each(checked_row_arr,function(){
                $(this).closest('tr').find('.status input').prop('checked',true);
            });




            /*alert(checked_row_arr.length);*/

            return false;
        });

        //++++++++++
        $('.js_form_tablerow_off').on('click',function(){
            var this_table = $($(this).closest('form')).find('table');
            var checked_row_arr = this_table.find('.form-check-number:checked');

            $.each(checked_row_arr,function(){
                $(this).closest('tr').find('.status input').prop('checked',false);
            });


            return false;
        });

        //++++++++++
        $('.js_form_tablerow_del').on('click',function(){
            var this_table = $($(this).closest('form')).find('table');
            var checked_row_arr = this_table.find('.form-check-number:checked');

            $.each(checked_row_arr,function(){

            });


            return false;
        });
        //++++++++++ / ACTIONS TOTAL BAR ++++++++++

// =============== / T A B L E === I D === C H E C K B O X ===============



        $('.js_show_hide_selections-setting').on('click',function(){
            $(this).closest('.dzenkit-table-header').next('.dzenkit-selections-setting').slideToggle();
        });






// =============== TABLE == CHANGE == ROWS ===============
        $('.dzenkit-basic-card table').on('click','.js_put_row_up, .js_put_row_down', function(){
            $('.dropdown-toggle, .dropdown-menu').removeClass('show');

            var this_row = $(this).closest('tr'),
                this_row_h = this_row.height(),
                this_row_num = this_row.find('.js_row_number'),
                this_row_num_value = this_row_num.html(),
                this_table = this_row.closest('table');

            var up = $(this).hasClass('js_put_row_up'),
                this_row_change_duet = up ? this_row.prev('tr') : this_row.next('tr'),
                dir_selected = up ? "-" : "",
                dir_follower = up ? "" : "-",
                dir_selected_class = up ? "animated _selected _up" : "animated _selected _down",
                dir_follower_class = up ? "animated _follower _down" : "animated _follower _up";

            if (this_row_change_duet.length>0){
                var this_row_change_duet_num = this_row_change_duet.find('.js_row_number'),
                    this_row_change_duet_num_value = this_row_change_duet_num.html(),
                    this_row_change_duet_h = this_row_change_duet.height(),
                    this_rows_h_koef = this_row_h/this_row_change_duet_h;

                this_row_change_duet.addClass(dir_follower_class);
                this_table.addClass('over-hidd');

                // --- animation ------
                this_row.addClass(dir_selected_class).animate(
                    { 'opacity': this_row_change_duet_h },
                    { step: function (now, fx) {
                            $(this).css({"transform": "translate3d(0px, " + dir_selected +now + "px, 0px)"});
                            this_row_change_duet.css({"transform": "translate3d(0px, " + dir_follower + now*this_rows_h_koef + "px, 0px)"});
                        },
                        duration: 400,
                        queue: false,

                        complete: function () {
                            $(this).attr('style','');
                            this_row_change_duet.attr('style','');

                            if (up){this_row.insertBefore(this_row_change_duet);} else {this_row.insertAfter(this_row_change_duet);}

                            this_row_num.html(this_row_change_duet_num_value);
                            this_row_change_duet_num.html(this_row_num_value);

                            this_row.removeClass('animated _selected _follower _up _down');
                            this_row_change_duet.removeClass('animated _selected _follower _up _down');

                            this_table.removeClass('over-hidd');
                        }
                    });
                // --- animation ------
            }
            return false;
        });
// =============== / TABLE == CHANGE == ROWS ===============


























// ========== O R D E R == F O R M ==========
        /*	$('.js_open_orderform').on('click', function(){

                if( $(this).hasClass('js_count')){
                    var prodPriceList = $('#prodPriceList'),
                        prodPriceListItems = $('#prodPriceList > li'),
                        val, divs,
                        order_html = '';

                    $.each(prodPriceListItems, function(){
                        val = $(this).find('.js_pricebox_input_count').val();
                        divs = $(this).children();

                        if( val.length > 0 ){
                            order_html += '<li>' + $(divs.get(0)).html() + $(divs.get(2)).html() +  '<p>'+$(divs.get(3)).find('input').val()+'<i></i></p>'  + '</li>';
                        }
                    });

                    order_html = '<ul>' + order_html + '</ul>';
                    orderFormBox.find('.js_order_html').html(order_html);
                }

                openOverlay();
                orderForm.addClass('actv');
                orderFormBox.addClass('actv');

                return false;
            });


            $('.js_send_order').on('click', function(){
                orderFormBox.removeClass('actv');
                orderFormMessage.addClass('actv success');

                return false;
            });*/
// ========== / O R D E R == F O R M ==========








// ==================== READ MORE BTN =============================
        $('.read-more-btn').on('click', function(){
            var ahref = $(this).attr('href');
            $(this).addClass('dis');
            $(ahref).show(300);
            return false;
        });

        $('.js_accord_link').on('click', function(){
            $(this).next().toggle(300);
            $(this).parent().toggleClass('actv');
        });






// =================== PRICE CASE = TABS ==============================
        $('.js_price_case_toggle').on('click', function(){
            $(this).parent().find('.js_price_case').slideToggle(300);
            $(this).toggleClass('actv');
        });

        var priceCase = $('.js_price_case');
        $.each(priceCase, function() {

            var elem = $(this).parent().find('.grp-hdr');

            if( ! elem.hasClass('actv') ){
                $(this).hide();
            }
        });
// =================== / PRICE CASE = TABS ==============================













// =================== D Z E N == P I C S F E E D ============================================
        var dzenPicsfeedTrigger = 0;

        function dzenPicsfeed(){

            var dzenPicsfeeds = $('.dzen-picsfeed');
            $('.dzen-picsfeed-box').css('transform', 'translateX(0px)').css('width','');
            $('.dzen-picsfeed .dzen-items').css('width','');
            dzenPicsfeeds.attr('data-current-number', 1).attr('data-offset', 0);

            var cssStr, prevOffset, currentNum, thisOffset, eWid, dzenItems, ItemsCount,
                thisPicsfeed, thisPicsfeedBox, thisPicsfeedBoxWid, thisItems, thisPicsfeedWid,
                RespArray, resp, respWid;

            $.each(dzenPicsfeeds, function() {
                thisPicsfeed = $(this);
                thisPicsfeedBox = thisPicsfeed.find('.dzen-picsfeed-box');
                dzenItems = thisPicsfeed.find('.dzen-item');
                ItemsCount = dzenItems.length;
                thisPicsfeed.attr('data-items',ItemsCount);
                thisPicsfeedWid = thisPicsfeed.width();

                //----- если слайдер резиновый с моноширинными карточками -----
                if(thisPicsfeed.attr('data-responsive')){
                    RespArray = thisPicsfeed.attr('data-responsive').split(',');

                    $.each(RespArray, function(e) {
                        resp = RespArray[e].split(':');
                        if( resp[0] < thisPicsfeedWid ){ respWid = thisPicsfeedWid / resp[1]; }
                    });

                    dzenItems.css('width', respWid);
                    thisPicsfeedBox.css('width', respWid * ItemsCount);
                }
                //----- / если слайдер резиновый с моноширинными карточками -----
            });



            //------ кнопки -- сдвиг -- влево-вправо ------------
            if(dzenPicsfeedTrigger === 0){

                $('.dzen-picsfeed-left').on('click', function(){
                    thisPicsfeed = $(this).parent().parent().parent().find('.dzen-picsfeed');
                    thisPicsfeedBox = thisPicsfeed.find('.dzen-picsfeed-box');

                    thisItems = thisPicsfeedBox.find('.dzen-item');
                    currentNum = thisPicsfeed.attr('data-current-number')*1;
                    thisOffset = thisPicsfeed.attr('data-offset')*1;
                    prevOffset = 0;
                    thisPicsfeedBoxWid = 0;

                    $.each(thisItems, function(e) {
                        eWid = $(this).outerWidth();
                        thisPicsfeedBoxWid = thisPicsfeedBoxWid + eWid;
                        if(e === currentNum-2){ prevOffset = thisOffset; thisOffset = (thisOffset - eWid < 10)? 0 : thisOffset - eWid; }
                    });
                    thisPicsfeedBox.css('width',thisPicsfeedBoxWid);

                    if( prevOffset > 0 ){
                        cssStr = 'translateX(-' + thisOffset + 'px)';
                        thisPicsfeedBox.css('transform', cssStr );
                        thisPicsfeed.attr('data-current-number',currentNum-1).attr('data-offset',thisOffset);
                    }
                });

                $('.dzen-picsfeed-right').on('click', function(){
                    thisPicsfeed = $(this).parent().parent().parent().find('.dzen-picsfeed');
                    thisPicsfeedBox = thisPicsfeed.find('.dzen-picsfeed-box');
                    thisItems = thisPicsfeedBox.find('.dzen-item');
                    currentNum = thisPicsfeed.attr('data-current-number')*1;
                    thisOffset = thisPicsfeed.attr('data-offset')*1;
                    prevOffset = 0;
                    thisPicsfeedBoxWid = 0;
                    thisPicsfeedWid = thisPicsfeed.width();

                    $.each(thisItems, function(e) {
                        eWid = $(this).outerWidth();
                        thisPicsfeedBoxWid = thisPicsfeedBoxWid + eWid;
                        if(e === currentNum-1){ prevOffset = thisOffset; thisOffset = thisOffset + eWid; }
                    });
                    thisPicsfeedBox.css('width',thisPicsfeedBoxWid);

                    if( thisPicsfeedBoxWid - prevOffset > thisPicsfeedWid+1 ){
                        cssStr = 'translateX(-' + thisOffset + 'px)';
                        thisPicsfeedBox.css('transform', cssStr );
                        thisPicsfeed.attr('data-current-number',currentNum+1).attr('data-offset',thisOffset);
                    }
                });

                dzenPicsfeedTrigger = 1;
            }
            //------ / кнопки -- сдвиг -- влево-вправо ------------

            $('.dzen-picsfeed').addClass('dzen-show');

        }

// =================== / D Z E N == P I C S F E E D ============================================






// =================== Плавная прокрутка к якорю (элементу с ID) =================================
        $(function(){
            $('a[href^="#zz"]').click(function(){
                $("html:not(:animated),body:not(:animated)")
                    .animate({ scrollTop: $($(this).attr("href")).offset().top}, 800 ); return false;
            });
        });

// ======== plugin ========= toTop =================
        (function(a){
            a.fn.scrollToTop=function(c){
                var d={speed:800};
                c&&a.extend(d,{speed:c});

                return this.each(function(){
                    var b=a(this);

                    a(window).scroll(function(){
                        a(this).scrollTop()>(winH/3*2)?b.addClass('actv'):b.removeClass('actv'); console.log('winH==== ' + winH);
                    });

                    b.click(function(b){
                        b.preventDefault();
                        a("body, html").animate({scrollTop:0},d.speed);
                    });
                });
            };
        })(jQuery);

        $(function() {
            $("#toTop").scrollToTop();
        });

// =================== Размещение стрелки вверх в начале тега боди ===============================
        $('body').prepend('<a href="#top" id="toTop"></a> <!-- ++++++++++++++++ to--top ++++++++++++++++ -->');





// ##############################  П Р О К Р У Т К А - Р Е А К Ц И И  #######################################
        $(window).scroll(function () {
            var s = $(window).scrollTop();
            var main_bnr_opac, main_bnr_transY;

            if(s>0){
                $('body').addClass('scroll');
            } else {
                $('body').removeClass('scroll');
            }


            if(s>200 && s>scroll_Top){
                $('body').addClass('hidd-menu');
            } else {
                $('body').removeClass('hidd-menu');
            }



            if(s>scroll_Top){
                $('body').addClass('scroll-down').removeClass('scroll-up');
            } else {
                $('body').removeClass('scroll-down').addClass('scroll-up');
            }
            scroll_Top = $(window).scrollTop();



            if(mainParallaxBox){
                mainParallaxBoxH = mainParallaxBox.height();
                main_bnr_opac = 1 - s/mainParallaxBoxH;
                if(main_bnr_opac <=0) {main_bnr_opac = 0;}
                main_bnr_transY = 'translate(0,'+ s/3 +'px)';
                $('#main_parallax_box').css('opacity',main_bnr_opac).css('transform',main_bnr_transY);
            }


            if(mainSldr !== undefined){
                if(s<=winH){
                    var opac = s >= winH ? 0 : 1 - s/winH;
                    mainSldrItemsBox.css( 'transform','translateY(' + s/2 +'px)' ).css('opacity',opac);
                }
            }


        });
// ##############################  / П Р О К Р У Т К А - Р Е А К Ц И И  #######################################




// ##############################################################################################################
// ###################################  З А П У С К   Ф У Н К Ц И Й  ############################################
        zamer();
        preloaderCover();

        if( document.getElementById('sideBar')) {
            sideBar.css('margin-right', scrollBarW*-1);
            sidebarScrollySize();
        }

        if(sideBar){sideBarStart(); }

        if(mainSldr !== undefined){
            mainSlider.sizing();
            mainSlider.start();
        }



        /*if(prodCard !== undefined){ productPageTitlePict(); }*/

        if(document.getElementsByClassName('dzen-picsfeed')){
            dzenPicsfeed();
        }




// ################################## / З А П У С К   Ф У Н К Ц И Й  ############################################
// ##############################################################################################################


// ------------ Р Е С А Й З  Э К Р А Н А -- П Е Р Е З А П У С К  Ф У Н К Ц И Й ------------------
        window.onresize = function () {
            zamer();

            if(mainSldr !== undefined){ mainSlider.sizing(); }




            //------- resize WIDTH only -------------------
            if( globalW !== winW) {


                /*if(document.getElementsByClassName('dzen-sldr')){
                    dzenSldr();
                }*/

                if(document.getElementsByClassName('dzen-picsfeed')){
                    dzenPicsfeed();
                }





                globalW = $(window).width();
            }


        };
// ------------ / Р Е С А Й З  Э К Р А Н А -- П Е Р Е З А П У С К  Ф У Н К Ц И Й ------------------







    });
})();
