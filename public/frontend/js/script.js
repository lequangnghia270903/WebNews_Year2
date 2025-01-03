document.addEventListener("DOMContentLoaded", function(event) {
  var alert_cart = document.querySelector('#alert_cart')

    $('#btn_add_cart').on("click", function (e) {
      e.preventDefault();  
      alert_cart.style.display = 'block'            
      const goTo = $(this).attr("href");   
     
      setTimeout(function(){
        window.location = goTo;
      }, 1000);                           
    }); 
})