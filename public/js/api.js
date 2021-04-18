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
  let html = `
  <form action="api/${field.id}" class="form-update">
  <input name="model" placeholder="${field.model}" />
  <input name="price" placeholder="${field.price}" />
  <button type="submit">update</button>
</form>
`;
  let li = document.createElement("li");
  let btn = document.createElement("button");
  li.appendChild(document.createTextNode(field.id));
  li.innerHTML = html;
  btn.innerHTML = field.id;
  btn.setAttribute("class", `delete`);
  btn.setAttribute("data-id", field.id);
  document.getElementById("teste").appendChild(li);
  li.appendChild(btn);
  li.setAttribute("data-id", field.id);
}

function addCar(carId) {
  $.getJSON(`http://localhost/estribo/api/${carId}`, function (result) {
    $.each(result, function (i, field) {
      showCars(field);
    });
  });
}

function removeCar(carId) {
  $("li").filter(function () {
    if ($(this).attr("data-id") == carId) {
      $(this).remove();
    }
  });
}
