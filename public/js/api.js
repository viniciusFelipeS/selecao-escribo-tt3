//GET
$(document).ready(function () {
  $.getJSON("api", function (result) {
    $.each(result, function (i, field) {
      showCars(field);
    });
  });
});

//POST
$("#form1").submit(function (event) {
  event.preventDefault();
  var form = $(this);
  $.post(form.attr("action"), form.serialize(), function (data) {
    addCar(data);
  });
  return false;
});

//DELETE
$(document).on("click", ".delete", function (event) {
  event.preventDefault();
  let carId = $(this).attr("data-id");
  $.ajax({
    type: "DELETE",
    url: `api/${carId}`,
    success: function (data) {
      removeCar(data);
    },
    error: function (data) {
      console.log("Error:", data);
    },
  });
});





function showCars(field) {
  let li = document.createElement("li");
  let btn = document.createElement("button");
  li.appendChild(document.createTextNode(field.id));
  btn.innerHTML = field.id;
  btn.setAttribute("class", `delete`);
  btn.setAttribute("data-id", field.id);
  document.getElementById("teste").appendChild(li);
  document.getElementById("teste").appendChild(btn);
}

function addCar(carId) {
  $.getJSON(`http://localhost/estribo/api/${carId}`, function (result) {
    $.each(result, function (i, field) {
      showCars(field);
    });
  });
}

function removeCar(carId) {
  $(".delete").filter(function () {
    if ($(this).attr("data-id") == carId) {
      $(this).remove();
    }
  });
  $("li").filter(function () {
    if ($(this).text() == carId) {
      $(this).remove();
    }
  });
}
