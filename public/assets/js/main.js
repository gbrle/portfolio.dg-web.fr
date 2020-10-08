// Burger Menu Action
let menuResponsive = document.getElementById("responsiveMenu")
let burgerMenu = document.getElementById('burgerMenu');
// Function Burger Menu Display
function displayMenu(){
    burgerMenu.classList.add('animate__flip')
    menuResponsive.classList.remove('d-none')
    // Je retire l'effet sur le burger
    setTimeout(function()
        {
            burgerMenu.classList.remove('animate__flip')
        }
        , 1000);
}

//get Image Background
let imageBackground = document.getElementById('imageBackground')

// On click, change color of menu
function changePage(idItemMenu){
    menuResponsive.classList.add('d-none')


    let menuCurrentSection = document.getElementsByClassName('menuCurrentSection')[0]
    let selectedSection = document.getElementById(idItemMenu)
    let currentPage = document.getElementsByClassName('currentPage')[0]
    let selectedPage = document.getElementById(idItemMenu+'Section')

    currentPage.classList.remove('animate__backInLeft')
    currentPage.classList.add('animate__backOutLeft')
    // imageBackground.classList.remove('animate__bounceInLeft')
    // imageBackground.classList.add('animate__shakeX')
    setTimeout(function()
        {

            // I set Current Section for menu
            menuCurrentSection.classList.remove('menuCurrentSection')
            selectedSection.classList.add('menuCurrentSection')


            currentPage.classList.add('d-none')
            currentPage.classList.remove('currentPage')
            currentPage.classList.add('animate__backInLeft')
            currentPage.classList.remove('animate__backOutLeft')


            // I show the Slected Page
            selectedPage.classList.remove('d-none')
            selectedPage.classList.add('currentPage')

            // imageBackground.classList.remove('animate__shakeX')


        }
    , 500);
}