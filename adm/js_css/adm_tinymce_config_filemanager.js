	// Creates a new plugin class and a custom listbox 
	// Initialize TinyMCE with the new plugin and product_type button 
	tinyMCE.init({ 
	mode : "specific_textareas",
	editor_deselector : "mceNoEditor",
	theme : "advanced", 
	plugins : '-example,fullscreen,insertdatetime,media,advimage,advlink,table,preview,searchreplace,inlinepopups,paste', // - tells TinyMCE to skip the loading of the plugin 
	
	// Theme options
	theme_advanced_buttons1_add_before : "newdocument,separator",
			theme_advanced_buttons1_add : "fontselect,fontsizeselect",
			theme_advanced_buttons2_add : "separator,forecolor,backcolor,liststyle",
			theme_advanced_buttons2_add_before: "cut,copy,paste,pastetext,pasteword,separator,",
			theme_advanced_buttons3_add_before : "tablecontrols,separator",
			theme_advanced_buttons3_add : "flash,media,advhr,separator,fullscreen,preview",

	theme_advanced_toolbar_location : "top", 
	theme_advanced_toolbar_align : "left", 
	file_browser_callback : "ajaxfilemanager",
	theme_advanced_statusbar_location : "bottom" ,
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
	// End TinyMCE
		function ajaxfilemanager(field_name, url, type, win) {
			var ajaxfilemanagerurl = "./js_css/tiny_mce/plugins/ajaxfilemanager/ajaxfilemanager.php";
			switch (type) {
				case "image":
					break;
				case "media":
					break;
				case "flash": 
					break;
				case "file":
					break;
				default:
					return false;
			}
            tinyMCE.activeEditor.windowManager.open({
                url: "./js_css/tiny_mce/plugins/ajaxfilemanager/ajaxfilemanager.php",
                width: 782,
                height: 440,
                inline : "yes",
                close_previous : "no"
            },{
                window : win,
                input : field_name
            });
	}
	
