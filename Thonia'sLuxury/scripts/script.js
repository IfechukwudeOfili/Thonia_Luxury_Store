const rangeInput = document.querySelectorAll(".range-input input");
const mobileRangeInput = document.querySelectorAll(".mobileRange-input input");
const priceInput = document.querySelectorAll(".price-input input");
const mobilePriceInput = document.querySelectorAll(".mobilePrice-input input");
const progress = document.querySelector(".slider .progress");
const mobileProgress = document.querySelector(".mobileSlider .progress");
let priceGap = 1000;

if (rangeInput) {
  priceInput.forEach((input) => {
    input.addEventListener("input", (e) => {
      let minVal = parseInt(priceInput[0].value);
      let maxVal = parseInt(priceInput[1].value);

      if (maxVal - minVal >= priceGap && maxVal < 10000) {
        if (e.target.className === "input-min") {
          rangeInput[0].value = minVal;
          progress.style.left = (minVal / rangeInput[0].max) * 100 + "%";
        } else {
          rangeInput[1].value = minVal;
          progress.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
        }
      }
    });
  });
  mobilePriceInput.forEach((input) => {
    input.addEventListener("input", (e) => {
      let minVal = parseInt(mobilePriceInput[0].value);
      let maxVal = parseInt(mobilePriceInput[1].value);

      if (maxVal - minVal >= priceGap && maxVal < 10000) {
        if (e.target.className === "input-min") {
          mobileRangeInput[0].value = minVal;
          mobileProgress.style.left = (minVal / mobileRangeInput[0].max) * 100 + "%";
        } else {
          mobileRangeInput[1].value = minVal;
          mobileProgress.style.right = 100 - (maxVal / mobileRangeInput[1].max) * 100 + "%";
        }
      }
    });
  });

  rangeInput.forEach((input) => {
    input.addEventListener("input", (e) => {
      let minVal = parseInt(rangeInput[0].value);
      let maxVal = parseInt(rangeInput[1].value);

      if (maxVal - minVal < priceGap) {
        if (e.target.className === "range-min") {
          rangeInput[0].value = maxVal - priceGap;
        } else {
          rangeInput[1].value = minVal + priceGap;
        }
      } else {
        priceInput[0].value = minVal;
        priceInput[1].value = maxVal;
        progress.style.left = (minVal / rangeInput[0].max) * 100 + "%";
        progress.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
      }
    });
  });
  mobileRangeInput.forEach((input) => {
    input.addEventListener("input", (e) => {
      let minVal = parseInt(mobileRangeInput[0].value);
      let maxVal = parseInt(mobileRangeInput[1].value);

      if (maxVal - minVal < priceGap) {
        if (e.target.className === "range-min") {
          mobileRangeInput[0].value = maxVal - priceGap;
        } else {
          mobileRangeInput[1].value = minVal + priceGap;
        }
      } else {
        mobilePriceInput[0].value = minVal;
        mobilePriceInput[1].value = maxVal;
        mobileProgress.style.left = (minVal / mobileRangeInput[0].max) * 100 + "%";
        mobileProgress.style.right = 100 - (maxVal / mobileRangeInput[1].max) * 100 + "%";
      }
    });
  });

  $(document).ready(function () {
    // Handle filter form submission
    $("#filter-form").submit(function (event) {
      event.preventDefault();
      const formData = $(this).serialize();
      const url = "shop.php?" + formData; // Include filter parameters in the URL
      window.location.href = url;
    });
  });

  // Extract the query parameters from the current URL
  const url = new URL(window.location.href);
  const params = new URLSearchParams(url.search);

  // Get the values of minPrice and maxPrice
  const minPrice = params.get("minPrice");
  const maxPrice = params.get("maxPrice");

  // Get the values of productType as an array
  const productTypeArray = params.getAll("productType[]");

  //Get the value of sortBy
  const sortBy = params.get("sortBy");

  console.log("minPrice:", minPrice);
  console.log("maxPrice:", maxPrice);
  console.log("productTypeArray:", productTypeArray);

  //to set the values of the price filter to the current filter being applied
  if (minPrice) {
    priceInput[0].value = minPrice;
    rangeInput[0].value = minPrice;
    progress.style.left = (minPrice / rangeInput[0].max) * 100 + "%";
  }
  if (maxPrice) {
    priceInput[1].value = maxPrice;
    rangeInput[1].value = maxPrice;
    progress.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
  }

  //to check the categories that are currently being displayed

  //get the checkboxes
  let categoryTypes = document.querySelectorAll(".jewelryType input");

  productTypeArray.forEach((currentCategory) => {
    categoryTypes.forEach((category) => {
      if (currentCategory === category.value) {
        category.checked = true;
        return;
      }
    });
  });

  let sortBySelect = document.querySelector("select");
  if (sortBy) {
    sortBySelect.value = sortBy;
  }

  $("#openFilters").click(() => {
    $("#filter-slider").addClass("show");
    $("body")[0].style.overflow = "hidden";
  });
  $("#closeFilters").click(() => {
    $("#filter-slider").removeClass("show");
    $("body")[0].style.overflow = "auto";
  });

  window.addEventListener("resize", () => {
    if (window.screen.width > 950) {
      $("#filter-slider").removeClass("show");
      $("body")[0].style.overflow = "auto";
    }
  });
}

//changing the display in the home page

let topProduct = $(".topProduct");

if (topProduct) {
  let newArrivalBtn = $("#newArrivalBtn");
  let featuredBtn = $("#featuredBtn");
  let onSaleBtn = $("#onSaleBtn");
  let allBtns = $("#homePageProducts ul li");
  allBtns.css("cursor", "pointer");
  let newArrivalBox = $("#newArrival");
  let featuredBox = $("#featured");
  let onSaleBox = $("#sale");
  let allBoxes = $(".dynamicTopProductBox");

  allBoxes.hide();
  newArrivalBox.show();
  newArrivalBtn.addClass("underline");

  newArrivalBtn.click(() => {
    allBtns.removeClass("underline");
    allBoxes.hide();
    newArrivalBox.show();
    newArrivalBtn.addClass("underline");
  });
  featuredBtn.click(() => {
    allBtns.removeClass("underline");
    allBoxes.hide();
    featuredBox.show();
    featuredBtn.addClass("underline");
  });
  onSaleBtn.click(() => {
    allBtns.removeClass("underline");
    allBoxes.hide();
    onSaleBox.show();
    onSaleBtn.addClass("underline");
  });
}
