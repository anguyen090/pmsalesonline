	// Creates a new plugin class and a custom listbox 
	// Initialize TinyMCE with the new plugin and product_type button 
	tinyMCE.init({ 
        selector:'textarea',
        menubar: false,
        plugins: [
            "advlist autolink link image lists charmap print preview hr anchor pagebreak",
         "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking fullscreen",
         "table contextmenu directionality emoticons paste textcolor responsivefilemanager code blockquote codesample"
        ],
        toolbar1: "bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
        toolbar2: "table responsivefilemanager | link unlink anchor | image | forecolor backcolor  | preview code | fullscreen | blockquote codesample",
        extended_valid_elements : 'img[src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name]',
        image_advtab: true ,
        external_filemanager_path:"../filemanager/",
        filemanager_title:"Filemanager" ,
        external_plugins: { "filemanager" : "../../../filemanager/plugin.js"}
	}); 
