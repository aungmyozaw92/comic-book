$(function() {
        SITEURL = $(".site_url").attr('data-attr');
        var bar = $('.bar');
        var percent = $('.percent');
          $('form').ajaxForm({
            beforeSend: function() {
                var percentVal = '0%';
                bar.width(percentVal)
                percent.html(percentVal);
            },
            uploadProgress: function(event, position, total, percentComplete) {
                var percentVal = percentComplete + '%';
                bar.width(percentVal);
                percent.html(percentVal);
            },
            complete: function(xhr) {
                if(xhr.responseJSON){
                    if(xhr.responseJSON.status == 200){
                        window.location.href= xhr.responseJSON.redirect_url;
                    }
                }
                
                if(xhr.status == 422){

                    var percentVal = 0 + '%';
                    bar.width(percentVal);
                    percent.html(percentVal);

                    var jsonResponse = JSON.parse(xhr.responseText);
                    console.log(jsonResponse);
                    // var errorResponse = JSON.parse(jsonResponse['errors']);
                    if(jsonResponse['errors'].name){
                        $("#name-error").text(jsonResponse['errors'].name[0]);
                    }
                    if(jsonResponse['errors'].category_id){
                        $("#category_id-error").text(jsonResponse['errors'].category_id[0]);
                    }
                    if(jsonResponse['errors'].singer_id){
                        $("#singer_id-error").text(jsonResponse['errors'].singer_id[0]);
                    }
                    if(jsonResponse['errors'].composer_id){
                        $("#composer_id-error").text(jsonResponse['errors'].composer_id[0]);
                    }
                    if(jsonResponse['errors'].band_id){
                        $("#band_id-error").text(jsonResponse['errors'].supports[0]);
                    }
                    if(jsonResponse['errors'].album_id){
                        $("#album_id-error").text(jsonResponse['errors'].album_id[0]);
                    }
                    // if(jsonResponse['errors'].production){
                    //     $("#production-error").text(jsonResponse['errors'].production[0]);
                    // }
                    // if(jsonResponse['errors'].imdb_rate){
                    //     $("#imdb_rate-error").text(jsonResponse['errors'].imdb_rate[0]);
                    // }
                    // if(jsonResponse['errors'].age_rate){
                    //     $("#age_rate-error").text(jsonResponse['errors'].age_rate[0]);
                    // }
                    if(jsonResponse['errors'].duration){
                        $("#duration-error").text(jsonResponse['errors'].duration[0]);
                    }
                    if(jsonResponse['errors'].released_date){
                        $("#released_date-error").text(jsonResponse['errors'].released_date[0]);
                    }
                    if(jsonResponse['errors'].description){
                        $("#description-error").text(jsonResponse['errors'].description[0]);
                    }
                    if(jsonResponse['errors'].file_url){
                        $("#file_url-error").text(jsonResponse['errors'].file_url[0]);
                    }

                    // if(jsonResponse['errors'].full_url){
                    //     $("#full_url-error").text(jsonResponse['errors'].full_url[0]);
                    // }
                    // if(jsonResponse['errors'].item_name){
                    //     $("#item_name-error").text(jsonResponse['errors'].item_name[0]);
                    // }

                    // var errorResponse = ;
                    // console.log(errorResponse);
                    swal(jsonResponse["message"]);
                }else if(xhr.status == 413){
                    var percentVal = 0 + '%';
                    bar.width(percentVal);
                    percent.html(percentVal);
                    swal('Cannot upload. Too large file');
                }else{
                    var percentVal = 0 + '%';
                    bar.width(percentVal);
                    percent.html(percentVal);

                    if(xhr.status != 200){
                        swal('Create Failed, Try again');
                    }
                }
                
            }
          });
    }); 