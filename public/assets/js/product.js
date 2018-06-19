(function(window, $){
	$(function(){
		
                
                $('#img-thumb-placeholder').on('click', '.btn-danger', function(e) {
			e.preventDefault();
			$wrapper = $(this).parent();
			$wrapper.find('input[name="existing_imgs[]"]').val('');
                        try{
                            $wrapper.find('img').attr('src', $wrapper.find('img').data('placeholder'));
                        }
                        catch(e)
                        {
                            console.log(e);
                        }
                        //$wrapper.hide(300, function() {
                        //  $(this).remove();
                        //});
		});
                
		$('#img-thumb-placeholder.existingimg_field').on('click', 'button#dlt', function(){
				$(this).parent().remove();
				
				//append available file input
				var frame = $('#img-thumb-placeholder.extendnew_field');
				var str = '';
				
				str += "<div style='position:relative;float:left;overflow:hidden;height: 125px;width: 125px;border: 1px solid rgba(139, 139, 137, 0.5);margin: 0 15px 15px 0;border-radius: 15px;'>";
				str += "<button id='img_del' style='border:0; padding:0; background-color:grey;color:red;line-height:0;position:absolute;z-index:1;right:0;width:16px;height:16px;opacity:0.5;display:none;' name='img_del' type='button'><span class='glyphicon glyphicon-remove' style='top:0;'></span></button>";
				str += "<div id='img-etimeline' class='img-responsive img-timeline' style='position:absolute;width:125px; height: 125px; background-size: cover; background-position: center center; border-radius: 15px;'></div>";
				str += "<a class='btn btn-sm btn-primary' style='margin: 0;position:relative;height: 125px;width: 125px;background-color:transparent;color: black;font-size: 70px;opacity: 0.1;vertical-align: middle;'>+<input accept='image/*' id='multipicture' style='margin: 0;height: 125px;width: 125px;font-size:1px; position: absolute; display: block; left: 0; top: 0; opacity: 0; cursor: inherit;' name='picture[]' type='file'></a>";
				str += "<div id='img-thumb-placeholder' class='newimg_field'></div>";
				str += "<input type='hidden' id='ex_img' class='ex_img' name='exist_img[]' value=''>";
				str += "<input type='hidden' id='sel_img' class='sel_oimg' name='select_img[]' value=''>";
				str += "<input type='hidden' id='ex_oimg' class='ex_oimg' name='ex_oimg[]' value=''>";
				str += "</div>";
				frame.append(str);
		});
		
		$('#img-thumb-placeholder.newimg_field').on('click', 'button#dlt', function(){
				$(this).parent().remove();
				var upImg = $('div#img-thumb-placeholder div.img-thumb.form-upload').length;
				var actImg = $('input[type="hidden"][name="newImg[]"]').length;
				
				if(upImg == 0 || actImg == 0)
				{
					$('.form-upload input[type="file"]').val('');
				}
		});
		
		var progress = document.querySelector('.percent');
		function updateProgress(evt) {
			// evt is an ProgressEvent.
			if (evt.lengthComputable) {
			  var percentLoaded = Math.round((evt.loaded / evt.total) * 100);
			  // Increase the progress bar length.
			  if (percentLoaded < 100) {
				progress.style.width = percentLoaded + '%';
				progress.textContent = percentLoaded + '%';
			  }
			}
		}
		
		$(document).on('change', 'input[type="file"]#multipicture', function(e) {
            o = $(this).parent().parent();
			a = o.find('#img-etimeline');
            b = o.find('.sel_oimg');
            c = o.find('.ex_img');
            d = o.find('.ex_oimg');
            btn = o.find('button[name="img_del"]');
			frame = o.find('#img-thumb-placeholder.newimg_field');
			str = '';
			
			// Reset progress indicator on new file selection.
			progress.style.width = '0%';
			progress.textContent = '0%';
            
            var files = e.target.files; 
            f= files[0];
            if (f==undefined) {
                a.css('background-image', 'url(' + b.val() + ')');
                c.val(d.val());
                
                if(b.val() == '')
                {
                    btn.css('display', 'none');
                }
                else
                {
                    btn.css('display', 'inline-block');
                }
            }
            else if (this.files && this.files[0]) {
				var filename = e.target.files[0].name;
                var reader = new FileReader();
					
				
				reader.onloadstart = function(e) {
					document.getElementById('progress_bar').className = 'loading';
				};
				reader.onprogress = updateProgress;
                reader.onload = function (e) {
					/*-------------------------*/
					var ctx = document.createElement('canvas');
					var img = new Image();
					var text = '';
					var curr_text = '';
					img.onload = function(){
						frame.html('');
						var MAX_WIDTH = 1280;
						var MAX_HEIGHT = 720;
						var width = img.width;
						var height = img.height;
						
						if (width > height) {
							if (width > MAX_WIDTH) {
								height *= MAX_WIDTH / width;
								width = MAX_WIDTH;
							}
						} else {
							if (height > MAX_HEIGHT) {
								width *= MAX_HEIGHT / height;
								height = MAX_HEIGHT;
							}
						}
						ctx.width = width;
						ctx.height = height;
						
						ctx.getContext("2d").drawImage(this, 0, 0, width, height);
						curr_text = text;
						text = ctx.toDataURL();
						
						str = '<input type="hidden" id="newImg" name = "newImg[]" value="' + filename + '">';
						str += '<input type="hidden" id="hidImgData" name = "hidImgData[]" value="' + text + '">';
						
						frame.append(str);
						
						a.css('background-image', 'url(' + text + ')');
						btn.css('display', 'inline-block');
						c.val('');
						
						// Ensure that the progress bar displays 100% at the end.
						progress.style.width = '100%';
						progress.textContent = '100%';
						setTimeout("document.getElementById('progress_bar').className='';", 2000);
					};
					img.src = e.target.result;
					/*-------------------------*/
                    /*a.css('background-image', 'url(' + e.target.result + ')');
					btn.css('display', 'inline-block');
                    c.val('');*/
				}
                reader.readAsDataURL(this.files[0]);
            }			
        });
        
         $(document).on('click', "button#img_del", function(){
            o = $(this).parent();
            a = o.find('div.img-responsive');
            b = o.find('input[type="file"]');
            c = o.find('input[type="hidden"].ex_img');
            d = o.find('input[type="hidden"].ex_oimg');
            e = o.find('input[type="hidden"].sel_oimg');
			frame = o.find('#img-thumb-placeholder.newimg_field');
            
            a.css('background-image', 'none');
            b.val('');
            c.val('');
            d.val('');
            e.val('');
			frame.html('');
            
            $(this).css('display', 'none');
        });

	});
}(window, jQuery));
