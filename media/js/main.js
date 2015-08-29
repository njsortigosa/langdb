jQuery(function($){
               $('a').tipsy();
               $(".fancybox").fancybox({
                    'speedIn':350,
                    'speedOut':350,
                    'width' : 800,
                    'overlayShow':true,
                    'hideOnContentClick':false,
                    'hideOnOverlayClick':true,
                    'centerOnScroll':false,
                    'transitionIn':'fade',
                    'transitionOut':'fade',
                    'titleShow':true

                }).resize();
                $(".fancyboxtinymce").fancybox({
                    'speedIn':350,
                    'speedOut':350,
                    'width' : 800,
                    'overlayShow':true,
                    'hideOnContentClick':false,
                    'hideOnOverlayClick':true,
                    'centerOnScroll':false,
                    'transitionIn':'fade',
                    'transitionOut':'fade',
                    'titleShow':true,
                    'onComplete':function(){
                        init_tinymce();
                    }

                }).resize();                
                $(".datepicker").datepicker({changeMonth: true,changeYear: true});
                $(".datepicker").datepicker('option', {dateFormat: 'yy-mm-dd'});
                $(".hideme").hide();
                $(".reset").reset();
          });
            function reset_plugins(){
                $('a').tipsy();
               $(".fancybox").fancybox({
                    'speedIn':350,
                    'speedOut':350,
                    'width' : 800,
                    'overlayShow':true,
                    'hideOnContentClick':false,
                    'hideOnOverlayClick':true,
                    'centerOnScroll':false,
                    'transitionIn':'fade',
                    'transitionOut':'fade',
                    'titleShow':true

                }).resize();
                
                $(".datepicker").datepicker({changeMonth: true,changeYear: true});
                $(".datepicker").datepicker('option', {dateFormat: 'yy-mm-dd'});
                $(".hideme").hide();
                $(".reset").reset();
            }
            function init_tinymce(){
                tinymce.init({
                selector: "textarea.mceEditor",
                theme: "modern",
                height: 300,
                menu: { 
                    edit: {title: 'Edit', items: 'undo redo | cut copy paste pastetext | selectall | searchreplace'}, 
                    insert: {title: 'Insert', items: 'link | charmap hr anchor pagebreak insertdatetime nonbreaking'}, 
                    view: {title: 'View', items: 'visualblocks visualchars visualaid | fullscreen'}, 
                    format: {title: 'Format', items: 'bold italic underline strikethrough superscript subscript | formats | removeformat'}, 
                    table: {title: 'Table', items: 'inserttable tableprops deletetable cell row column'}, 
                    tools: {title: 'Tools',items: 'code'} 
                },
                plugins: [
                     "advlist autolink link lists charmap hr anchor pagebreak",
                     "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime nonbreaking",
                     "table contextmenu directionality emoticons paste textcolor"
               ],
               content_css: "css/content.css",
               toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | fullpage | forecolor backcolor emoticons", 
               style_formats: [
                    {title: 'Bold text', inline: 'b'},
                    {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                    {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                    {title: 'Example 1', inline: 'span', classes: 'example1'},
                    {title: 'Example 2', inline: 'span', classes: 'example2'},
                    {title: 'Table styles'},
                    {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                ]
             });
            }
            jQuery.fn.reset = function () {
                $(this).each (function() { this.reset(); });
            }
            function onlyNumbers(evt){
                    evt = (evt) ? evt:window.event;
                    var charCode = (evt.which)?evt.which:evt.keyCode;
                  // alert(charCode);
                    if (charCode == 46){
                       return true;
                   }
                    if (charCode > 31 && (charCode<48 || charCode > 57)){
                      if (charCode == 45){
                            return true;
                        }
                       return false;
                    }

                    if (charCode == 13){
                        return false;
                    }
                    if (charCode == 0){
                       return true;
                   }
                   
                    return true;
                }     
               tinymce.init({
    selector: "textarea.mceEditor",
    theme: "modern",
    height: 300,
    menu: { 
        edit: {title: 'Edit', items: 'undo redo | cut copy paste pastetext | selectall | searchreplace'}, 
        insert: {title: 'Insert', items: 'link | charmap hr anchor pagebreak insertdatetime nonbreaking'}, 
        view: {title: 'View', items: 'visualblocks visualchars visualaid | fullscreen'}, 
        format: {title: 'Format', items: 'bold italic underline strikethrough superscript subscript | formats | removeformat'}, 
        table: {title: 'Table', items: 'inserttable tableprops deletetable cell row column'}, 
        tools: {title: 'Tools',items: 'code'} 
    },
    plugins: [
         "advlist autolink link lists charmap hr anchor pagebreak",
         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime nonbreaking",
         "table contextmenu directionality emoticons paste textcolor"
   ],
   content_css: "css/content.css",
   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | fullpage | forecolor backcolor emoticons", 
   style_formats: [
        {title: 'Bold text', inline: 'b'},
        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
        {title: 'Example 1', inline: 'span', classes: 'example1'},
        {title: 'Example 2', inline: 'span', classes: 'example2'},
        {title: 'Table styles'},
        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
    ]
 }); 