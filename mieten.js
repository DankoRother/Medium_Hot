function show_hide() {
    var x = document.getElementById("filter2");
    var chevronIcon = document.getElementById("chevron");

    if (x && chevronIcon) {
        if (x.style.display === "none") {
            x.style.display = "block";
            chevronIcon.classList.remove('fa-chevron-down');
            chevronIcon.classList.add('fa-chevron-up');
        } else {
            x.style.display = "none";
            chevronIcon.classList.remove('fa-chevron-up');
            chevronIcon.classList.add('fa-chevron-down');
        }
    }
}
