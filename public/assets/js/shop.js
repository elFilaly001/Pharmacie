$(document).ready(() => {
  const $div_card = $("#prd_card");
  const $forms = $("#prd_form");

  const generateCard = (id, med_name, desc, price, img) => {
    return `
      <form class="prd_form" enctype="multipart/form-data">
    <div class="fruite-img" id="prd_img">
    <input type="hidden" id="prd_id" value="${id}">
    <img src="assets/img2/${img}" class="img-fluid w-100 rounded-top" alt="">
</div>
<div class="p-4 border border-secondary border-top-0 rounded-bottom">
    <h4>${med_name}</h4>
    <p>${desc}</p>
    <div class="d-flex justify-content-between flex-lg-wrap">
        <p class="text-dark fs-5 fw-bold mb-0">${price}</p>
        <button type="submit" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</button>
    </div>
</div>
</form>`;
  };

  // $form.submit((e) => {
  //   e.preventDefault();
  // });
});

// async function showsale(data) {
//   const response = await fetch("/showCard", {
//     method: "POST",
//     body: data,
//   });
//   if (!response.ok) {
//     throw new Error("Network response was not ok.");
//   }
//   console.log(data);
// }
