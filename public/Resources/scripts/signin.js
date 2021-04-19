//POST
$("#form-login").submit(function (event) {
  event.preventDefault();
  var form = $(this);
  $.ajax({
    type: "POST",
    url: form.attr("action"),
    data: form.serialize(),
    success: (data) => {
      window.location = '/estribo/';
    },
    error: function (XMLHttpRequest, textStatus, errorThrown) {
      $(".modal-title").html("Error");
      $("#error-msg").html(XMLHttpRequest.responseText);
      $(".modal").modal("show");
    },
  });
});

$("#form-login-admin").submit(function (event) {
  event.preventDefault();
  var form = $(this);
  $.ajax({
    type: "POST",
    url: form.attr("action"),
    data: form.serialize(),
    success: (data) => {
      window.location = '/estribo/admin';
    },
    error: function (XMLHttpRequest, textStatus, errorThrown) {
      $(".modal-title").html("Error");
      $("#error-msg").html(XMLHttpRequest.responseText);
      $(".modal").modal("show");
    },
  });
});

