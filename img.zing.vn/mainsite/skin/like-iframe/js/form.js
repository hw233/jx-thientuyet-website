jQuery(document).ready(function() {
    validateType();
    jQuery("#mn-like-anchor").click(function() {

        if (!jQuery("#mn-like-anchor").hasClass("dislike")) {
            var form = jQuery("#_frmLike");
            $.ajax({
                url: jQuery(this).attr("action"),
                type: 'POST',
                dataType: "json",
                data: form.serialize(),
            }).done(function(data) {
                if (data['status'] == 1) {
                    jQuery("#number").html(data['total'])
                    if (data['liked'] == 1) { //dang duoc like
                        jQuery("#mn-like-anchor").addClass('dislike')
                    } else {
                        jQuery("#mn-like-anchor").removeClass('dislike')
                    }
                }

            });
        }
        return false;
    });
});

var validateType = function() {
    root = (window.location.href).split('&')[1];
    len = root.length;
    type = root.substr(5, len);
    switch (type) {
        case 'subpage':
            jQuery('#mn-like-anchor').addClass('btn_vne_like_core_sub');
            jQuery('.arrow_total_like').addClass('core_sub');
            jQuery('#like-total').addClass('txt_total_like_sub');
            break;
    }
}