<!-- Designers -->
  <div class="w3-container" id="designers">
    $Content
  </div>

  <!-- The Team -->


  <div class="w3-row-padding w3-grayscale">
    <% loop $Designers %>
        <div class="w3-col m4 w3-margin-bottom">
          <div class="w3-light-grey">
            <img src="$Photo.AbsoluteLink" alt="$Name" style="width:100%">
            <div class="w3-container">
              <h3>$Name</h3>
              <p class="w3-opacity">$Designation</p>
              <p>$Bio</p>
            </div>
          </div>
        </div>
    <% end_loop %>
  </div>