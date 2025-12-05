(function($) {
    function resetColorsToDefault() {
        // Define default values for your color settings
        const defaultColors = {
            'background_color': '#ffffff',
            'dentistry_clinic_primary_color': '#00bcd5',
            'dentistry_clinic_primary_light': '#aceefe',
            'dentistry_clinic_heading_color': '#343434',
            'dentistry_clinic_text_color': '#959595',
            'dentistry_clinic_primary_fade' :'#e8fcff',
            'dentistry_clinic_footer_bg': '#343434',
            'dental_insight_post_bg': '#ffffff',
        };

        // Iterate over each setting and set it to its default value
        for (let settingId in defaultColors) {
            wp.customize(settingId).set(defaultColors[settingId]);
        }

        // Optionally refresh the preview
        wp.customize.previewer.refresh();
    }

    // Attach reset function to global scope
    window.resetColorsToDefault = resetColorsToDefault;

    $(document).ready(function() {
        $('.color-reset-btn').val('RESET'); // This adds the 'RESET' text inside the button
    });
})(jQuery);