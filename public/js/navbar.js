// responsive navbar
// break point di 768 pixel

const expandBtn = document.getElementById("expandBtn");

expandBtn.onclick = function() {
    let navbar = document.getElementById("navbar");
    let container = document.getElementById("container");

    if(navbar.className == "navbar") {
        navbar.className += "-responsive";
        container.className += "-responsive";

    } else {
        navbar.className = "navbar";
        container.className = "navbar-container";
    }
}

// scroll

const exploreBtn = document.getElementById("exploreBtn");

exploreBtn.onclick = function() {
    document.getElementById("content1").scrollIntoView({behavior: "smooth", block: "start", inline: "nearest"});
}

//gambar-gambar
// Gak tau caranya yang bener gimana, sementara gini dulu, nanti dibenerin sendiri wkwk
const heroTitle = document.getElementById('heroTitle');
const landingPageBg = document.getElementsByTagName('landingPageBg');
let screenWidth = screen.width;

if (screenWidth > 600) {
    heroTitle.src = "images/hero_title.svg";
}else{
    heroTitle.src = "images/hero_title_small.svg";
};
