var Header = {
  init: function(){
    Header.html()
    Header.events();
  },

  html: function(){
    $('#header').html("<div id=\"h_home\">Home</div>" +
    "<div id=\"h_create_post\">Create Post</div>" +
    "<div id=\"h_notifications\"></div>" +
    "<div id=\"h_search\">Search</div>" +
    "<div id=\"h_profile\"></div>" +
    "<div id=\"h_logout\">Logout</div>"
  )
  },

  events: function(){
    $('#h_home').on('click', function(){
      localStorage.feed_page = 0;
      window.location.href = "/"
    })

    $('#h_create_post').on('click', function(){
      // window.location.href = "/create_post.html"
      $('body').append('<div id="cp">'+
      'Title: <input type="text" id="title" placeholder="title">'+
        'Image: <input type="file" id="image">'+
        'Text:  <textarea type="text" id="text" placeholder="text"></textarea>'+
        '<button id="submit" onclick="createPost()">Create Post</button><button id="close">Cancel</button>'+
        '<div id="message"></div>'+
        '</div>')

        $('#close').on('click', function(){
          $('#cp').remove();
        })
    })

    $('#h_logout').on('click', function(){
      delete localStorage.id;
      $.ajax({
        type: 'GET',
        url: "logout.php",
        dataType: "json"
      }).done(function(data){
        console.log(data)
        window.location.href = "/login.html"
      })
    })

    $('#h_profile').on('click', function(){
      window.location.href = "/profile.html"
    })

    $('#h_search').on('click', function(){
      window.location.href = "/search.html"
    })

    $('#h_notifications').on('click', function(){
      window.location.href = "/notifications.html"
    })
  }
}

$( document ).ready(function() {
  Header.init()
})
