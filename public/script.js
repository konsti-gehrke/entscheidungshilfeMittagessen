// export for others scripts to use
window.$ = $;
window.jQuery = jQuery;

jQuery(document).ready(function () {
    jQuery(".option1").on("click", function (e) {
        if(jQuery(this).hasClass("active")) {
            $("#ergebnisse tbody tr").show();
            jQuery(this).removeClass('active');
        } else {
            if (jQuery(".option1").hasClass("active")) {
                $("#ergebnisse tbody tr").show();
                jQuery(".option1").removeClass('active');
            }
            e.stopPropagation();
            jQuery(this).button('toggle');
            let value = $(this).html().toLowerCase();
            $("#ergebnisse tbody tr").each(function () {
                if($(this).attr("data-kategorie").replace(/ /g,'').toLowerCase() !== value && value !== "alles" && $(this).attr("data-kategorie").replace(/ /g,'').toLowerCase() !== "alles") {
                    $(this).hide();
                }
            })
        }
    });

    jQuery(".option2").on("click", function (e) {
        if(jQuery(this).hasClass("active")) {
            $("#ergebnisse tbody tr").show();
            jQuery(this).removeClass('active');
        } else {
            if (jQuery(".option2").hasClass("active")) {
                $("#ergebnisse tbody tr").show();
                jQuery(".option2").removeClass('active');
            }
            e.stopPropagation();
            jQuery(this).button('toggle');
            let value = $(this).html().toLowerCase();
            $("#ergebnisse tbody tr").each(function () {
                if($(this).attr("data-kategorie").replace(/ /g,'').toLowerCase() !== value && value !== "alles" && $(this).attr("data-kategorie").replace(/ /g,'').toLowerCase() !== "alles") {
                    $(this).hide();
                }
            })
        }
    });
});