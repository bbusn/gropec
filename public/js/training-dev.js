window.addEventListener('load', function() {
    const time = document.querySelector('#time');
    const sport = document.querySelector('#sport');
    const timeIndicator = document.querySelector('#time-indicator');
    time.addEventListener('input', function() {
        timeIndicator.innerHTML = time.value + ' <span>min</span>';
    });
    const dropdown = document.getElementById("sportsDropdown");
    const selectedOption = dropdown.querySelector(".selected-option");
    const options = dropdown.querySelectorAll(".option");

    selectedOption.addEventListener("click", function() {
        const dropdownOptions = dropdown.querySelector(".dropdown-options");
        dropdownOptions.style.display = dropdownOptions.style.display === "block" ? "none" : "block";
    });
    document.addEventListener("click", function(event) {
        if (event.target === selectedOption || event.target === dropdown) return;
        dropdown.querySelector(".dropdown-options").style.display = "none";
    });
    options.forEach(option => {
        option.addEventListener("click", function() {
            const value = option.getAttribute("data-value");
            selectedOption.textContent = option.textContent;
            sport.value = value;
        });
    });

});