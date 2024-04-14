document.addEventListener("DOMContentLoaded", (event) => {
  let scrollStep = 0;
  window.addEventListener("scroll", () => {
    const scrollPosition = window.scrollY;
    const imageContainers = document.querySelectorAll("#picture .box > div");
    const firstImage = imageContainers[0].querySelector(".img1");
    const thirdImage = imageContainers[2].querySelector(".img3");

    if (scrollStep === 0 && scrollPosition > 300) {
      firstImage.src = base_url + "img/artikel/de-bruyne.jpg";
      thirdImage.src = base_url + "img/artikel/locker.jpg";
      scrollStep = 1;
    } else if (scrollStep === 1 && scrollPosition > 500) {
      document.querySelector("#picture .box").innerHTML =
        '<div class="col-12 col-md-12 col-sm-12"><img src="' +
        base_url +
        'img/artikel/city-logo.jpg" alt=""></div>';
      scrollStep = 2;
    }
  });
});
