function loadNewContent() {
    // Create a new XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    // Configure it to make a GET request to a specific URL
    xhr.open("GET", "newContent.php", true);

    // Define the function to handle the response
    xhr.onload = function () {
        if (xhr.status == 200) {
            // Update the content of the 'contentContainer' div with the response
            document.getElementById("contentContainer").innerHTML = xhr.responseText;
        }
    };

    // Send the request
    xhr.send();
}

