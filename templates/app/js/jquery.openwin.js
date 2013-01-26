;
(function(w) {
	var options = {
		height : "700",
		width : "500",
		toolbar : "no",
		scrollbars : "yes",
		menubar : "no",
		fullscreen: "no",
		resizable: "no",
		name : "newwin",
		url : null,
		params : {}
	};
	function _toString(obj)
	{
		var a = new Array();
		for(var v in obj)
			a.push(v+"="+obj[v]);
		return a.join(",");
	}
	function _mergeOptions(defaultOption, option) {
		for ( var v in option)
		{
			defaultOption[v] = option[v];
		}
		return defaultOption;
	};
	function _buildInput(form,params,win)
	{
		
		for(var v in params)
		{
			var input = w("<input name="+v+" style='display:none' >");
			input.val(params[v]);
			w(form).append(input);
		}
		form;
	};
	w.extend( {
		"open" : function(opt) {
			if (opt)
				options = _mergeOptions(options, opt);
			if(!options.left)
				options.left   =   Math.ceil((window.screen.width   -   options.width)   /   2   ); 
			if(!options.left)
				options.top   =   Math.ceil((window.screen.height   -   options.height)   /   2   ); 
			
			OpenWindow = window.open("about:blank",options.name,_toString(options));
			
			
			
			var form =document.createElement("form");
			
			document.body.appendChild(form);
			$form = w(form);
			$form.hide();
			$form.attr("action", options.url);
			$form.attr("method", "post");
			$form.attr("target",options.name);
			_buildInput(form,options.params,window);
			$form.submit();
			return OpenWindow;
		}
	});

})(jQuery);