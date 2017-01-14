	// Creates a new plugin class and a custom listbox 
	// Initialize TinyMCE with the new plugin and product_type button 
	tinyMCE.init({ 
	mode : "textareas", 
	theme : "advanced", 
	plugins : 'phpimage,fullscreen,preview,inlinepopups,advhr,advimage,table,advlink,emotions,', // - tells TinyMCE to skip the loading of the plugin 
	
	// Theme options
		theme_advanced_buttons1 : "mybutton,bold,italic,underline,separator,strikethrough,justifyleft,justifycenter,justifyright, justifyfull,bullist,numlist,undo,redo,link,unlink,forecolor,backcolor",
		theme_advanced_buttons2 : "tablecontrols,fontselect,fontsizeselect,phpimage,fullscreen,preview",
		theme_advanced_buttons3 : "",
	theme_advanced_toolbar_location : "top", 
	theme_advanced_toolbar_align : "left", 
	theme_advanced_statusbar_location : "bottom",
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
