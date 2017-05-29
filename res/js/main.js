requirejs.config({
    urlArgs: "ts=" + new Date().getTime(), // disable caching - remove in production,
	baseUrl: 'res',
	paths: {
        jquery: [
			'lib/jquery-3.2.1/jquery-3.2.1.min',
			'//code.jquery.com/jquery-3.2.1.min',
			'//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min'
		],
		jqueryui: [
			'lib/jquery-ui-1.12.1/jquery-ui.min',
			'//code.jquery.com/ui/1.12.1/jquery-ui.min',
			'//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min'
		],
		tabulator: [
			'lib/tabulator-master/tabulator',
			'//cdnjs.cloudflare.com/ajax/libs/tabulator/2.11.0/tabulator.min'
		],
		rcss: 'lib/requirejs-css-plugin-twoparted/css',
		app: 'js/app'
    },
	shim: {
		'tabulator': ['jquery','jqueryui'],
		'app': ['tabulator']
	}
});

define(['rcss!lib/tabulator-master/tabulator.css'], function() {
	require(['app']);
});