$(document).ready(() => {
  const $tbody = $("#datatablesSimple").find("tbody");
  const $form = $("#AddForm");
  const $btnAdd = $("#med_add_btn");
  const $nameInp = $("#med_name");
  const $typeInp = $("#med_type");
  const $descInp = $("#med_description");
  const $priceInp = $("#med_price");
  const $imgInp = $("#med_img");
  const $btnUpd = $(".update_med");
  const btn = document.querySelector(".submit");

  const generateTr = (name, type, description, price, img, id = "") => {
    return `<tr >
    <td>
    <input type="hidden" class="med_id" name="med_id" id="id" value="${id}">
    <img class="postcard__img" src="assets/img2/${img}" style="width: 50px; height: 50px; border-radius: 50%;" alt="Image Title" />
    </td>
    <td class="text-left align-middle" id="name">${name}</td>
    <td class="text-left align-middle" id="type">${type}</td>
    <td class="text-left align-middle" id="desc">${description}</td>
    <td class="text-left align-middle" id="price">${price}</td>
    <td class="d-flex justify-content-around">
    <button type="submit" id="update_med" data-id="${id}" class="btn btn-success" onclick="clicked(event)">
    <i class="fa-solid fa-pen-to-square"></i>
    </button>
    <button type="submit" id="delete_med_${id}" class="btn btn-danger" onclick="delclicked(event)">
    <i class="fa-solid fa-trash-can"></i>
    </button>
    </td>
    </tr>
    `;
  };

  // hide/show med form
  $btnAdd.click(() => {
    $nameInp.val([]);
    $typeInp.val([]);
    $descInp.val([]);
    $priceInp.val([]);
    $imgInp.val([]);
    if ($form.css("display") != "none") {
      $btnAdd.text("Add Medicine");
      $form.hide();
    } else {
      $btnAdd.text("Hide Medicine Form");
      $form.show();
      btn.id = "Add";
    }
  });

  // submit the form
  $form.submit((e) => {
    e.preventDefault();
    const $id = $("#med_idInp").val();
    const $name = $("#med_name").val();
    const $description = $("#med_description").val();
    const $type = $("#med_type").val();
    const $price = $("#med_price").val();
    const $fileInput = $("#med_img")[0].files[0];

    let data = new FormData();
    data.append("med_name", $name);
    data.append("med_type", $type);
    data.append("med_desc", $description);
    data.append("med_price", $price);
    data.append("med_img", $fileInput);

    if (btn.id == "Add") {
      $.ajax({
        url: "/add_med",
        type: "POST",
        data: data,
        contentType: false,
        processData: false,
        success: function (result) {
          $tbody.append(
            generateTr(
              result.med_name,
              result.type,
              result.description,
              result.price,
              result.img,
              result.med_id
            )
          );
          // alert("Med Added Successfully");

          console.log(result.img);
        },
        error: function (error) {
          console.error("Error adding medication:", error);
        },
      });
      $nameInp.val([]);
      $typeInp.val([]);
      $descInp.val([]);
      $priceInp.val([]);
      $imgInp.val([]);
    }
    if (btn.id == "Upd") {
      data.append("med_id", $id);
      updateMedication(data);
    }
  });

  async function updateMedication(data) {
    try {
      const response = await fetch("/medUpd", {
        method: "POST",
        headers: {
          //hhhhhhhh
        },
        body: data,
      });

      if (!response.ok) {
        throw new Error("Network response was not ok.");
      }

      alert("Med updated Successfully");
    } catch (error) {
      console.log(error);
    }
  }

  fetch("/meds/get")
    .then((response) => {
      if (!response.ok) {
        throw new Error("Network response was not ok.");
      }

      return response.json();
    })
    .then((data) => {
      const $tb = $("#datatablesSimple").find("tbody");
      let TbRow = "";
      data.forEach((med) => {
        TbRow += `<tr>
          <td>
          <input type="hidden" class="med_id" name="med_id" id="id" value="${med.id}">
          <img class="postcard__img" src="assets/img2/${med.img}" style="width: 50px; height: 50px; border-radius: 50%;" alt="Image Title" />
          </td>
          <td class="text-left align-middle " id="name">${med.med_name}</td>
          <td class="text-left align-middle" id="type">${med.type}</td>
          <td class="text-left align-middle" id="desc">${med.description}</td>
          <td class="text-left align-middle" id="price">${med.price}</td>
          <td class="d-flex justify-content-around">
          <button type="submit" id="update_med" data-id="${med.med_id}" class="btn btn-success" onclick="clicked(event)">
          <i class="fa-solid fa-pen-to-square"></i>
          </button>
          <button type="submit" id="delete_med_${med.med_id}" data-id="${med.med_id}" class="btn btn-danger" onclick="delclicked(event)">
          <i class="fa-solid fa-trash-can"></i>
          </button>
          </td>
          </tr>
          `;
        $tb.html(TbRow);
      });
    })
    .catch((error) => {
      console.error("There was a problem with the fetch operation:", error);
    });
});
console.log(document.getElementById("id"));
//get the info update button
function clicked(e) {
  let id = e.currentTarget.dataset.id;
  const $form = $("#AddForm");
  const idInp = document.getElementById("med_idInp");
  const nameInp = document.getElementById("med_name");
  const typeInp = document.getElementById("med_type");
  const descInp = document.getElementById("med_description");
  const priceInp = document.getElementById("med_price");
  const btn = document.querySelector(".submit");
  btn.id = "Upd";

  $form.show();

  fetch(`/med/get?id=${id}`, {})
    .then((res) => {
      if (!res.ok) {
        throw new Error("Network response was not ok.");
      }
      return res.json();
    })
    .then((data) => {
      idInp.value = id;
      nameInp.value = data.med_name;
      typeInp.value = data.type;
      descInp.value = data.description;
      priceInp.value = data.price;
    });
}
function delclicked(e) {
  let id = e.currentTarget.dataset.id;
  let tr = e.currentTarget.closest("tr");
  console.log(id);
  console.log(tr);
  fetch(`/DeltMed?delid=${id}`, {})
    .then((res) => {
      if (!res.ok) {
        throw new Error("Network response was not ok.");
      }
    })
    .then(() => {
      tr.remove();
      alert("Deleted Successfully");
    });
}
