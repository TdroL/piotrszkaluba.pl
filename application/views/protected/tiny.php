		<div class="hide">
			<?php echo html::script('media/js/tiny_mce/tiny_mce.js') ?>
			<?php echo html::script('media/js/tiny_mce/plugins/tinybrowser/tb_tinymce.js.php?'.(isset($folder) ? 'js_folder='.$folder.'&amp;' : NULL).'sessidpass='.session_id()) ?>
			<script type="text/javascript">
			//<![CDATA[
				tinyMCE.init({
					theme : "advanced",
					mode : "exact",
					elements: "<?php echo $field ?>",
					language : "pl",
					plugins : "safari,style,layer,tabfocus,table,advhr,advimage,advlink,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,visualchars,nonbreaking,xhtmlxtras,inserthtml",
	
					// Theme options
					theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
					theme_advanced_buttons2 : "undo,redo,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,link,unlink,image,|,forecolor,backcolor,|,tablecontrols",
					theme_advanced_buttons3 : "hr,removeformat,visualaid,|,sub,sup,|,charmap,advhr,media,inserthtml,|,cite,abbr,acronym,|,visualchars,nonbreaking,cleanup,help,code",
					theme_advanced_toolbar_location : "top",
					theme_advanced_toolbar_align : "left",
					theme_advanced_statusbar_location : "bottom",
					theme_advanced_resizing : true,
					
					height: "700",
					relative_urls : false,
					file_browser_callback : "tinyBrowser",
<?php if(isset($css)): ?>
					content_css: "<?php echo url::site('media/'.$css) ?>",
<?php endif ?>
				});
			//]]>
			</script>
		</div>