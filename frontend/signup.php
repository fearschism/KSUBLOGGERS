<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js" integrity="sha512-dqw6X88iGgZlTsONxZK9ePmJEFrmHwpuMrsUChjAw1mRUhUITE5QU9pkcSox+ynfLhL15Sv2al5A0LVyDCmtUw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" integrity="sha512-8bHTC73gkZ7rZ7vpqUQThUDhqcNFyYi2xgDgPDHc+GXVGHXq+xPjynxIopALmOPqzo9JZj0k6OqqewdGO3EsrQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>KSUBlogger | Signup</title>
</head>
<style>
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
<body>
<div class="ui middle aligned center aligned grid">
  <div class="column">
    <h2 class="ui blue  header">
      <div class="content">
        Sign-up Here!
      </div>
    </h2>
    <form class="ui large form">
      <div class="ui stacked raised segment">
              <div class="ui horizontal raised segment">
                <h4>Account Type</h4>
                <div class="ui basic buttons">
                <a class="ui button g1 ">blogger</a>
                <a class="ui button g1 active">user</a>
                </div>
              </div>
        <div class="ui  horizontal segments">
          <div class="ui  segment"><div class="field">
          <div class="ui left icon input">
            <i class="address book icon"></i>
            <input id="fname" type="text" name="firstname" placeholder="First Name" maxLength="20">
          </div>
        </div></div>
          <div class="ui segment"><div class=" field">
          <div class="ui left icon input">
            <i class="address book icon"></i>
            <input id="lname" type="text" name="lastname" placeholder="Last Name" maxLength="20">
          </div>
        </div></div>
        </div>
        <div class="  field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input id="user" type="text" name="username" placeholder="Username" maxLength="20">
          </div>
        </div>
        
        <div class=" field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input id="pass" type="password" name="password" placeholder="Password" maxLength="20">
          </div>
        </div>
        <div class="ui error message">
  </div>
        <a id="subup" class="ui fluid large blue  button">Sign-up</a>
      </div>

    </form>
    <div class="ui raised stacked segment">
    <h4 class="ui horizontal divider">already signed up?</h4>
    <a href="Login.php" class="ui fluid large blue button">Login</a>
    </div>
    
  </div>
</div>

<div class="ui basic modal">
  <div class="ui icon header ret">
    <i class="checkmark icon"></i>
    Registeration Successful
  </div>
  <div class="actions">
    <a href="Login.php" class="ui green ok inverted button">
      <i class="checkmark icon"></i>
      Close
    </a>
  </div>
</div>
</body>
    <script>
      var ok = false; var taken = false;
    $('.g1').on('click', () => {
      $('.g1').toggleClass('active')
       console.log($('.g1.active').html());
    })
    //
      
    $('#subup').on('click', (e)=> {
      if($('#fname').val() !="" && $('#lname').val() != "" && $('#user').val() != "" && $('#pass').val() != "" && $('#pass').val().length >= 6 && $('.message').children().length ==0) {
      e.preventDefault();$('.ui.large.form').removeClass('error');
      console.log('posted')
      $.post( "../server/data/reg.php", { type: 2, firstname: $('#fname').val(),lastname:$('#lname').val() , username:$('#user').val() , password:$('#pass').val(), acc: $('.g1.active').html() })
      .done(function( data1 ) {
        $('.ret').append(data1);
        $('.ui.basic.modal')
        .modal('show'); 
        //setTimeout(function(){ location.reload(); }, 3000);
      }).fail();
    }
  else {

  }
  
  
  })
//
  $('input').blur((e)=> {
    e.preventDefault();
    if($(e.target).val() != "") {
      console.log('ok');
      $(`.message p.${$(e.target).attr('name')}`).remove(); //removes the error
     
      if($(e.target).attr('name') == 'username') {
        $.post( "../server/data/database.php", { type: 1, u: $(e.target).val() })
      .done(function( data ) {
      console.log(data);
      if(data === "taken") {taken = false;console.log(data);$('.ui.large.form').addClass('error');$('.message').append('<p class="taken">Username is already taken</p>')}
      else {
        taken = true;
        ok= true;
        console.log(data);
        $('.message').find('.taken').remove();
      }
  }).fail(function(data) {

  });
      }
      
      if ($(e.target).attr('name') == 'password') {
        console.log($(e.target).val().length)
        if($(e.target).val().length >= 6) {
          $('.message').find('.length').remove();
          console.log('ready')
        }
        else {
          console.log('less than 6')
          $('.ui.large.form').addClass('error');
          $('.message').append('<p class="length">Password must be at least 6 charcters long</p>')
        }
      }

    }
    else{
      console.log('error');ok = false;
      if($(`.message`).find(`p.${$(e.target).attr('name')}`).length == 0) {
      $('.ui.large.form').addClass('error');
      $('.message').append(`<p class="${$(e.target).attr('name')}">${$(e.target).attr('name')} Cannot be Empty! </p>`)
      }
      else{console.log('p is not found')}
    }
  })
    </script>
    </html>