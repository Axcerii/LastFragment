//Remise du scroll automatiquement

document.addEventListener("DOMContentLoaded", function() {
    var mainZoneCard = document.getElementById("MainZoneCard");
  
    var scrollPosition = localStorage.getItem("Personnages_scrollPosition");
    var timestamp = localStorage.getItem("Personnages_timestamp");
    var currentTime = new Date().getTime();
  
    if (scrollPosition && timestamp && currentTime - timestamp < 600000) { // 600000 ms = 10 minutes
        mainZoneCard.scrollTop = scrollPosition;
    }
  
    function saveScrollPosition() {
        localStorage.setItem("Personnages_scrollPosition", mainZoneCard.scrollTop);
        localStorage.setItem("Personnages_timestamp", new Date().getTime());
    }
  
    mainZoneCard.addEventListener("scroll", saveScrollPosition);
    window.addEventListener("beforeunload", saveScrollPosition);
  });