<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js" integrity="sha512-dqw6X88iGgZlTsONxZK9ePmJEFrmHwpuMrsUChjAw1mRUhUITE5QU9pkcSox+ynfLhL15Sv2al5A0LVyDCmtUw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" integrity="sha512-8bHTC73gkZ7rZ7vpqUQThUDhqcNFyYi2xgDgPDHc+GXVGHXq+xPjynxIopALmOPqzo9JZj0k6OqqewdGO3EsrQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>KSUBlogger | Login</title>
    <style type="text/css">
    body {
    background: linear-gradient(90deg, #e3ffe7 0%, #d9e7ff 100%);
    }
    body > .grid {
      height: 100%;
    }
    .column {
      max-width: 450px;
    }
  </style>
</head>
<body>
<div class="ui middle aligned center aligned grid">
  <div class="column">
    <h2 class="ui blue  header">
      <div class="content">
        Log-in to your account
      </div>
    </h2>
    <form class="ui large form">
      <div class="ui stacked segment">
        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input id="user" type="text" name="username" placeholder="username">
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input id="pass" type="password" name="password" placeholder="Password">
          </div>
        </div>
        <a id="sublog" class="ui fluid large blue  button">Login</a>
      </div>
      <div class="ui message error">
      </div>
    </form>
    <div class="ui stacked segment">
    <h1 class="ui horizontal divider">Guest</h1>
    <a href="./app.php" class="ui fluid large blue submit button">Continue as Guest</a>
    </div>
    <div class="ui stacked segment">
    <h1 class="ui horizontal divider">New account</h1>
    <a href="./signup.php" class="ui fluid large blue submit button">Sign up</a>
    </div>
    
  </div>
</div>
</body>
    <script>
    $('#sublog').click((e)=> {
      e.preventDefault();
      if($('#pass').val() != "" && $('#user').val() != "") {
        $.post("../server/data/login_database.php",{type:3,username:$('#user').val(),password:$('#pass').val()}).done((data)=> {
            console.log(data);
            if(data == "not found") {$('form').addClass('error');$('.message.error').append('<p class ="takene">username or password is incorrect</p>')}
            else {
              $('.takene').remove();
              if(sessionStorage.getItem("user") == null) {
              sessionStorage.setItem('user',$('#user').val())
              window.location.replace('app.php');
              }
            }
        }).fail()
      }
    })

    $('.field input').blur((e)=>{
      if($(e.target).val() == "") {
        $('form').addClass('error')
        if($('.message.error').find(`.empty.${$(e.target).attr('name')}`).length ==0)
        $('.message.error').append(`<p class = "empty ${$(e.target).attr('name')}">${$(e.target).attr('name')} is empty</p>`)
      }
      else {
        $(`.empty.${$(e.target).attr('name')}`).remove();

      }
    })
    </script>
    </html>