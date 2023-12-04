document.getElementById("close").addEventListener("click", clearInput);



function clearInput() {
    var inputElement = document.getElementById("searchbar");
    inputElement.value = ""; 
}

const desc = document.getElementById("desc");
const wage = document.getElementById("wage");
const place = document.getElementById("place");
const post_date = document.getElementById("post_date");
const btn_more = document.querySelector("button .more").addEventListener("click", displayMore);

if (desc.textContent.length > 200) {
    fullText = desc.textContent;
    shortText = desc.textContent.slice(0, 197) + "...";
    desc.innerHTML = shortText;
}

function displayMore () {
    wage.style.visibility = "visible";
    place.style.visibility = "visible";
    post_date.style.visibility = "visible";
    desc.innerHTML = fullText;
}

function display(e) {
    e.preventDefault();
    console.log(e.target);
    console.log(e.target.parentNode.parentNode.getElementsByClassName("job-card-body")[0].classList.contains("full"));
    if (e.target.parentNode.parentNode.getElementsByClassName("job-card-body")[0].classList.contains("full")) {
        e.target.parentNode.parentNode.getElementsByClassName("job-card-body")[0].classList.remove("full");
    } else {
        e.target.parentNode.parentNode.getElementsByClassName("job-card-body")[0].classList.add("full");
    }
}



