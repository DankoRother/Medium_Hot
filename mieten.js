var isHidden = true;

function show_hide() {
  var divToToggle = document.getElementById('hide');
  var toggleButton = document.getElementById('toggleButton');

  // Deaktiviere den Button während der Ausführung
  toggleButton.disabled = true;

  // Ändere die Sichtbarkeit des divs
  divToToggle.style.display = isHidden ? 'block' : 'none';
  isHidden = !isHidden;

  // Aktiviere den Button nach Abschluss der Funktion
  toggleButton.disabled = false;
}