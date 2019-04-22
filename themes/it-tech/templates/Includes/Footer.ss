
<!-- W3.CSS Container -->
<div class="w3-light-grey w3-container w3-padding-32" style="margin-top:75px;padding-right:58px">
    <p class="w3-right">
        &copy; 2018-$Now.Year by <b>$SiteConfig.Title $SiteConfig.Tagline</b>.
        Developed by
            <a href="http://www.syedfakharabbas.com" title="Syed" target="_blank" class="w3-hover-opacity">www.syedfakharabbas.com</a></p></div>

<script>
// Script to open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}

// Modal Image Gallery
function onClick(element) {
console.log(element.src);

console.log(document.getElementById("img01").src);
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}
</script>