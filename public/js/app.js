

  //DataTable
  $('.datatable').DataTable({
    "searching": false,
    "lengthChange": false
  });

  // When the user scrolls down 80px from the top of the document, resize the navbar's padding and the logo's font size
  window.onscroll = function() {scrollFunction()};

  function scrollFunction() {
    if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
      document.getElementById("menu-atas").classList.remove("bg-transparent");
      document.getElementById("logoPoso").style.width = "100px";
      document.getElementById("logoPoso").style.height = "75px";
    } else {
      document.getElementById("menu-atas").classList.add("bg-transparent");
      document.getElementById("logoPoso").style.width = "200px";
      document.getElementById("logoPoso").style.height = "150px";
    }
  } 

  //Button Slider Kategori
  function sliderKategoriClicked(){
    const buttonRight = document.getElementById('slideRight');
    const buttonLeft = document.getElementById('slideLeft');

    buttonRight.onclick = function () {
      var container = document.getElementById('kategori-slider').scrollLeft += 120;
      // sideScroll(container,'right',25,100,10);
      container.stop().animate({scrollRight: "+=100"}, slow);
    };
    buttonLeft.onclick = function () {
      var container = document.getElementById('kategori-slider').scrollLeft -= 120;
      // sideScroll(container,'left',25,100,10);
      container.stop().animate({scrollLeft: "+=100"}, slow);
    };
  }