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
    $("#add-car").modal("hide");
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
      console.log(data)
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
    success: function (data){
      updateCar(data)
      $(`#edit-car-${data}`).modal("hide");
    }
  });
});


function showCars(field) {
  let modals = document.getElementById("modals");
  let list = document.getElementById("table-car");
  let row = document.createElement("tr");
  row.setAttribute("data-id", field.id);

  let idCar = document.createElement("th");
  idCar.setAttribute("scope", "row");
  idCar.innerHTML = field.id;

  let modelCar = document.createElement("td");
  modelCar.innerHTML = field.model;

  let yearCar = document.createElement("td");
  yearCar.innerHTML = field.year;

  let priceCar = document.createElement("td");
  priceCar.innerHTML = "R$ " + field.price;

  let statusCar = document.createElement("td");
  statusCar.setAttribute("class", "text-center");
  let statusColor = field.status == true ? "danger" : "success";
  let statusShow = field.status == true ? "disabled" : "";
  statusCar.innerHTML = `<i class="bi bi-circle-fill text-${statusColor} "></i>`;

  let actionCar = document.createElement("td");
  actionCar.setAttribute("class", "text-center");
  buttonActions = ` 
  <button class="btn btn-sm btn-warning" data-id="${field.id}" data-bs-toggle="modal" data-bs-target="#edit-car-${field.id}"><i class="bi bi-pencil-square"></i></button>
  <button class="btn btn-sm btn-danger delete" data-id="${field.id}" ${statusShow}><i class="bi bi-trash"></i></button>`;
  actionCar.innerHTML = buttonActions;


  let modal = `<div class="modal fade" id="edit-car-${field.id}" tabindex="-1" aria-labelledby="edit-car-${field.id}Label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="edit-car-${field.id}Label">Editar carro</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form class="form-update" action="api/${field.id}" autocomplete="off">
				<div class="modal-body">
					<div class="row g-3">
						<div class="col-12">
							<label for="model-car" class="col-form-label">Modelo:</label>
							<input name="model" type="text" class="form-control" id="model-car" value="${field.model}"/>
						</div>
						<div class="col">
							<label for="price-car" class="col-form-label">Preço:</label>
							<input name="price" type="number" class="form-control" id="price-car" value="${field.price}"/>
						</div>
						<div class="col">
							<label for="year-car" class="col-form-label">Ano:</label>
							<input name="year" type="text" class="form-control" id="year-car" value="${field.year}"/>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-dark">Enviar</button>
				</div>
			</form>
		</div>
	</div>
</div>`;
  modals.innerHTML += modal;
  row.append(idCar, modelCar, yearCar, priceCar, statusCar, actionCar);
  list.appendChild(row);
}

function updateCar(carId){
  $.getJSON(`http://localhost/estribo/api/${carId}`, function (result) {
    $.each(result, function (i, field) {
      editCar(field);
    });
  });
}

function editCar(field){
  let list = [];
  $("tr").filter(function () {
    if ($(this).attr("data-id") == field.id) {
      $(this).children('td').each(function (i, value) {
        list.push(value)
      });
    }
  });
  list[0].innerHTML = field.model;
  list[1].innerHTML = field.year;
  list[2].innerHTML = field.price;
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
