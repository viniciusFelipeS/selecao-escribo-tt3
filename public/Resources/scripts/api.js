//GET
$(document).ready(function () {
  $.getJSON("api", function (result) {
    $.each(result, function (i, field) {
      showCars(field);
    });
  });
});

//POST
$("#form-add").submit(function (event) {
  event.preventDefault();
  var form = $(this);
  $.post(form.attr("action"), form.serialize(), function (data) {
    $('#add-car').modal('toggle');
    addCar(data);
  });
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
  });
});

//PATCH
$(document).on("submit", ".form-update", function (event) {
  event.preventDefault();
  let form = $(this);
  $.ajax({
    type: "PATCH",
    url: form.attr("action"),
    data: form.serialize(),
  });
});

function showCars(field) {
  let list = document.getElementById("table-car");
  let row = document.createElement("tr");
  row.setAttribute("data-id", field.id);
  
  let idCar = document.createElement("th");
  idCar.setAttribute("scope", "row");
  idCar.innerHTML = field.id;
  
  let modelCar = document.createElement("td");
  modelCar.innerHTML = field.model;
  
  let priceCar = document.createElement("td");
  priceCar.innerHTML = field.price;
  
  let actionCar = document.createElement("td");
  actionCar.setAttribute("class", "text-center");
  buttonActions = ` <button class="btn btn-danger delete" data-id="${field.id}">+</button>
  <button class="btn btn-warning" data-id="${field.id}">+</button>`;
  actionCar.innerHTML = buttonActions;
  
  row.append(idCar,modelCar,priceCar,actionCar);
  list.appendChild(row);
}

function addCar(carId) {
  $.getJSON(`http://localhost/estribo/api/${carId}`, function (result) {
    $.each(result, function (i, field) {
      showCars(field);
    });
  });
}

function removeCar(carId) {
  $("tr").filter(function () {
    if ($(this).attr("data-id") == carId) {
      $(this).remove();
    }
  });
}