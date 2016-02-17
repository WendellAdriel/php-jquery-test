$(document).ready(function() {
  $('#city').autocomplete({
    autoFocus : true,
    source : 'server/search.php',
    minLength : 3,
    search : function(event, ui)
    {
      $('#progress').removeClass('hide');
    },
    response : function(event, ui)
    {
      $('#progress').addClass('hide');
    },
    change : function(event, ui)
    {
      if (ui.item === null || ui.item === undefined)
      {
        $(this).val('');
        $(this).focus();
      }
    },
    select : function(event, ui)
    {
      window.location.href = 'http://localhost/php-jquery-test/' + ui.item.slug;
    }
  });

  $('#city').keydown(function(event) {
    if (event.keyCode === 13)
    {
      event.preventDefault();
    }
  });

  $('#city').focus(function() {
    $(this).val('');
  });
});
