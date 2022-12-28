'use strict';
$(function()
{
  jQuery.validator.addMethod("isZip", function(value, element) {
    return this.optional( element ) || /^\d{3}-?\d{4}$/.test( value );
  });
  jQuery.validator.addMethod("isPhone", function(value, element) {
    return this.optional( element ) || /^(0[5-9]0[0-9]{8}|0[1-9][1-9][0-9]{7})$/.test( value );
  });

  $('#form').validate({
    rules:{
      //name属性
      name: {
        required : true
      },
      user_name: {
        required : true
      },
      email:{
        required: true,
        email    : true
      },
      password: {
        required : true,
      },
      password_conf: {
        required : true,
        equalTo  : 'input[name=password]'
      },
      post_number: {
        required : true,
        isZip    : true
      },
      address: {
        required : true
      },
      tel: {
        required : true,
        isPhone :true
      },
      checker: {
        required : true
      }
    }
    ,
    messages: {
      //name属性
      name: {
        required : '必須項目です'
      },
      user_name: {
        required : '必須項目です'
      },
      email: {
        required: '必須項目です',
        email    : 'メール形式です'
      },
      password: {
        required : '必須項目です',
      },
      password_conf: {
        required : '必須項目です',
        equalTo  : 'パスワードが一致しません'
      },
      post_number: {
        required : '必須項目です',
        isZip    : '郵便番号形式です'
      },
      address: {
        required : '必須項目です'
      },
      tel: {
        required : '必須項目です',
        isPhone : "半角数字で続けて入力してください",
      },
      checker: {
        required : '利用規約に同意してください'
      }
    }
    ,
    errorPlacement: function(error, element){
      let parent = element.closest('label');
      error.appendTo(parent);
    },
    errorElement: "div",
    errorClass  : "is-error",
  });

  $('input[name=post_number]').keyup(function() {
    if($(this).val().indexOf('-') < 0 && $(this).val().length === 3)  {
      $(this).val($(this).val() + '-');
    }
    if($(this).val().indexOf('-') !== 3) {
      $(this).val($(this).val().replace(/-/g, ''));
    }
  });
});