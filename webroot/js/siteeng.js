raptor(function($){
    $('.editable').raptor({
        //preset : "full
        unloadWarning: false,
        autoEnable : false,
        disabledPlugins: [ 
            "statistics","hrCreate","textBlockQuote","insertFile","embed","logo","languageMenu","specialCharacters","dockToElement",
            "textStrike", "textSub","textSuper","tagMenu","guides",  ],
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

$(document).ready(function(){
	$("body").on( "click", ".delete", function() {
		var idInfo = jQuery(this).attr('id').split('-');
        var idText = "#"+idInfo[0]+"-"+idInfo[1];
		var request = jQuery.ajax({
			url: SiteEng.ArticleDelete+ "/" + idInfo[1] ,
			type: "post",
		}).done(function(data) {
            var parentId = $(idText).parents("section").attr("id");
            var columnClassNum = Number($("#"+parentId + " .row div:first").attr("class").split("-")[2]);
            var columnNum = 12/columnClassNum;
            $(idText).parent().fadeOut("slow").remove();
            $("#"+parentId +" .row").each(function(){
                var articleCount = $(this).children().length;
				if(articleCount == 0){
					$(this).remove();
				}else if (articleCount != columnNum){
                    //need to move the articles around, there is a gap
                    var data = $(this).next().children("div").first().html();
                    $(this).next().children("div").first().fadeOut().remove();
					if(data !== undefined){
						$(this).children("div").last().after('<div class="col-md-'+columnClassNum+'">'+data+'</div>');
						$(this).children("div").last().hide().fadeIn();
					}
                }
            });
			$("#msgbox-text").html("Deleted Article");
			$("#msgbox").removeClass().addClass("alert alert-success");
			$("#msgbox").slideDown();
		}).fail(function(data) {
			jQuery("#msgbox-text").html(data);
			jQuery("#msgbox").removeClass().addClass("alert alert-danger");
			jQuery("#msgbox").slideDown();
		});
	});
	$("body").on( "click", ".add",function() {
		var idInfo = jQuery(this).attr('id').split('-');
        var idText = "#"+idInfo[0]+"-"+idInfo[1];
		var request = jQuery.ajax({
			url: SiteEng.ArticleAdd + "/" + idInfo[1],
			type: "post",
		}).done(function(data){
            if(data == ""){
                $("#msgbox-text").html("Could Not Create Post");
                $("#msgbox").removeClass().addClass("alert alert-danger");
                $("#msgbox").slideDown();
                return;
            }
            var articleCount = $(idText +" article").length;
            var columnClassNum = Number($(idText + " .row div").first().attr("class").split("-")[2]);
            var columnNum = 12/columnClassNum;
            if(articleCount % columnNum){
                // There is room in the last row, put new article there
                var colClass = $(idText+ " .row:last > div:last").attr("class");
                $(idText+" .row:last > div:last").after('<div class="'+colClass+'">'+data+'</div>').hide().fadeIn("slow");
            }else{
                //have to add new row first
                var colClass = $(idText+ " .row:last > div:last").attr("class");
                $(idText +" .row:last").after('<div class="row"><div class="'+colClass+'">'+data+'</div></div>').hide().fadeIn("slow");
            }
			$("#msgbox-text").html("Added New Article");
			$("#msgbox").removeClass().addClass("alert alert-success");
			$("#msgbox").slideDown();
		}).fail(function(data) {
			$("#msgbox-text").html(data);
			$("#msgbox").removeClass().addClass("alert alert-danger");
			$("#msgbox").slideDown();
		});
	});


});

