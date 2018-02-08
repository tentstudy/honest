$(function() {
  $(document).on('click','#per-infor',function(){
    $('.personal-information').show();
    $('.manage-exit').css("background-color", "#f5f8fa");
    $('.manage-change').css("background-color", "#ffffff");
    $('.manage-delete').css("background-color", "#ffffff");
    $('.change-password').hide();
    $('.remove-account').hide();
  });

  $(document).on('click','#pass',function(){
    $('.personal-information').hide();
    $('.manage-exit').css("background-color", "#ffffff");
    $('.manage-change').css("background-color", "#f5f8fa");
    $('.manage-delete').css("background-color", "#ffffff");
    $('.change-password').show();
    $('.remove-account').hide();
  });

  $(document).on('click','#r-account',function(){
    $('.personal-information').hide();
    $('.manage-exit').css("background-color", "#ffffff");
    $('.manage-change').css("background-color", "#ffffff");
    $('.manage-delete').css("background-color", "#f5f8fa");
    $('.change-password').hide();
    $('.remove-account').show();
  });
});

$(document).ready(function(){
    $('.personal-information').show();
    $('.change-password').hide();
    $('.remove-account').hide();
});