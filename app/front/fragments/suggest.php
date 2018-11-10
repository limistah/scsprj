<div class="row full-page">
  <div class="masthead full-page">
    <img src="<?= get_image('fallback.jpg') ?>" class="img-fluid" alt="">
  </div>


  <div class="col-sm-12 page-content suggest">
    <div class="container">
      <div class="col-12 text-center mt-3" style="color: #fefefe;">
        <h2 style="text-decoration: underline;">Select the subjects you have credit in</h2>
      </div>

      <div class="col-sm-12 mt-4">
        <form class="form" id="suggestForm" action="" method="post">
          <div class="row ">
            <div class="form-check col-3">
              <label class="form-check-label">
                <input type="checkbox" name="subjects[]" value="english" class="form-check-input">
                English Language
              </label>
            </div>
            <div class="form-check col-3">
              <label class="form-check-label">
                <input type="checkbox" name="subjects[]" value="mathematics" class="form-check-input">
                Mathematics
              </label>
            </div>
            <div class="form-check col-3">
              <label class="form-check-label">
                <input type="checkbox" value="biology" name="subjects[]" class="form-check-input">
                Biology
              </label>
            </div>
            <div class="form-check col-3">
              <label class="form-check-label">
                <input type="checkbox" name="subjects[]" value="agricultural_science" class="form-check-input">
                Agricultural Science
              </label>
            </div>
          </div>
          <div class="row">
            <div class="form-check col-3">
              <label class="form-check-label">
                <input type="checkbox" name="subjects[]" value="physics" class="form-check-input">
                Physics
              </label>
            </div>
            <div class="form-check col-3">
              <label class="form-check-label">
                <input type="checkbox" name="subjects[]" value="chemistry" class="form-check-input">
                Chemistry
              </label>
            </div>
            <div class="form-check col-3">
              <label class="form-check-label">
                <input type="checkbox" value="commerce" name="subjects[]" class="form-check-input">
                Commerce
              </label>
            </div>
            <div class="form-check col-3">
              <label class="form-check-label">
                <input type="checkbox" value="accounting" name="subjects[]" class="form-check-input">
                Account
              </label>
            </div>
          </div>
          <div class="row">
            <div class="form-check col-3">
              <label class="form-check-label">
                <input type="checkbox" value="economics" name="subjects[]" class="form-check-input">
                Economics
              </label>
            </div>
            <div class="form-check col-3">
              <label class="form-check-label">
                <input type="checkbox" value="government" name="subjects[]" class="form-check-input">
                Government
              </label>
            </div>
            <div class="form-check col-3">
              <label class="form-check-label">
                <input type="checkbox" name="subjects[]" value="literature_in_english" class="form-check-input">
                Literature in English
              </label>
            </div>
            <div class="form-check col-3">
              <label class="form-check-label">
                <input type="checkbox" name="subjects[]" value="IRS/CRS" class="form-check-input">
                IRS/CRS
              </label>
            </div>
          </div>
          <div class="row my-4">
            <div class="col-12 text-center">
              <button type="submit" class="btn btn-primary btn-lg" name="suggest">Suggest For Me</button>
            </div>
          </div>
        </form>
      </div>

      <div class="col-sm-12 result container hidden">

      </div>
    </div>



  </div>
</div>
