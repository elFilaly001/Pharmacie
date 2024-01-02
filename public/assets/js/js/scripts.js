/*!
    * Start Bootstrap - SB Admin v7.0.4 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2021 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    // 
// Scripts
// 

window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});

$(document).ready(function () {
    $('select').selectize({
        sortField: 'text'
    });
});

function addNewSale(){
        const client = document.getElementById('select-client').value;
        const midi = document.getElementById('select-midi').value;

        // Create a JSON object with the data
        const data = {
            client: client,
            midi: midi
        };

        // Convert the data to a JSON string
        const jsonData = JSON.stringify(data);

        // Make an AJAX request to add a new user
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '/sale', true);
        xhr.setRequestHeader('Content-Type', 'application/json'); //================>    بحلا كتقول للسرفر هد 
                                                                                //    data li bghit nssift raha b forma json 

        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                    if(xhr.responseText == 'sale is secces'){
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: xhr.responseText,
                           
                        });
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: xhr.responseText,
                         
                        });
                    }
                 
                } else {
                  
                    console.error('Error:', xhr.status, xhr.statusText);
                }
            }
        };

        // Send the JSON data
        xhr.send(jsonData);
    }

    function  GetFormData(u_id,m_id,name,med,selNum,date){
            
          
        document.getElementById("c-option").value=u_id;
        document.getElementById("c-option").innerHTML=name;
        document.getElementById("m-option").value=m_id;
        document.getElementById("m-option").innerHTML=med;
        document.getElementById("upDate").value=date;
        document.getElementById("myHiddenField").value=selNum;

     }
     function sendForm(){
         const id = document.getElementById("myHiddenField").value;
         const client = document.getElementById('c-select').value;
         const midi = document.getElementById('m-select').value;
         const date = document.getElementById("upDate").value;
   
// Create a JSON object with the data
         const data = {
             client:client,
             midi:midi,
             date:date,
             id:id};
         console.log(data);

// // Convert the data to a JSON string
const jsonData = JSON.stringify(data);

// // Make an AJAX request to add a new user
const xhr = new XMLHttpRequest();
xhr.open('POST', '/updatesale', true);
xhr.setRequestHeader('Content-Type', 'application/json'); 

xhr.onreadystatechange = function() {
if (xhr.readyState == 4) {
if (xhr.status == 200) {
console.log('-------------------------------------');
console.log(this.responseText);
console.log('-------------------------------------');
if(xhr.responseText == 'yeeeesss' || xhr.responseText==""){
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: 'UPDATE SECCES',
       
    });
}else{
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: xhr.responseText,
     
    });
}

} else {

console.error('Error:', xhr.status, xhr.statusText);
}
}
};

// Send the JSON data
xhr.send(jsonData);


     }
 
