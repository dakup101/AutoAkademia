import { bannerSlider } from "./sliders";
import map_init from "./map/map_init";
import opinionSlider from "./swiper-sliders";
import menuScrolled from "./menu/menu-scroll";
import toggleBurgerMenu from "./menu/burger";
import locations from "./locations";
import scroll from "./scroll";
import loadTermsModule from "./terns-module/load-terms";
import courseFixedHandle from "./product/course-fixed";
import courseAddToCart from "./product/course-add-to-cart";
import handleQuantityInput from "./quantity-input";
import handleWooCommerceEvents from "./wc-events";
import { handleAddons } from "./product/course-terms";

import { jsPDF } from "jspdf";
import html2canvas from 'html2canvas';
import { AjaxUrl } from "./helpers";

import plNumToWords from "./plNumToWords";

document.addEventListener("DOMContentLoaded", function (e) {
  map_init();
  bannerSlider();
  opinionSlider();
  menuScrolled();
  toggleBurgerMenu();
  locations();
  scroll();
  // Daniel
  loadTermsModule(1, 1);
  courseFixedHandle();
  courseAddToCart();
  handleQuantityInput();
  handleWooCommerceEvents();
  handleAddons();
  handleCheckout();
  hadnleShop();
  console.log(plNumToWords(5928))
});

async function handleCheckout() {
  const btn = document.querySelector("#start_checkout");
  const chkBtn = document.querySelector('#place_order');
  if (!btn) return;

  btn.addEventListener("click", async (ev) => {
    ev.preventDefault();
    const popup = document.querySelector("#contractPopup");
    popup.classList.add("show");
    await fillContract();
    await makePdf();
    const popupStatus = popup.querySelector(".contract-popup-status");
    popupStatus.innerHTML = "Zapisuję..."
    chkBtn.click();
  })
}

async function fillContract() {
  const dateWrap = document.querySelector(".contract-date"),
    fullnameWrap = document.querySelector(".contract-name-full"),
    nameWrap = document.querySelector(".contract-name"),
    lastnameWrap = document.querySelector(".contract-name-last"),
    peselWrap = document.querySelector(".contract-pesel"),
    ageWrap = document.querySelector(".contract-age"),
    postWrap = document.querySelector(".contract-post"),
    cityWrap = document.querySelector(".contract-city"),
    addrWrap = document.querySelector(".contract-addr"),
    telWrap = document.querySelector(".contract-tel"),
    emailWrap = document.querySelector(".contract-email"),
    priceWrap = document.querySelector(".contract-price"),
    pricewordsWrap = document.querySelector(".contract-price-words")

  dateWrap.innerHTML = formatDate(new Date());
  fullnameWrap.innerHTML = document.querySelector("#billing_first_name").value + " " + document.querySelector("#billing_last_name").value;
  nameWrap.innerHTML = document.querySelector("#billing_first_name").value
  lastnameWrap.innerHTML = document.querySelector("#billing_last_name").value;
  peselWrap.innerHTML = document.querySelector("#pesel").value;
  ageWrap.innerHTML = document.querySelector("#age").value;
  postWrap.innerHTML = document.querySelector("#billing_postcode").value;
  cityWrap.innerHTML = document.querySelector("#billing_city").value;
  addrWrap.innerHTML = document.querySelector("#billing_address_1").value;
  telWrap.innerHTML = document.querySelector("#billing_phone").value;
  emailWrap.innerHTML = document.querySelector("#billing_email").value;
  priceWrap.innerHTML = document.querySelector("#ordarTotalNum").value;
  pricewordsWrap.innerHTML = plNumToWords(parseFloat(document.querySelector("#ordarTotalNum").value));


}

function padTo2Digits(num) {
  return num.toString().padStart(2, '0');
}

function formatDate(date) {
  return [
    padTo2Digits(date.getDate()),
    padTo2Digits(date.getMonth() + 1),
    date.getFullYear(),
  ].join('/');
}

async function makePdf() {
  if (document.querySelector("#testUmowa")) {
    await breakDivIntoPages()

    let contract = document.querySelector("#testUmowa");
    let contractPages = contract.querySelectorAll(".document-page");

    let doc = new jsPDF("p", "mm", "a4", true);
    let width = doc.internal.pageSize.width;
    let height = doc.internal.pageSize.height;

    window.html2canvas = html2canvas;

    console.log(contractPages.length);

    for (let i = 1; i <= contractPages.length; i++) {
      const canvas = await html2canvas(document.querySelector(".document-page-" + i), {
        scale: 2,
        dpi: 300,
      })
      let imgData = canvas.toDataURL("image/png");

      doc.addImage(imgData, "PNG", width * .075, height * .05, width * .85, height * .9);
      if (i != contractPages.length) doc.addPage();

    }


    let blob = doc.output("blob");
    let file = new File([blob], "umowa.pdf", { type: "text/pdf", lastModified: new Date().getTime() });

    let container = new DataTransfer();
    container.items.add(file);

    document.querySelector("#gowno").files = container.files;
    console.log(document.querySelector("#gowno").value)

    await uploadPDF();

  }
}

async function uploadPDF() {
  let input = document.querySelector("#gowno");
  let urlInput = document.querySelector("#file_url");
  let file = input.files[0];
  let data = new FormData();
  data.append("action", "appformupload");
  data.append("appform", file);
  await fetch(AjaxUrl, {
    method: "POST",
    body: data,
    credentials: "same-origin"
  })
    .then(response => response.text())
    .then(text => {
      console.log(text);
      urlInput.value = text;
    })

}

class DivDocument {

  pageWidth;
  pageHeight;
  selector;
  pages;

  constructor(width, selector) {
    this.pageWidth = width;
    this.pageHeight = width * 1.4142;
    this.selector = selector;
    this.pages = this.countPages(selector);
    this.toPages();
  }

  get pages() {
    return this.countPages();
  }


  fullHeight() {
    return document.querySelector(this.selector).scrollHeight;
  }

  toPages(elementSelector = this.selector) {
    console.log("--- Creating document html ---")
    const pages = this.countPages(elementSelector);

    // Return if no pagination needed
    if (pages < 2) return;

    let currentPage = 1, currentChild = 0;
    const main = document.querySelector(elementSelector);
    const newMain = document.createElement("div");
    newMain.id = "contractFormated";
    const mainChildren = main.children;

    console.log(main);
    console.log(main.children);


    for (currentPage; currentPage <= pages; currentPage++) {
      console.log("--- Page: " + currentPage + " ---")
      const thePage = document.createElement("div");
      let currentPageHeight = 0;
      let addElement = true;
      thePage.classList.add("document-page");
      thePage.classList.add("document-page-" + currentPage);
      do {
        if (!mainChildren[currentChild]) {
          console.log("--- No Candidate ---");
          addElement = false;
          break;
        }

        let candidate = mainChildren[currentChild].cloneNode(true);
        let candidateHeight = mainChildren[currentChild].scrollHeight;
        console.log(mainChildren[currentChild]);

        if (candidateHeight > this.pageHeight) {
          console.log("--- Element is to big to fit in page ---");
          console.log(candidate);
          continue;
        }
        if (candidateHeight + currentPageHeight <= this.pageHeight) {
          thePage.appendChild(candidate);
          currentPageHeight += candidateHeight;
          console.log(currentPageHeight + " / " + this.pageHeight);
        }
        else {
          addElement = false;
          let emptySpaceHeight = this.pageHeight - currentPageHeight;
          let emptySpace = document.createElement("div");
          emptySpace.style.height = emptySpaceHeight + "px";
          thePage.appendChild(emptySpace);
        }
        if (currentChild + 1 == mainChildren.length) {
          let emptySpaceHeight = this.pageHeight - currentPageHeight;
          let emptySpace = document.createElement("div");
          emptySpace.style.height = emptySpaceHeight + "px";
          thePage.appendChild(emptySpace);
        }
        currentChild++;
      } while (addElement)
      console.log(thePage.innerHTML);
      newMain.appendChild(thePage);
    }
    main.innerHTML = newMain.innerHTML;
    console.log(newMain.children);
  }

  countPages(elementSelector = this.selector) {
    let pages = 1;
    let currentHeight = this.pageHeight;
    while (currentHeight < document.querySelector(elementSelector).scrollHeight) {
      pages++;
      currentHeight += currentHeight;
    }
    return pages;
  }
}

async function breakDivIntoPages() {
  let document = new DivDocument(1140, "#testUmowa");
  console.log(document.pages);
}


function hadnleShop() {
  const shopNav = document.querySelector(".course-nav");
  if (!shopNav) return;
  const navBtns = shopNav.querySelectorAll("button");

  let activeProds = "course";
  reorderShop(activeProds);

  Array.from(navBtns).forEach(btn => {
    btn.addEventListener("click", (ev) => {
      ev.preventDefault();

      Array.from(navBtns).forEach(el => el.classList.remove("active"));
      btn.classList.add("active");

      activeProds = btn.getAttribute("data-products");
      console.log(activeProds);
      reorderShop(activeProds);
    })
  })
}

function reorderShop(activeProds) {
  console.log(activeProds);
  let prods = document.querySelectorAll(".course-archive-item");
  Array.from(prods).forEach(prod => {
    prod.classList.add("d-none");
  })
  Array.from(prods).forEach(prod => {
    if (prod.classList.contains("item-" + activeProds))
      prod.classList.remove("d-none");
  })
}