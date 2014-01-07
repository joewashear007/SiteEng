raptor(function($){
    $('.editable').raptor({
        //preset : "full
        unloadWarning: false,
        autoEnable : false,
        disabledPlugins: [ 
            "statistics","hrCreate","textBlockQuote","insertFile","embed","logo","languageMenu","specialCharacters","dockToElement",
            "textStrike", "textSub","textSuper","tagMenu","guides",  ],
            //"textStrike", "textSub","textSuper","tagMenu","guides", "save", "unsavedEditWarning"  ],
        plugins:{
            dock:{docked:true},
            classMenu:{
                classes:{
                    'Blue background':'cms-blue-bg',
                    'Round corners':'cms-round-corners',
                    'Indent and center':'cms-indent-center'
                }
            },
            snippetMenu:{
                snippets:{
                    'Grey Box':'<div class="grey-box"><h1>Grey Box</h1><ul><li>This is a list</li></ul></div>'
                }
            },
            save: {
                // Specifies the UI to call the saveRest plugin to do the actual saving
                plugin: 'saveRest'
            },
            saveRest: {
                // The URI to send the content to
                url: function(html){
                    var cid = this.raptor.element.context.id.split("-");
                    return SiteEng.ArticleEdit + "/" + cid[1];
                },
                // Returns an object containing the data to send to the server
                data: function(html) {
                    return GetSaveData(this.raptor.element.context.id);
                },
            },
        },
    });
});

// $(document).ready(function() {
    // $(".editable").focusout(function() {
        // Save($(this).attr("id"));
    // })
// });

function GetSaveData(editableId){
    var idInfo = editableId.split("-");
    var id = idInfo[1];
    if(idInfo[0] == "section"){
        var data = JSON.parse(SiteEng.SectionsFields);
    }else{
        var data = JSON.parse(SiteEng.ArticleFields);
    }
    //Get The JSON object and replace the id with the id number
    //Do JQuery text with the object id
    for (var key in data) {
      if (data.hasOwnProperty(key)) {
        if(key == "id"){
            data[key] = id;
        }else{
            var idstr = data[key].replace("id", id);
            data[key] = jQuery("#" + idstr).html();
        }
      }
    }
    return data;
}
// function Save(editableId){
    // var idInfo = editableId.split("-");
    // var id = idInfo[1];
    // if(idInfo[0] == "section"){
        // var data = JSON.parse(SiteEng.SectionsFields);
        // var action = SiteEng.SectionEdit;   
    // }else{
        // var data = JSON.parse(SiteEng.ArticleFields);
        // var action = SiteEng.ArticleEdit;
    // }
    // //Get The JSON object and replace the id with the id number
    // //Do JQuery text with the object id
    // for (var key in data) {
      // if (data.hasOwnProperty(key)) {
        // if(key == "id"){
            // data[key] = id;
        // }else{
            // var idstr = data[key].replace("id", id);
            // data[key] = jQuery("#" + idstr).html();
        // }
      // }
    // }
    // var request = jQuery.ajax({
        // url: action + "/" +id,
        // type: "post",
        // data: jQuery.param(data),   
    // }).done(function(data) {
        // jQuery("#msgbox-text").html(data);
        // jQuery("#msgbox").removeClass().addClass("alert alert-success");
        // jQuery("#msgbox").slideDown();
    // }).fail(function(data) {
        // jQuery("#msgbox-text").html(data);
        // jQuery("#msgbox").removeClass().addClass("alert alert-danger");
        // jQuery("#msgbox").slideDown();
    // });
// }

// jQuery(document).ready(function(){
	// jQuery(".delete").click( function() {
		// var data = jQuery(this).attr('id').split('-');
		// var request = jQuery.ajax({
			// url: window.app.articleDelete+ "/" + data[1],
			// type: "post",
		// }).done(function(data) {
			// jQuery(data[0]+"-"+data[1]).Remove();
			// jQuery("#msgbox-text").html(data);
			// jQuery("#msgbox").removeClass().addClass("alert alert-success");
			// jQuery("#msgbox").slideDown();
		// }).fail(function(data) {
			// jQuery("#msgbox-text").html(data);
			// jQuery("#msgbox").removeClass().addClass("alert alert-danger");
			// jQuery("#msgbox").slideDown();
		// });
	// });
	// jQuery(".add").click( function() {
		// var data = jQuery(this).attr('id').split('-');
		// var request = jQuery.ajax({
			// url: window.app.articleDelete+ "/" + data[1],
			// type: "post",
		// }).done(function(data) {
			// jQuery(data[0]+"-"+data[1]).Remove();
			// jQuery("#msgbox-text").html(data);
			// jQuery("#msgbox").removeClass().addClass("alert alert-success");
			// jQuery("#msgbox").slideDown();
		// }).fail(function(data) {
			// jQuery("#msgbox-text").html(data);
			// jQuery("#msgbox").removeClass().addClass("alert alert-danger");
			// jQuery("#msgbox").slideDown();
		// });
	// });


// });

