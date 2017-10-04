$(document).on('ready pjax:success', function() {
    sortable();
    colapseAfterAjax();
    jsswich();
    iChek();
    IfTabsChanges();
    redactorInTabs();
    $('select[multiple="multiple"]').each(function () {
        $(this).multiselect({
            numberDisplayed: 1,
            nonSelectedText: $(this).attr('title')
        });
    })
});
function sortable() {
    $('.sortable-table').sortable({
        handle: '.position-column',
        items: 'tbody tr',
        update : function () {
            $data = {
                'serial': $(this).sortable('toArray', {attribute: 'data-key'}),
                'model_class': $(this).data('model_class'),
            };
            console.log($data);
            $.ajax({
                'url': $(this).data('sort_action'),
                'type': 'post',
                'data': $data,
                'success': function(data){

            },
            'error': function(request, status, error){

            }
        });
        },
    });
    $('.sortable-rows').sortable({
        handle: '.position-row',
        items: '.row',
        update : function () {
            $data = {
                'serial': $(this).sortable('toArray', {attribute: 'data-key'}),
                'model_class': $(this).data('model_class'),
            };
            $.ajax({
                'url': $(this).data('sort_action'),
                'type': 'post',
                'data': $data,
                'success': function(data){

                },
                'error': function(request, status, error){

                }
            });
        },
    });
    $('.tree.lvl-0').sortable({
        handle: '.move-li',
        items: 'li',
        update : function () {
            var parent = null;
            var index = 0;
            var out = [];
            $(this).find('>li').each(function (key,li) {
                out[$(li).data('id')] = {
                    parent: parent,
                    index: index++
                }
            });
            $(this).find('ul').each(function (key,ul) {
                parent = $(ul).data('parent_id');
                index = 0;
                $(ul).find('>li').each(function (key,li) {
                    out[$(li).data('id')] = {
                        parent: parent,
                        index: index++
                    };
                });
            });
            $data = {
                'serial': out,
                'model_class': $(this).data('model_class'),
            };
            $.ajax({
                'url': $(this).data('sort_action'),
                'type': 'post',
                'data': $data,
                'success': function(data){
                    console.log(data);
                },
                'error': function(request, status, error){

                }
            });
        },
    });
}
function colapseAfterAjax() {
    $('.collapse').on('click', function() {
        console.log('collapse');
        var $BOX_PANEL = $(this).closest('.x_panel'),
            $ICON = $(this).find('i'),
            $BOX_CONTENT = $BOX_PANEL.find('.x_content');

        // fix for some div with hardcoded fix class
        if (!$BOX_PANEL.hasClass('collapse-close')) {
            $BOX_CONTENT.slideToggle(200, function(){
                $BOX_PANEL.removeAttr('style');
                $BOX_PANEL.addClass('collapse-close');
            });
        } else {
            $BOX_CONTENT.slideToggle(200);
            $BOX_PANEL.css('height', 'auto');
            $BOX_PANEL.removeClass('collapse-close');
        }
        $ICON.toggleClass('fa-chevron-up fa-chevron-down');
    });
}
function jsswich() {
    if ($(".js-switch")[0]) {
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        elems.forEach(function (html) {
            var switchery = new Switchery(html, {
                color: '#26B99A'
            });
        });
    }
}
function iChek() {
    if ($("input.flat")[0]) {
        $(document).ready(function () {
            $('input.flat').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass: 'iradio_flat-green'
            });
        });
    }
}
function redactorInTabs() {
    // $('.redactor').each(function () {
    //     if(!$(this).find('.redactor-box').length > 0){
    //         // $(this).find('textarea').redactor();
    //     }
    // })
}
function IfTabsChanges() {
    $('.nav-tabs a').on('shown.bs.tab', function(){
        //refresh widget fileinput
        $('.file-input input[data-krajee-fileinput]').each(function () {
            $(this).fileinput('refresh');
        })
    });
}