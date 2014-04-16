function generatorReplaceUrlParam(url, param, value) {
    var re = new RegExp("([?|&])" + param + "=.*?(&|$)","i");

    if (url.match(re)) {
        return url.replace(re,'$1' + param + "=" + value + '$2');
    } else {
        if(url.indexOf('?') != -1) {
            return url + '&' + param + "=" + value;
        } else {
            return url + '?' + param + "=" + value;
        }
    }

    return url;
}

function generatorMaxPerPage(value) {
    window.location.href = generatorReplaceUrlParam(window.location.href, "max_per_page", value);
}

var form_changed = false;

window.onbeforeunload = function(e) {
    if (form_changed) {
        var message = "Sie haben die Änderungen noch nicht gespeichert!";

        e = e || window.event;

        // IE % Firefox
        if (e) {
            e.returnValue = message;
        }

        // All others
        return message;
    }
};

function unset_onbeforeunload() {
    window.onbeforeunload = function() {};
}

$(document).ready(function() {
    $(".sf_admin_form input, .sf_admin_form select, .sf_admin_form textarea").change(function(element, value) {
        form_changed = true;
    });

    $(".sf_admin_form form").submit(function() {
        form_changed = false;
        unset_onbeforeunload();
    });

    $(".sf_admin_form_email form").submit(function() {
        form_changed = false;
        unset_onbeforeunload();
    });

    $('.sf_admin_form_row.errors :input').focus(function() {
        $('.sf_admin_form .error_list').hide();
        $(this).parents('.sf_admin_form_row').find('.error_list').show();
    }).blur(function() {
        $('.sf_admin_form .error_list').hide();
    });
});