function zsvg_receiver(arg){
    
	if(window.tinyMCE)
	{
		if(window.tinyMCE.activeEditor!=null){
		window.tinyMCE.activeEditor.selection.moveToBookmark(window.tinymce_cursor);
		window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, arg);
		}else{
			var aux = jQuery("#content").val();
			jQuery("#content").val( aux + arg );
		}
		tb_remove();
	}
}