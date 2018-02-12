$( document ).ready(function() {

  $.ajax({
    url: 'get_notifications.php',
    type: "get",
    dataType: 'json',
    data: {
      id: localStorage.id
    }
  }).done(function(data){
    console.log(data)
    if(data.success) {
      $('#h_notifications').text(data.notifications.length + ' Notifications')
    }
  })

})
