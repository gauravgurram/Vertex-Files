$(document).ready(function(){
    $('input[type="text"],textarea').keyup(function(evt){
      var txt = $(this).val();
      // Regex taken from php.js (http://phpjs.org/functions/ucwords:569)
      $(this).val(txt.replace(/^(.)|\s(.)/g, function($1){ return $1.toUpperCase( ); }));
    });
  
    $('input[type="email"]').keyup(function(){
      $(this).val().toLowerCase();
    })
  
  });