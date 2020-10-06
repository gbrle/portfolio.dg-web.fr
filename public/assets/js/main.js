//get Image Background
let imageBackground = document.getElementById('imageBackground')

// On click, change color of menu
function changePage(idItemMenu){
    let menuCurrentSection = document.getElementsByClassName('menuCurrentSection')[0]
    let selectedSection = document.getElementById(idItemMenu)
    let currentPage = document.getElementsByClassName('currentPage')[0]
    let selectedPage = document.getElementById(idItemMenu+'Section')

    currentPage.classList.remove('animate__backInRight')
    currentPage.classList.add('animate__backOutRight')
    imageBackground.classList.remove('animate__bounceInLeft')
    imageBackground.classList.add('animate__shakeX')
    setTimeout(function()
        {

            // I set Current Section for menu
            menuCurrentSection.classList.remove('menuCurrentSection')
            selectedSection.classList.add('menuCurrentSection')


            currentPage.classList.add('d-none')
            currentPage.classList.remove('currentPage')
            currentPage.classList.add('animate__backInRight')
            currentPage.classList.remove('animate__backOutRight')


            // I show the Slected Page
            selectedPage.classList.remove('d-none')
            selectedPage.classList.add('currentPage')

            imageBackground.classList.remove('animate__shakeX')


        }
    , 500);
}