document.addEventListener("DOMContentLoaded", (event) => {
  const titleInput = document.getElementById("inputTitle");
  const slugInput = document.getElementById("inputSlug");

  if (titleInput && slugInput) {
    titleInput.addEventListener("input", function () {
      const title = this.value;
      const slug = title.toLowerCase().replace(/ /g, "-");
      // console.log(slug);
      slugInput.value = slug;
    });
  }

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
