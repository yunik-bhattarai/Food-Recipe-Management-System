// This function adds the new ingredient rows
function addIngredientField() {
    console.log("Add More button clicked"); // Check your F12 console for this!
    
    const container = document.getElementById('ingredient-container');
    const wrapper = document.createElement('div');
    
    wrapper.className = 'ingredient-wrapper';
    wrapper.style.marginBottom = '10px';
    wrapper.style.position = 'relative';

    wrapper.innerHTML = `
        <input type="text" name="ingredients[]" class="ing-input" 
               placeholder="Next ingredient..." onkeyup="showSuggestions(this)" autocomplete="off">
        <div class="suggestions"></div>
    `;

    container.appendChild(wrapper);
}

// This function handles the Ajax autocomplete
function showSuggestions(inputElement) {
    let term = inputElement.value;
    let suggestionBox = inputElement.nextElementSibling;

    if (term.length < 2) {
        suggestionBox.innerHTML = "";
        return;
    }

    // Path is relative to the PHP file (add.php), so no ../ needed here
    fetch("ajax_ingredients.php?term=" + term)
        .then(res => res.json())
        .then(data => {
            suggestionBox.innerHTML = ""; 
            data.forEach(item => {
                let div = document.createElement("div");
                div.innerHTML = item;
                div.style.padding = "10px";
                div.style.cursor = "pointer";
                div.onclick = () => {
                    inputElement.value = item;
                    suggestionBox.innerHTML = "";
                };
                suggestionBox.appendChild(div);
            });
        })
        .catch(err => console.error("Ajax Error:", err));
}