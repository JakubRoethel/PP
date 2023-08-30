export default function dropDownSearch() { 

    // Znajdź wszystkie elementy o klasie .drop-down
    let dropDowns = document.querySelectorAll(".drop-down");

    // Iteruj przez każdy element .drop-down
    dropDowns.forEach(function(dropDown) {
        let labelContainer = dropDown.querySelector(".label-container");
        let ulElement = dropDown.querySelector(".type");

        // Dodaj nasłuchiwanie na kliknięcie na labelContainer
        labelContainer.addEventListener("click", function() {
            // Dodaj lub usuń klasę "show" w zależności od obecności klasy
            ulElement.classList.toggle("show");
        });
    });

};