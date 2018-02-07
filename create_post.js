function createPost(){
  var title = $('#title').val()
  var text = $('#text').val()
  var aid = localStorage.id;

  if(title.length > 200) {
    $('#message').val('Text can only take 200 characters')
    return;
  }

  if(text.length > 255) {
    $('#message').val('Text can only take 255 characters')
    return;
  }

  var file_data = $('#image').prop('files')[0];
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
            type: 'POST',
            url: "create_post.php",
            dataType: "json",
            data: {
              title: title,
              text: text,
              image_url: data.image_url,
              aid: aid
            }
          }).done(function(data){
            if(data.success) {
              $('#title').val('')
              $('#text').val('')
              $('#image').val('')
              $('#ca').remove()

              var v = data.data
              var profile_image = (v.profile_image == null ? "default.png" : v.profile_image)

              $('#feed').prepend(
                "<div class='feed_post'><h3 onclick='getPost("+v.ID+")' id='"+v.ID+"'>"+v.title+"</h3>" +
                "<img height='300' src='"+v.image+"'>" +
                "<p><a href='profile.html?id="+v.aid+"'><img width='20' height='20' src='"+profile_image+"'>"+v.username+"</a>: "+v.text+"</p></div>"
              )

            } else {
              console.log(data)
            }
        })
      }
    }
})
}
