(function() {
    tinymce.PluginManager.add('my_mce_button', function( editor, url ) {
        editor.addButton('my_mce_button', {
            text: 'E.A',
            icon: false,
            onclick: function() {
                editor.insertContent('[eliteaccordion][elitetoggle title="Title"]...[/elitetoggle][/eliteaccordion]');
            }
        });
    });
})();

