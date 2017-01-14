	// Creates a new plugin class and a custom listbox 
	// Initialize TinyMCE with the new plugin and product_type button 
	tinyMCE.init({ 
	mode : "specific_textareas",
	editor_deselector : "noeditor",
	theme : "advanced",
	plugins : 'mybutton,openmanager,-example,fullscreen,insertdatetime,media,advimage,advlink,table,preview,searchreplace,inlinepopups,paste', // - tells TinyMCE to skip the loading of the plugin 
	// Theme options
	theme_advanced_buttons1_add_before : "newdocument,separator",
			theme_advanced_buttons1_add : "fontselect,fontsizeselect",
			theme_advanced_buttons2_add : "separator,forecolor,backcolor,liststyle",
			theme_advanced_buttons2_add_before: "cut,copy,paste,pastetext,pasteword,separator,",
			theme_advanced_buttons3_add_before : "tablecontrols,separator",
			theme_advanced_buttons3_add : "flash,media,advimage,openmanager,advhr,separator,fullscreen,preview",

	theme_advanced_toolbar_location : "top", 
	theme_advanced_toolbar_align : "left", 
	//Open Manager Options
		file_browser_callback: "openmanager",
		open_manager_upload_path: '../../../../../uploads/',
	// CLEAR STYLE PASTE
		paste_auto_cleanup_on_paste : true,
        paste_preprocess : function(pl, o) {
            // Content string containing the HTML from the clipboard
            //alert(o.content);
            o.content = "" + o.content;
        },
        paste_postprocess : function(pl, o) {
            // Content DOM node containing the DOM structure of the clipboard
            //alert(o.node.innerHTML);
            o.node.innerHTML = o.node.innerHTML + "";
        }
	}); 
