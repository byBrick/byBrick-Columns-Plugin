(function() {
	tinymce.create('tinymce.plugins.columns', {
		init : function(ed, url) {
			ed.addButton('columns', {
				title : 'byBrick Columns',
				image : url+'/img/ico-columns.png',
				onclick : function() {
					var columns = prompt("Number of columns", "2");
						if (columns != null && columns == '1')
							alert('You need to enter a value higher than 1.');
						else if (columns != null && columns == '2')
							ed.execCommand('mceInsertContent', false, '[one_half]Your content in the first column.[/one_half][one_half_last]Your content in the second column.[/one_half_last]');
						else if (columns != null && columns == '3')
							ed.execCommand('mceInsertContent', false, '[one_third]Your content in the first column.[/one_third][one_third]Your content in the second column.[/one_third][one_third_last]Your content in the third column.[/one_third_last]');
						else if (columns != null && columns == '4')
							ed.execCommand('mceInsertContent', false, '[one_fourth]Your content in the first column.[/one_fourth][one_fourth]Your content in the second column.[/one_fourth][one_fourth]Your content in the third column.[/one_fourth][one_fourth_last]Your content in the fourth column.[/one_fourth_last]');
						else if (columns != null && columns == '5')
							ed.execCommand('mceInsertContent', false, '[one_fifth]Your content in the first column.[/one_fifth][one_fifth]Your content in the second column.[/one_fifth][one_fifth]Your content in the third column.[/one_fifth][one_fifth]Your content in the fourth column.[/one_fifth][one_fifth_last]Your content in the fifth column.[/one_fifth_last]');
						else if (columns != null && columns == '6')
							ed.execCommand('mceInsertContent', false, '[one_sixth]Your content in the first column.[/one_sixth][one_sixth]Your content in the second column.[/one_sixth][one_sixth]Your content in the third column.[/one_sixth][one_sixth]Your content in the fourth column.[/one_sixth][one_sixth]Your content in the fifth column.[/one_sixth][one_sixth_last]Your content in the sixth column.[/one_sixth_last]');
						else
							alert('You need to enter a value between 2 and 6.');
				}
			});
		},
		createControl : function(n, cm) {
			return null;
		},
	});
	tinymce.PluginManager.add('columns', tinymce.plugins.columns);
})();