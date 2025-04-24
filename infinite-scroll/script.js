$(document).ready(function () {
    let page = 1;
    const limit = 5;
    let loading = false;
  
    function loadPosts() {
      if (loading) return;
  
      loading = true;
      $('#loading').show();
  
      $.get(`https://jsonplaceholder.typicode.com/posts?_page=${page}&_limit=${limit}`, function (data) {
        data.forEach(post => {
          $('#posts').append(`
            <div class="post">
              <h4>${post.title}</h4>
              <p>${post.body}</p>
            </div>
          `);
        });
  
        $('#loading').hide();
        loading = false;
        page++;
      });
    }
  
    // Initial load
    loadPosts();
  
    // Detect when near bottom
    $(window).scroll(function () {
      if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100) {
        loadPosts();
      }
    });
  });
  