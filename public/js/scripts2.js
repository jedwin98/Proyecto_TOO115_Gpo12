// function irArriba(pixeles) {
// 	// body...
// 	window.addEventListener("scroll", () => {
// 		var scroll = document.documentElement.scrollTop;
// 		//console.log(scroll);

// 		if(scroll > pixeles){
// 			btnSubir.style.right = 20 + "px";
// 		}
// 		else{
// 			btnSubir.style.right = -100 + "px";
// 		}
// 	})
// }
// irArriba(300);

// $(window).on('hashchange', function(e){
//     history.replaceState ("", document.title, e.originalEvent.oldURL);
// });

function removevalidateform(formid){
    var element = document.getElementById(formid);
    element.classList.remove("was-validated");
}

// JavaScript for disabling form submissions if there are invalid fields
(function () {
    'use strict'
  
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')
  
    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
      .forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }
  
          form.classList.add('was-validated')
        }, false)
      })
  })()
