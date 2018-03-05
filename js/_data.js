// var ourRequest = new XMLHttpRequest();
// 	ourRequest.open('GET', 'https://api.thingspeak.com/channels/344468/feeds.json');
// 	ourRequest.onload = function(){
// 	var ourData = JSON.parse(ourRequest.responseText);
// 	console.log(ourData);
// 	};

// 	ourRequest.send();

$(document).ready(function(){
	reload();

});


function reload(){
	setTimeout( function () { 
	destroyTable();
	newTable();
	}, 200);
}

function destroyTable(){
	table = $('#dataTable').DataTable( {
    retrieve: true,
    paging: false
	} );
	table.destroy();
}

function newTable(){
	var filterStr='true', 
		filterIndex= 1; //change to 3 if go online

	var table = $('#dataTable').DataTable( {
    ajax: {
        url: 'https://api.thingspeak.com/channels/344468/feeds.json',
        dataSrc: 'feeds'
        // url: 'json/_data.json',
        // dataSrc: ''
    },
		columns: [
			// {data: 'entry_id'},
			{data: 'created_at'},
			{data: 'field3'}
	],
	"order": [[0, "desc"]], //order to desc
	});

	$.fn.dataTableExt.afnFiltering.push(
		function(oSettings, aData, iDataIndex){
			
			return aData[filterIndex].indexOf(filterStr)>-1;
	}); //filter data with true value on column 2

	setInterval (function(){ //loads data without refresh
		table.ajax.reload(null,false);
	}, 10000);

}

$.ajax({
	url: 'js/_dataAlert.js',
	dataType: 'script',
	success: 'success'
});