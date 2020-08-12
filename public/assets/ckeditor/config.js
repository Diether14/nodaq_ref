/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */


CKEDITOR.editorConfig = function(config) {
    // Define changes to default configuration here. For example:
    // config.language = 'fr';
    config.uiColor = '#6a4e9c';
    config.height = '500px';


    config.toolbar = [
        { name: 'document', groups: ['mode', 'document', 'doctools'], items: ['Source', '-', , 'Preview', 'Print', '-', 'Templates'] },
        { name: 'clipboard', groups: ['clipboard', 'undo'], items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo'] },
        { name: 'editing', groups: ['selection'], items: [] },
        { name: 'forms', items: [] },

        { name: 'basicstyles', groups: ['basicstyles', 'cleanup'], items: ['Bold', 'Italic', 'Underline'] },
        { name: 'paragraph', groups: ['list', 'indent', 'blocks', 'align', 'bidi'], items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', ] },
        { name: 'links', items: ['Link', 'Unlink'] },
        { name: 'insert', items: ['Image', 'Table', 'Smiley', 'Iframe'] },

        { name: 'styles', items: ['Styles', 'Format', 'Font', 'FontSize'] },
        { name: 'colors', items: ['TextColor', 'BGColor'] },
        { name: 'tools', items: ['Maximize', 'ShowBlocks'] },
        // { name: 'others', items: [ '-' ] },
        // { name: 'about', items: [ 'About' ] }
    ];

    // Toolbar groups configuration.
    config.toolbarGroups = [
        { name: 'document', groups: ['mode', 'document', 'doctools'] },
        { name: 'clipboard', groups: ['clipboard', 'undo'] },
        { name: 'editing', groups: ['find', 'selection', 'spellchecker'] },
        { name: 'forms' },
        '/',
        { name: 'basicstyles', groups: ['basicstyles', 'cleanup'] },
        { name: 'paragraph', groups: ['list', 'indent', 'blocks', 'align', 'bidi'] },
        { name: 'links' },
        { name: 'insert' },
        '/',
        { name: 'styles' },
        { name: 'colors' },
        { name: 'tools' },
        // { name: 'others' },
        // { name: 'about' }
    ];

    config.smiley_images = [
        'regular_smile.png', 'sad_smile.png', 'wink_smile.png', 'teeth_smile.png', 'confused_smile.png', 'tongue_smile.png',
        'embarrassed_smile.png', 'omg_smile.png', 'whatchutalkingabout_smile.png', 'angry_smile.png', 'angel_smile.png', 'shades_smile.png',
        'devil_smile.png', 'cry_smile.png', 'lightbulb.png', 'thumbs_down.png', 'thumbs_up.png', 'heart.png',
        'broken_heart.png', 'kiss.png', 'envelope.png'
    ];


};