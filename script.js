jQuery(function ($) {

    var frame,
        addImgLink = $('.upload-custom-img'),
        delImgLink = $('.delete-custom-img'),
        imgContainer = $('.custom-img-container'),
        imgIdInput = $('.custom-img-id'),
        clearBtn = $('#clear_all'),
        createdField = $('#test_created'),
        prodType = $('#prod_type');

    addImgLink.on('click', function (event) {

        event.preventDefault();
        if (frame) {
            frame.open();
            return;
        }
        frame = wp.media({
            title: 'Select or Upload Media',
            button: {
                text: 'Use this media'
            },
            multiple: false
        });
        frame.on('select', function () {
            var attachment = frame.state().get('selection').first().toJSON();
            imgContainer.append('<img src="' + attachment.url + '" alt="" style="max-width:300px;"/>');
            imgIdInput.val(attachment.id);
            addImgLink.addClass('hidden');
            delImgLink.removeClass('hidden');
        });
        frame.open();
    });
    delImgLink.on('click', function (event) {
        event.preventDefault();
        imgContainer.html('');
        addImgLink.removeClass('hidden');
        delImgLink.addClass('hidden');
        imgIdInput.val('');
    });
    if (clearBtn) {
        clearBtn.on('click', function (event) {
            event.preventDefault();
            imgContainer.html('');
            addImgLink.removeClass('hidden');
            delImgLink.addClass('hidden');
            imgIdInput.val('');
            createdField.val('');
            prodType.val('');
        });
    };

    var
    aa = $('#aa').val(), mm = $('#mm').val(), jj = $('#jj').val(), hh = $('#hh').val(), mn = $('#mn').val(), 
    attemptedDate = new Date(aa, mm - 1, jj, hh, mn),
    currentDate = new Date(
        $('#cur_aa').val(),
        $('#cur_mm').val() - 1,
        $('#cur_jj').val(),
        $('#cur_hh').val(),
        $('#cur_mn').val()
    ),
    publishOn,
    __ = wp.i18n.__;

    if (attemptedDate > currentDate && $('#original_post_status').val() != 'future') {
        publishOn = __('Schedule for:');
        $('.my_submit').val(_x('Schedule', 'post action/button label'));
    } else if (attemptedDate <= currentDate && $('#original_post_status').val() != 'publish') {
        publishOn = __('Publish on:');
        $('.my_submit').val(__('Publish'));
    } else {
        publishOn = __('Published on:');
        $('.my_submit').val(__('Update'));
    }
});