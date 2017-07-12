(function(){
	// Prevent FOUC (flash of unstyled content) - http://johnpolacek.com/2012/10/03/help-prevent-fouc/
	// add to document ready: $('.no-fouc').removeClass('no-fouc');
	//document.documentElement.className = 'no-fouc';
	document.getElementById("report_data").ClassName = 'no-fuct';
	$('.no-fouc').removeClass('no-fouc');
	
	// Filters	
	function edmontonService(data){
		return data.dc == "EDMONTON" && data.state == true;
	}
	
	function errorService(data){
		if (data.dc == "EDMONTON") {
			return ['DAILY', 'PRODUCTION', 'CORP01', 'CORP02'].indexOf(data.service) == -1 && data.state == true;
		} else if  (data.dc == "TORONTO") {
			return ['DAILY', 'PRODUCTION'].indexOf(data.service) > -1 && data.state == true;
		}
	}
	
	// Sample data
	var testdata = [
		{
			"dc": "TORONTO-TEST",
			"host": "VPWV0287AP07-TEST",
			"mode": "DISABLED-TEST",
			"service": "PRODUCTION-TEST",
			"state": true,
			"svc_exe": "D:\\Openlink\\Endur\\V14_0_08082015ENB_12212015_1081\\bin.win64\\master.exe",
			"version": "1081-TEST",
			"updated": "6/5/2017 4:21 PM",
		}
	];

	var data_url = location.protocol + '//' + location.host + '/res/data/services_status.json';
	
	windows.alert(location.host)
	console.log( "Request: " + data_url );
	
	$.getJSON(data_url)
		.done(function(data) {
			$("#report_data").tabulator({
				height:"600px",
				fitColumns:true,
				groupBy:'host',
				groupStartOpen:true,
				rowFormatter:function(row, data){
					if((data.dc == "TORONTO" && ['DAILY', 'PRODUCTION'].indexOf(data.service) > -1 && data.state) || (data.dc == "EDMONTON" && ['DAILY', 'PRODUCTION', 'CORP01', 'CORP02'].indexOf(data.service) == -1 && data.state)) {
						row.css({"background-color":"#FF0000"});
					}
				},
				columns:[
					{formatter:"rownum", align:"center", width:40},
					{title:'Data Center', field:'dc', align:'center', sorter:'string', headerFilter:true},
					{title:'Host', field:'host', align:'center', sorter:'string', headerFilter:true},
					{title:'Service', field:'service', sorter:'string', align:'center', headerFilter:true},
					{title:'State', field:'state', sorter:'string', align:'center', formatter:'tickCross', headerFilter:true},
					{title:'Version', field:'version', sorter:'number', align:'center', headerFilter:true},
					{title:'Svc Version', field:'svc_exe', sorter:'string', align:'center', headerFilter:true},
					{title:'Mode', field:'mode', sorter:'string', align:'center', headerFilter:true},
					{title:'Updated', field:'updated', sorter:'string', align:'center', headerFilter:true},
				]
			});

			$("#report_data").tabulator("setData", data);
		})
		.fail(function(jqxhr, textStatus, error) {
			var err = textStatus + ", " + error;
			console.log( "Request Failed: " + err );
		});
	
	$(".filter").click(function() {
		switch(this.id) {
			case 'edm':
				$("#report_data").tabulator("setFilter", edmontonService);
				break;
			case 'tor':
				$("#report_data").tabulator("setFilter", "dc", "TORONTO");
				break;
			case 'clr':
				$("#report_data").tabulator("clearFilter");
				break;
			case 'err':
				$("#report_data").tabulator("setFilter", errorService);
				break;
			default:
		}
	});
})();