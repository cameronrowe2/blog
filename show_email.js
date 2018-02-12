$( document ).ready(function() {

  if(localStorage.id == "null" || typeof localStorage.id == "undefined") {
    window.location.href = "login.html"
  }

  $.ajax({
    type: 'GET',
    url: "get_profile.php",
    dataType: "json",
    data: {
      id: localStorage.id
    }
  }).done(function(data){
    if(data.success) {
      $('#h_profile').text(data.profile.username)
    } else {
      console.log(data)
    }
  })
})
