let uploadButton = document.querySelector("#upload-button");
let chosenImage = document.getElementById("chosen-image");
let fileName = document.getElementById("file-name");

if (uploadButton != null) {
    uploadButton.onchange = ()=>{
    let reader = new FileReader();
    reader.readAsDataURL(uploadButton.files[0]);
    console.log(uploadButton.files[0]);
    reader.onload = ()=>{
        chosenImage.setAttribute("src", reader.result)
    }
    fileName.textContent = uploadButton.files[0].name;
}
}



//change Image

let changeImgBtn = document.querySelector("#changeimgbtn");

if (changeImgBtn != null) {
    changeImgBtn.addEventListener("click", (e)=>{
    e.preventDefault()
    document.querySelector("#productImages").style.display= "block";
})
}



//submitwhenproductcategory is changed

let url = window.location.href
let get = url.split("?")[1]

if(get){
    let value = get.split("=")[1]
    let select = document.querySelector("#category")
    if(value=="ring" || value=="earring" || value=="necklace" || value=="bracelet"){
        select.value=value;
    }else{
        select.value = ""
    }
}

let adminproductSearch = document.querySelector("#adminProductSearchInput");

if (adminproductSearch) {
    let alreadyDisplayedProducts = document.querySelectorAll(".adminproduct")
    //console.log(alreadyDisplayedProducts[0].children[1]);
    //alreadyDisplayedProducts[0].style.display = "none";
    
    document.addEventListener("input", ()=>{
        let text = adminproductSearch.value;
        let pattern = new RegExp(text, "i");

        alreadyDisplayedProducts.forEach(product => {
            if(pattern.test(product.children[1].textContent)){
                product.style.display = "block";
            }else{
                product.style.display = "none";
            }
        });
    })
}
  
