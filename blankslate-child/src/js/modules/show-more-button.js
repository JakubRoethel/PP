export default function showMoreButtonService() { 
    var buttons = document.getElementsByClassName("button_show_more");

  for (var i = 0; i < buttons.length; i++) {
    var button = buttons[i];
    var moreDescription = button.closest(".show-more-section").querySelector(".more_description");
    var originalText = moreDescription.textContent.trim();
    var buttonText = button.textContent.trim();

    button.addEventListener("click", function() {
      if (moreDescription.style.display === "block") {
        moreDescription.classList.add("hide-animation");
        moreDescription.classList.remove("show-animation");
        setTimeout(function() {
          moreDescription.style.display = "none";
          moreDescription.classList.remove("hide-animation");
          button.textContent = originalText;
          var section = button.closest(".show-more-section");
          section.scrollIntoView({ behavior: "smooth" });
        }, 300);
      } else {
        moreDescription.style.display = "block";
        moreDescription.classList.add("show-animation");
        moreDescription.classList.remove("hide-animation");
        button.textContent = "Zwiń";
        originalText = button.getAttribute("data-original-text");
      }
    });
  }
};