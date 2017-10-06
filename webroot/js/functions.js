// jquery function which make notification dissapear in all project
$(document).ready(function () {
  setTimeout(function () {
      $('#dissapear').hide();
  }, 2000);
});

// this is for tooltip on product/view
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});

// with this function user can print information on product/view if user logged in
function printDivLogged(divName) {
  // making some changes in styles for printable elements
  document.getElementById("picproduct").classList.add('smallerpic');
  document.getElementById("title-print").classList.add('title-product');
  document.getElementById("display").classList.add('display-none');
  document.getElementById("display-button").classList.add('display-none');
  document.getElementById("Quantity").classList.add('display-none');

  var printContents = document.getElementById(divName).innerHTML;
  var originalContents = document.body.innerHTML;
  document.body.innerHTML = printContents;
  window.print();
  document.body.innerHTML = originalContents;

  // discarding style
  document.getElementById("picproduct").classList.remove('smallerpic');
  document.getElementById("title-print").classList.remove('title-product');
  document.getElementById("display").classList.remove('display-none');
  document.getElementById("display-button").classList.remove('display-none');
  document.getElementById("Quantity").classList.remove('display-none');
}
