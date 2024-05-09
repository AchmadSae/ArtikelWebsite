document.addEventListener("DOMContentLoaded", (event) => {
  let scrollStep = 0;
  window.addEventListener("scroll", () => {
    const scrollPosition = window.scrollY;
    const imageContainers = document.querySelectorAll("#picture .box > div");
    const mainImg = imageContainers[1].querySelector(".main-img");

    // firstImage.src = base_url + "img/artikel/de-bruyne.jpg";
    // thirdImage.src = base_url + "img/artikel/locker.jpg";
    const mainImgUrl = mainImg.getAttribute("data-main-img");
    if (scrollStep === 0 && scrollPosition > 400) {
      document.querySelector(
        "#picture .box"
      ).innerHTML = `<div class="col-12 col-md-12 col-sm-12"><img src="${base_url}${mainImgUrl}" alt=""></div>`;
    }
  });
});
