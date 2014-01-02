Aloha.ready( function() {
    Aloha.jQuery('.editable').aloha();
    var request = jQuery.ajax({
        url: SiteEng.panelsAction,
        type: "post",   
    }).done(function(data) {
        var panels = JSON.parse(data);
        for (var key in panels) {
          if (panels.hasOwnProperty(key)) {
            console.log(key + " -> " + p[key]);
            var panel = Aloha.Sidebar.right.addPanel({
                id       : p[key].id,
                title    : p[key].Title,
                content  : p[key].Content,
                expanded : false
            });
          }
        }
    }).fail(function(data) {
        jQuery("#msgbox-text").html("Failed to load panel data");
        jQuery("#msgbox").removeClass().addClass("alert alert-danger");
        jQuery("#msgbox").slideDown();
    });
    
});
/*
 ( function ( window, undefined ) {
	var Aloha = window.Aloha || ( window.Aloha = {} );

	Aloha.settings = {
		logLevels: { 'error': true, 'warn': true, 'info': true, 'debug': true, 'deprecated': true },
		errorhandling: false,
		locale: 'en',
		plugins: {
			format: {},
			list: {
				config: [ 'ul', 'ol' ],
			},
			abbr: {
				config: [ 'abbr' ],
			},
			link: {
				config: [ 'a' ],
				hotKey: {
					// use ctrl+l instead of ctrl+k as hotkey for inserting a link
					//insertLink: 'ctrl+l'
				},
				cssclassregex: '*',
				cssclass: 'button-sucess',
				objectTypeFilter: ['website'],
				// handle change of href
				onHrefChange: function ( obj, href, item ) {
					var jQuery = Aloha.require( 'jquery' );
					if ( item ) {
						jQuery( obj ).attr( 'data-name', item.name );
					} else {
						jQuery( obj ).removeAttr( 'data-name' );
					}
				}
			},
			table: {
				config: [ 'table' ],
				editables: {
					// Don't allow tables in top-text
					'#top-text': [ '' ]
				},
				summaryinsidebar: true,
					// [{name:'green', text:'Green', tooltip:'Green is cool', iconClass:'GENTICS_table GENTICS_button_green', cssClass:'green'}]
				tableConfig: [
					{ name: 'hor-minimalist-a' },
					{ name: 'box-table-a' },
					{ name: 'hor-zebra' },
				],
				columnConfig: [
					{ name: 'table-style-bigbold',  iconClass: 'aloha-button-col-bigbold' },
					{ name: 'table-style-redwhite', iconClass: 'aloha-button-col-redwhite' }
				],
				rowConfig: [
					{ name: 'table-style-bigbold',  iconClass: 'aloha-button-row-bigbold' },
					{ name: 'table-style-redwhite', iconClass: 'aloha-button-row-redwhite' }
				],
				cellConfig: [
					{ name: 'table-style-bigbold',  iconClass: 'aloha-button-row-bigbold' },
					{ name: 'table-style-redwhite', iconClass: 'aloha-button-row-redwhite' }
				],
				// allow resizing the table width (default: false)
				tableResize: true,
				// allow resizing the column width (default: false)
				colResize: true,
				// allow resizing the row height (default: false)
				rowResize: true
			},
			image: {
				'fixedAspectRatio' : false,
				'minWidth'         : 20,
				'minHeight'        : 20,
				'globalselector'   : '.global',
				'ui': {
					'oneTab' : true,
					'align'  : false,
					'margin' : false
				}
			},
			cite: {
				referenceContainer: '#references'
			},
			formatlesspaste: {
				formatlessPasteOption : true,
				strippedElements : [
                   "em","strong","small","s","cite","q","dfn","abbr","time","code","var","samp","kbd","sub","sup","i","b","u","mark","ruby","rt","rp","bdi","bdo","ins","del"
                ]
            },	
		}
	};
} )( window );
*/
 
function Save(action, data){
	// console.log("Action: " + window.app.action+"/"+id)
    // var text = $("#article" + id +"-text").html();
    // var title = $("#article" + id + "-title").html();
    var request = jQuery.ajax({
        //url: "/articles/edit/"+id,
        url: action + "/" +data["id"],
        type: "post",
        data: data,   
    }).done(function(data) {
        jQuery("#msgbox-text").html(data);
        jQuery("#msgbox").removeClass().addClass("alert alert-success");
        jQuery("#msgbox").slideDown();
    }).fail(function(data) {
        jQuery("#msgbox-text").html(data);
        jQuery("#msgbox").removeClass().addClass("alert alert-danger");
        jQuery("#msgbox").slideDown();
    });
}

jQuery(document).ready(function(){
	jQuery(".delete").click( function() {
		var data = jQuery(this).attr('id').split('-');
		var request = jQuery.ajax({
			url: window.app.articleDelete+ "/" + data[1],
			type: "post",
		}).done(function(data) {
			jQuery(data[0]+"-"+data[1]).Remove();
			jQuery("#msgbox-text").html(data);
			jQuery("#msgbox").removeClass().addClass("alert alert-success");
			jQuery("#msgbox").slideDown();
		}).fail(function(data) {
			jQuery("#msgbox-text").html(data);
			jQuery("#msgbox").removeClass().addClass("alert alert-danger");
			jQuery("#msgbox").slideDown();
		});
	});
	jQuery(".add").click( function() {
		var data = jQuery(this).attr('id').split('-');
		var request = jQuery.ajax({
			url: window.app.articleDelete+ "/" + data[1],
			type: "post",
		}).done(function(data) {
			jQuery(data[0]+"-"+data[1]).Remove();
			jQuery("#msgbox-text").html(data);
			jQuery("#msgbox").removeClass().addClass("alert alert-success");
			jQuery("#msgbox").slideDown();
		}).fail(function(data) {
			jQuery("#msgbox-text").html(data);
			jQuery("#msgbox").removeClass().addClass("alert alert-danger");
			jQuery("#msgbox").slideDown();
		});
	});


});

