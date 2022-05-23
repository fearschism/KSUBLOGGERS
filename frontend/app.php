<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" integrity="sha512-8bHTC73gkZ7rZ7vpqUQThUDhqcNFyYi2xgDgPDHc+GXVGHXq+xPjynxIopALmOPqzo9JZj0k6OqqewdGO3EsrQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js" integrity="sha512-dqw6X88iGgZlTsONxZK9ePmJEFrmHwpuMrsUChjAw1mRUhUITE5QU9pkcSox+ynfLhL15Sv2al5A0LVyDCmtUw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KSUBlogger | Home</title>
    <style>
      body {
        margin: 0rem 2rem 2rem 2rem;
      }
      #editor {
        height: 300px;
      }
      .blogt {
        display: block;
  white-space: nowrap;
  width: 12em;
  overflow: hidden;
  text-overflow: ellipsis;
      }
    </style>
</head>
<body>
<div class="ui secondary  menu">
  <div class="item">
  <img class="ui small circular image" src="logo.png">
  </div>
<div class="item user-name">
      <div class="ui teal large label username1">
      saad2001
      <div class="detail acc">BLOGGER</div>
    </div>
  </div>

  <div class="right menu">
    
    <div class="item">
      <div class="ui icon input">
        <input type="text" class="searchinput" placeholder="Search...">
        <i class="search link icon"></i>
      </div>
    </div>
    <a class="ui item logout">
      Logout
    </a>
  </div>
</div>
<div class="ui center teal aligned header">HOME</div>
<div class="ui content inline">
  <select class="ui dropdown sortby">
  <option value="1">Lastest</option>
  <option value="1">Rating</option>
  <option value="0">Comment</option>
  <option value="0">myblogs</option>
</select>
<button class="ui icon teal button writenewblog">
  <i class="alternative pencil icon"></i>
</button>
</div>

<div class="ui horizontal  divider">BLOGS</div>
<div class="ui  basic segment">
<div class="ui four raised cards mainblogs">
</div>


</div>

<div class="ui modal main">
  <div class="header modalt">Header</div>
  <i class="ui close main icon"></i>
    <div class="description"><div class="ui teal reight aligned mini label">
            Author:
            <div class="detail mown">'.$row['owner'].'</div>
          </div></div>

  <div class="scrolling content">
                <div class="ui horizontal raised segment blograting">
                  <div class="ui header">Rate it</div>
                <div class="ui star large rating" data-max-rating="5" data-rating="0"></div>
              </div>
              <div class="ui horizontal center aligned raised segment blogcontrols">
                <div class="ui teal button commentb"><i class="comments outline icon"></i>Comments</div>
                <div class="ui blue button editb"><i class="edit outline icon"></i>Edit</div>
                <div class="ui red button deleteb"><i class="trash alternate icon"></i>Delete</div>
              </div>
              <div id="reader"></div>

              <div class="ui container">
          <div class="ui inline segment"><h2 class="ui dividing header">Comments</h2>
            <div class="ui button inverted green">Add Comment</div>
          </div>
            
            <div class="ui comment">
    </div>
              
  
</div>
<form id="jqdata" method="POST" enctype="multipart/form-data">
<div class="ui modal new">
  <ui class="header title">NEW BLOG</ui>
  <i class="ui close icon"></i>
  <div class="ui horizontal   segment inline">
  <div class="ui input">
  <input name ="title" class ="titleinput" type="text" placeholder="Your Title" maxlength="50">
</div>
<div class="ui left icon input">
  <input class="fileinput" type="file" name="img"placeholder="Upload blog title image...">
  <i class="file alternative icon"></i>
</div>
  </div>
<div class="ui horizontal  segment">
<input class ="blogg" name="blog" type="hidden">
  <div id="editor"></div>
</div>
<div class="actions">
   <button class="ui button inverted green"id="sub"name="submit" type="submit">SAVE</button>
  </div>
</div>
</form>
<div class="ui modal comment">
<ui class="header title">COMMENTS</ui>
  <i class="ui close icon"></i>
</div>
<div class="ui mini modal delete">
  <div class="ui icon header">
    <i class="red trash icon"></i>
    Delete Blog
  </div>
  <div class="content">
    <p>Are you sure you want to delete this blog?</p>
  </div>
  <div class="actions">
    <div class="ui blue  cancel inverted button">
      <i class="remove icon"></i>
      No
    </div>
    <div class="ui red ok inverted button deleteblog">
      <i class="checkmark icon"></i>
      Yes
    </div>
  </div>
</div>
</body>
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js" integrity="sha512-dqw6X88iGgZlTsONxZK9ePmJEFrmHwpuMrsUChjAw1mRUhUITE5QU9pkcSox+ynfLhL15Sv2al5A0LVyDCmtUw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
      var type_blog = 0;
  var editor = new Quill('#editor', {
  modules: {
    toolbar: [
      [{ header: [1, 2, false] }],
      ['bold', 'italic', 'underline'],
      ['image', 'video']
    ]
  },
  placeholder: 'Start Typing...',
  theme: 'snow'  // or 'bubble'
});
var reader = new Quill('#reader', {
  modules: {
    toolbar: false
  },
  theme: 'snow'  // or 'bubble'
});

//render cards init
$.post('../server/data/blogs/renderer.php',{type:9}).done((data)=>{
      $('.mainblogs').empty().append(data);
    });
    $('.blogdata').hide();
$('.sortby').change(()=>{
  if($('.sortby option:selected').text() =='Rating') {
    console.log("rating")
    $.post('../server/data/blogs/renderer.php',{type:7}).done((data)=>{
      console.log("rating rend done")
      $('.mainblogs').empty().append(data);
    });
  }
  else if($('.sortby option:selected').text() =='Comment') {
    console.log('comment')
    $.post('../server/data/blogs/renderer.php',{type:8}).done((data)=>{
      console.log("comm rend done")
      $('.mainblogs').empty().append(data);
    }) 
  }
  else if($('.sortby option:selected').text() =='myblogs') {
    console.log('myblogs')
    $.post('../server/data/blogs/renderer.php',{type:10,own: sessionStorage.getItem('user')}).done((data)=>{
      console.log("myblogs rend done")
      $('.mainblogs').empty().append(data);
    }) 
  }
  else {
    console.log('default'); location.reload()
  }
})

$('.mainblogs').on('click',(event)=>{
  console.log(event.target)
  if($(event.target).hasClass('readme')) {
    $('.modalt').html($(event.target).parent().find('.blogt').html());
    $('.mown').html($(event.target).parent().find('.own').html())
    sessionStorage.setItem('bid',$(event.target).parent().find('.bid').html().toString())
    if(sessionStorage.getItem('user') != $(event.target).parent().find('.own').html().toString())
    {
      $('.blograting').show();
      $('.editb').hide();
      $('.deleteb').hide();
    }
    if(sessionStorage.getItem('user') == $(event.target).parent().find('.own').html().toString()) {
      $('.editb').show();
      $('.deleteb').show();
      $('.blograting').hide();
    }
    console.log($(event.target).parent().find('.blogdata').html())
    var convert = $(event.target).parent().find('.blogdata').html();
    //console.log();
    reader.clipboard.dangerouslyPasteHTML(convert);
    reader.enable(false)
    $('.ui.modal.main').modal('setting', 'closable', false).modal('show');
    $('.editb').click(()=> {
      type_blog = 1;
          $('.titleinput').val($(event.target).parent().find('.blogt').html().toString())
          //$('.fileinput').val($(event.target).parent().find('.ui.image').attr('src'))
          editor.clipboard.dangerouslyPasteHTML(convert);
    })
    $('.commentb').click(()=> {
      
    })
    $('.deleteblog').click(()=> {
        $.post('../server/data/del.php',{type: 8, bid:$(event.target).parent().find('.bid').html().toString()}).done((data)=> {
          location.reload();
        })
    })
    $('.new').modal('setting', 'closable', false).modal('attach events','.editb')
  $('.delete').modal('setting', 'closable', false).modal('attach events','.deleteb')
  $('.comment').modal('setting', 'closable', false).modal('attach events','.commentb')
  }
})
  if(sessionStorage.getItem('user')==null){
    $('.logout').html("Login");
    $('.writenewblog').hide();
    $('.blogcontrols').remove();
    $('.blograting').remove();
    $('.logout').attr('href','Login.php');
    $('.user-name').empty().html("<div class='ui teal large label'>Please Login to Enjoy Services</div>")
  }
  else {
    $('.logout').click(function(){
      sessionStorage.clear();
      $('.logout').attr('href','app.php');
    })
    $.post('../server/data/database.php',{type:5,user: sessionStorage.getItem('user')}).done(function(data) {
      console.log(data);
      $('.username1').empty().html(`${sessionStorage.getItem('user')}<div class="detail acc">${data.toUpperCase()}</div>`);
      sessionStorage.setItem('acc',data.toUpperCase());
    })
    if(sessionStorage.getItem('acc') == "USER") {
      console.log('WE got a user')
      $('.writenewblog').hide();
      $('.editb').remove();
      $('.deleteb').remove();
    }
    $('.writenewblog').click(function(){
      $('.new').modal('setting', 'closable', false)
        .modal('show')
    })
    //search function
    $('.searchinput').blur(()=> {
      if($('.searchinput').val() != "") {
        $.post('../server/data/blogs/renderer.php',{type:11,value:$('.searchinput').val()}).done((data)=>{
          $('.mainblogs').empty().append(data);
        })
      }
      else {
        location.reload();
      }
    })

    //save blog or update blog depending on type_blog value
    $('#sub').on("click",function(e) {
      var blog = document.querySelector('input[name=blog]');
      blogy = JSON.stringify(editor.getContents());
      blog.value = editor.root.innerHTML;
      e.preventDefault();
        console.log('clicked')
        if($('.titleinput').val() != "" && $('.fileinput').val()!="" && blogy != "{\"ops\":[{\"insert\":\"\\n\"}]}") {
          console.log("ok123")
          var fd = new FormData(document.getElementById('jqdata'));
          var files = $('.fileinput')[0].files;
          fd.append('img',files[0])
          fd.append('blog', blog.value)
          fd.append('title',$('.titleinput').val())
          fd.append('owner',sessionStorage.getItem('user'));
          if(type_blog == 1) {
            fd.append('update',1);
            fd.append('bid',sessionStorage.getItem('bid'))
          }
          else {fd.append('update',0);}
          //file upload ajax
          $.ajax({
        url: '../server/data/saveblog.php', // <-- point to server-side PHP script 
        dataType: 'text',  // <-- what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: fd,                         
        type: 'post',
        success: function(data){
            alert(data); // <-- display response from the PHP script, if any
            location.reload();
        }
     });

        }
      
    })
  }

</script>
<script type="text/javascript">$(document).ready(function(){$(".rating").rating();$('.ui.modal.main')
  .modal({
    allowMultiple: false
  })});</script>
  
</html>