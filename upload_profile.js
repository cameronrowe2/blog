function uploadProfile() {
  if($('#profile_img').prop('files').length == 0) {
    return;
  }

  var file_data = $('#profile_img').prop('files')[0];
  var form_data = new FormData();
  form_data.append('file', file_data);
  $.ajax({
    url: 'image_upload.php', // point to server-side PHP script
    dataType: 'json',  // what to expect back from the PHP script, if anything
    cache: false,
    contentType: false,
    processData: false,
    data: form_data,
    type: 'post',
    success: function(data){
        console.log(data);
        if(data.success){

          $.ajax({
            type: 'GET',
            url: "change_profile.php",
            dataType: "json",
            data: {
              image: data.image_url,
              id: localStorage.id
            }
          }).done(function(data){
            if(data.success) {
              console.log(data)
            } else {
              console.log(data)
            }
        })
        }
      }
  })
}
