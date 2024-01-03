$(document).ready(() => {
  const $tbody = $("#datatablesSimple").find("tbody");
  const $form = $("#AddForm");
  const $btnAdd = $("#med_add_btn");

  const generateTr = (name, type, description, price, img, id = "") => {
    return `<tr>
    <td>
      <img class="postcard__img" src="assets/img2/${img}" style="width: 50px; height: 50px; border-radius: 50%;" alt="Image Title" />
    </td>
    <td class="text-left align-middle">${name}</td>
    <td class="text-left align-middle">${type}</td>
    <td class="text-left align-middle">${description}</td>
    <td class="text-left align-middle">${price}</td>
    <td class="d-flex justify-content-around">
      <button type="submit" id="update_med_${id}" class="btn btn-success">
        <i class="fa-solid fa-pen-to-square"></i>
      </button>
      <button type="submit" id="delete_med_${id}" class="btn btn-danger">
        <i class="fa-solid fa-trash-can"></i>
      </button>
    </td>
  </tr>
  `;
  };

  $.get("/meds/get", function (data, status) {
    if (data.error) {
      console.error(data.error);
    } else {
      data.forEach((med) => {
        $tbody.append(
          generateTr(
            med.med_name,
            med.type,
            med.description,
            med.price,
            med.img,
            med.med_id
          )
        );
      });
    }
  });

  // hide/show med form
  $btnAdd.click(() => {
    if ($form.css("display") != "none") {
      $btnAdd.text("Add Medicine");
      $form.hide();
    } else {
      $btnAdd.text("Hide Medicine Form");
      $form.show();
    }
  });

  // submit the form
  $form.submit((e) => {
    e.preventDefault();
    const $name = $("#med_name").val();
    const $description = $("#med_description").val();
    const $type = $("#med_type").val();
    const $price = $("#med_price").val();
    const $fileInput = $("#med_img")[0].files[0];

    var data = new FormData();
    data.append("med_name", $name);
    data.append("med_type", $type);
    data.append("med_desc", $description);
    data.append("med_price", $price);
    data.append("med_img", $fileInput);

    $.ajax({
      url: "/add_med",
      type: "POST",
      data: data,
      contentType: false,
      processData: false,
      success: function () {
        $tbody.append(
          generateTr($name, $type, $description, $price, $fileInput.name)
        );
        alert("Med Added Successfully");
      },
      error: function (error) {
        console.error("Error adding medication:", error);
      },
    });
  });

  fetch(
    "http://localhost:5050/meds?med_name=&med_type=&med_description=&med_price="
  ).then((Response) => console.log(Response.text));
});
