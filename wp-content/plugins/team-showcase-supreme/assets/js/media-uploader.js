jQuery(document).ready(function(e){var t;jQuery("#sb-image-upload-button").click(function(e){e.preventDefault(),t?t.open():((t=wp.media.frames.file_frame=wp.media({title:"Choose Image",button:{text:"Choose Image"},multiple:!0})).on("select",function(){console.log(t.state().get("selection").toJSON()),attachment=t.state().get("selection").first().toJSON(),jQuery("#sb-image-upload-url").val(attachment.url),jQuery("#sb-image-add-new-item-data").css({"overflow-x":"hidden","overflow-y":"auto"}),jQuery("body").css({overflow:"hidden"})}),t.open())})}),jQuery(document).ready(function(e){var t;jQuery("#sb-image-hover-upload-button").click(function(e){e.preventDefault(),t?t.open():((t=wp.media.frames.file_frame=wp.media({title:"Choose Image",button:{text:"Choose Image"},multiple:!0})).on("select",function(){console.log(t.state().get("selection").toJSON()),attachment=t.state().get("selection").first().toJSON(),jQuery("#sb-image-hover-upload-url").val(attachment.url),jQuery("#sb-image-add-new-item-data").css({"overflow-x":"hidden","overflow-y":"auto"}),jQuery("body").css({overflow:"hidden"})}),t.open())})});