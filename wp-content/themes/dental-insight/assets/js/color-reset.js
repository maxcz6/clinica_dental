(function($) {
    function resetColorsToDefault() {
        // Define default values for your color settings
        const defaultColors = {
            'background_color': '#ffffff',
            'dental_insight_primary_color': '#fe8086',
            'dental_insight_header_bg_color': '#f3f4f9',
            'dental_insight_heading_color': '#02314f',
            'dental_insight_text_color': '#858d92',
            'dental_insight_primary_fade' :'#fff4f5',
            'dental_insight_footer_bg': '#02314f',
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