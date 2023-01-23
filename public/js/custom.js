// Select 2
$( ".members" ).select2({
    theme: "material",
    placeholder: "Choose Artists",
});
// Select 2
$( ".categories" ).select2({
    theme: "material",
    placeholder: "Choose Categories",
});
$( ".category_id" ).select2({
    theme: "material",
    placeholder: "Choose Category",
});
// Select 2
$( ".band_id" ).select2({
    theme: "material",
    placeholder: "Choose Band",
});
$( ".singer_id" ).select2({
    theme: "material",
    placeholder: "Choose Singer",
});
$( ".composer_id" ).select2({
    theme: "material",
    placeholder: "Choose Composer",
});
$( ".album_id" ).select2({
    theme: "material",
    placeholder: "Choose Album",
});
//Artist Datatable
$('.artist-data-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: $('#table_url').attr('data-table-url'),
    columns: [
        {data: 'name', name: 'is_series'},
        {data: 'professional', name: 'professional'},
        {
            data: 'action', 
            name: 'action', 
            orderable: false, 
            searchable: false,
            "class" : "td-actions text-right",  
        },
    ]
});

$('.artist-item-data-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: $('#table_url').attr('data-table-url'),
    columns: [
        {data: 'name', name: 'name'},
        {data: 'professional', name: 'professional'},
        {
            data: 'action', 
            name: 'action', 
            orderable: false, 
            searchable: false,
            "class" : "td-actions text-right",  
        },
    ]
});
// Band Datatable
$('.band-data-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: $('#table_url').attr('data-table-url'),
    columns: [
        {data: 'name', name: 'name'},
        {data: 'manager', name: 'manager'},
        {data: 'members', name: 'members'},
        {data: 'founded_at', name: 'founded_at'},
        // {data: 'professional', name: 'professional'},
        {
            data: 'action', 
            name: 'action', 
            orderable: false, 
            searchable: false,
            "class" : "td-actions text-right",  
        },
    ]
});

$('.band-item-data-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: $('#table_url').attr('data-table-url'),
    columns: [
        {data: 'name', name: 'name'},
        {data: 'manager', name: 'manager'},
        {data: 'members', name: 'members'},
        {data: 'founded_at', name: 'founded_at'},
        // {data: 'manager', name: 'manager'},
        {
            data: 'action', 
            name: 'action', 
            orderable: false, 
            searchable: false,
            "class" : "td-actions text-right",  
        },
    ]
});
// Album Datatable
$('.album-data-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: $('#table_url').attr('data-table-url'),
    columns: [
        {data: 'name', name: 'name'},
        {data: 'singer_artist', name: 'singer_artist'},
        {data: 'composer_artist', name: 'composer_artist'},
        {data: 'band', name: 'band'},
        {data: 'num_of_songs', name: 'num_of_songs'},
        {
            data: 'action', 
            name: 'action', 
            orderable: false, 
            searchable: false,
            "class" : "td-actions text-right",  
        },
    ]
});

$('.album-item-data-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: $('#table_url').attr('data-table-url'),
    columns: [
        {data: 'name', name: 'name'},
        {data: 'singer_artist', name: 'singer_artist'},
        {data: 'composer_artist', name: 'composer_artist'},
        {data: 'band', name: 'band'},
        {data: 'num_of_songs', name: 'num_of_songs'},
        {
            data: 'action', 
            name: 'action', 
            orderable: false, 
            searchable: false,
            "class" : "td-actions text-right",  
        },
    ]
});
// Song Datatable
$('.song-data-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: $('#table_url').attr('data-table-url'),
    columns: [
        {data: 'name', name: 'name'},
        {data: 'singer', name: 'singer'},
        {data: 'composer', name: 'composer'},
        {data: 'band', name: 'band'},
        {data: 'category', name: 'category'},
        {
            data: 'action', 
            name: 'action', 
            orderable: false, 
            searchable: false,
            "class" : "td-actions text-right",  
        },
    ]
});

$('.song-item-data-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: $('#table_url').attr('data-table-url'),
    columns: [
        {data: 'name', name: 'name'},
        {data: 'singer', name: 'singer'},
        {data: 'composer', name: 'composer'},
        {data: 'band', name: 'band'},
        {data: 'category', name: 'category'},
        {
            data: 'action', 
            name: 'action', 
            orderable: false, 
            searchable: false,
            "class" : "td-actions text-right",  
        },
    ]
});
//Movie Datatable
$('.movie-data-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: $('#table_url').attr('data-table-url'),
    columns: [
        {data: 'name', name: 'is_series'},
        {data: 'director', name: 'director'},
        {data: 'actors', name: 'actors'},
        {
            data: 'action', 
            name: 'action', 
            orderable: false, 
            searchable: false,
            "class" : "td-actions text-right",  
        },
    ]
});

$('.movie-item-data-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: $('#table_url').attr('data-table-url'),
    columns: [
        {data: 'item_name', name: 'item_name'},
        {data: 'released_date', name: 'released_date'},
        {data: 'duration', name: 'duration'},
        {data: 'full_url', name: 'full_url'},
        {data: 'is_premium', name: 'is_premium'},
        {
            data: 'action', 
            name: 'action', 
            orderable: false, 
            searchable: false,
            "class" : "td-actions text-right",  
        },
    ]
});

$(document).ready(function () {
    
      var submit = $('.submit-chapter')
    uploadImage()
    
    function uploadImage() {
      var button = $('.images .pic')
      var uploader = $('<input type="file" accept="image/*" />')
      var images = $('.images')
      
      button.on('click', function () {
        uploader.click()
      })
      
      uploader.on('change', function () {
          var reader = new FileReader()
          reader.onload = function(event) {
            images.prepend('<div class="img" style="background-image: url(\'' + event.target.result + '\');" rel="'+ event.target.result  +'"><span>remove</span></div>')
          }
          reader.readAsDataURL(uploader[0].files[0])
  
       })
      
      images.on('click', '.img', function () {
        $(this).remove()
      })
    
    }


     submit.on('click', function () {
            var images = $('.images .img')
          var imageArr = []
          str='';
          for(var i = 0; i < images.length; i++) {
            var strImage = $(images[i]).attr('rel').replace(/^data:image\/[a-z]+;base64,/, "");

            str+='<input type="text" name="images[]" class="" value="'+strImage+'">';
            // imageArr.push({url: $(images[i]).attr('rel')})
          }
          $('.image_append').html(str);
        //   $('#multi-image').val(imageArr);
      })
    
    // function submit() {  
    //   var button = $('#send')
      
    //   button.on('click', function () {
    //     if(!way) {
    //       var title = $('#title')
    //       var cate  = $('#category')
    //       var images = $('.images .img')
    //       var imageArr = []

          
    //       for(var i = 0; i < images.length; i++) {
    //         imageArr.push({url: $(images[i]).attr('rel')})
    //       }
          
    //       var newStock = {
    //         title: title.val(),
    //         category: cate.val(),
    //         images: imageArr,
    //         type: 1
    //       }
          
    //       saveToQueue(newStock)
    //     } else {
    //       // discussion
    //       var topic = $('#topic')
    //       var message = $('#msg')
          
    //       var newStock = {
    //         title: topic.val(),
    //         message: message.val(),
    //         type: 2
    //       }
          
    //       saveToQueue(newStock)
    //     }
    //   })
    // }
    
  })