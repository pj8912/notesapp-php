CKEDITOR.plugins.add('audiorec', {
    icons: 'audiorec',
    init: function(editor) {
        editor.addCommand('insertAudiorec', {
            exec: function(editor) {
                var now = new Date();
                editor.insertHtml('The current date and time is: <em>' + now.toString() + '</em>');

            }
        });
        editor.ui.addButton('Microphone', {
            label: 'Insert Audio',
            command: 'insertAudiorec',
            toolbar: 'insert'
        });

    }
});