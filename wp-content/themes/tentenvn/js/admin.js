jQuery(document).ready(function(){

var file_frame;
   jQuery(document).on('click', '#gallery-metabox a.gallery-add', function(e) {
      e.preventDefault();
      if (file_frame) file_frame.close();
      file_frame = wp.media.frames.file_frame = wp.media({
         title: jQuery(this).data('uploader-title'),
         button: {
            text: jQuery(this).data('uploader-button-text'),
         },
         multiple: true
      });

      file_frame.on('select', function() {
         var listIndex = jQuery('#gallery-metabox-list li').index(jQuery('#gallery-metabox-list li:last')),
         selection = file_frame.state().get('selection');

         selection.map(function(attachment, i) {
            attachment = attachment.toJSON(),
            index = listIndex + (i + 1);
            jQuery('#gallery-metabox-list').append('<li><input type="hidden" name="tdc_gallery_id[' + index + ']" value="' + attachment.id + '"><img class="image-preview" src="' + attachment.sizes.thumbnail.url + '"><a class="change-image button button-small" href="#" data-uploader-title="Change image" data-uploader-button-text="Change image">Đổi hình</a><br><small><a class="remove-image" href="#">Remove image</a></small></li>');
         });
      });
      fnSortable();
      file_frame.open();

   });

   jQuery(document).on('click', '#gallery-metabox a.change-image', function(e) {
  e.preventDefault();
  var that = jQuery(this);
  if (file_frame) file_frame.close();
  file_frame = wp.media.frames.file_frame = wp.media({
     title: jQuery(this).data('uploader-title'),
     button: {
     text: jQuery(this).data('uploader-button-text'),
  },
  multiple: false
  });

  file_frame.on( 'select', function() {
     attachment = file_frame.state().get('selection').first().toJSON();
     that.parent().find('input:hidden').attr('value', attachment.id);
     that.parent().find('img.image-preview').attr('src', attachment.sizes.thumbnail.url);
  });
  file_frame.open();
});

   jQuery(document).on('click', '#gallery-metabox a.remove-image', function(e) {
   e.preventDefault();
   jQuery(this).parents('li').animate({ opacity: 0 }, 200, function() {
     jQuery(this).remove();
      resetIndex();
    });
 });

   function resetIndex() {
    jQuery('#gallery-metabox-list li').each(function(i) {
       jQuery(this).find('input:hidden').attr('name', 'tdc_gallery_id[' + i + ']');
    });
}

function fnSortable() {
    jQuery('#gallery-metabox-list').sortable({
       opacity: 0.6,
       stop: function() {
          resetIndex();
       }
    });
}


if(jQuery('#tg_date_choose').length>0){
  jQuery("#tg_date_choose").flatpickr({
    //defaultDate : 'today',
    dateFormat: "d/m/Y",
    disableMobile: true,
    minDate: "today",
    locale: {
      firstDayOfWeek: 0,
      weekdays: {
        shorthand: ['T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'СN'],
        longhand: ['T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'СN'],         
      }, 
      months: {
        shorthand: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
        longhand: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
      },
    },
  });
}

});