/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.allowedContent = true;
	config.extraAllowedContent = 'iframe[*]';
	config.enterMode = CKEDITOR.ENTER_BR;
	config.shiftEnterMode = CKEDITOR.ENTER_BR;
    config.filebrowserBrowseUrl = '/elfinder/ckeditor4';
	
	config.toolbar_MyToolbar =
    [
        ['Source','Preview'],
        ['Cut','Copy','Paste','PasteText','PasteFromWord'],
        ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','RemoveFormat'],
        ['Image','Table','HorizontalRule'],['Maximize'],
		['Link','Unlink'],
        '/',
        ['FontSize','Styles','Format'],
        ['Bold','Italic'],
        ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote']
        
    ];

    config.toolbar_MiniToolbar =
    [
    	['Source'],
        ['Bold','Italic'],
        ['Format'],
        ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','Image','Video','Link','Unlink','Maximize']

    ];
    
    config.toolbar_QuickEdit =
    [
    	['Source'],
        ['Bold','Italic'],
        ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','Maximize']

    ];

    config.toolbar_TinyToolbar =
    [
        ['Bold','Italic','Underline']

    ];
};

CKEDITOR.on('instanceReady', function( ev ) {
	
  var blockTags = ['div','h1','h2','h3','h4','h5','h6','p','pre','li','blockquote','ul','ol',
  'table','thead','tbody','tfoot','td','th', 'br'];

  for (var i = 0; i < blockTags.length; i++)
  {
     ev.editor.dataProcessor.writer.setRules( blockTags[i], {
        indent : false,
        breakBeforeOpen : false,
        breakAfterOpen : false,
        breakBeforeClose : false,
        breakAfterClose : false
     });
  }
});