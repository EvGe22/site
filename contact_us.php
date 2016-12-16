<!DOCTYPE html>
<html>
<head>
  <style type="text/css">
    #map{
      width: 100%;
      height: 400px;
    }
  </style>
  <title>Contact us</title>
  <link rel="stylesheet" type="text/css" href="assets/css/contact_us.css">
  <link rel="stylesheet" type="text/css" href="assets/css/main.css"> 
  <link href="https://fonts.googleapis.com/css?family=Raleway|Roboto" rel="stylesheet">
  <script src="/assets/js/jquery-3.1.1.js"></script>
</head>
<body>
  <?php include("assets/htmls/header.php"); ?>

  <div class="title">
    <p>Contact us</p>
  </div>

  <div class="contacts-box">
    <div class="send-form item">
      <form enctype="multipart/form-data" method="POST" action="control/contact_us.php">
        <input type="email" name="email" placeholder="email(required)" required>
        <input type="text" name="name" placeholder="your name">
        <textarea placeholder="your message(required)" required></textarea>
        <ul>
          <li>
            <label><input required type="radio" name="boolean1">Apartment keys</label>
            <label><input required type="radio" name="boolean1">Apartment keys</label>
          </li>
          <li>
            <label><input required type="radio" name="boolean1">Apartment keys</label>
            <label><input required type="radio" name="boolean1">No</label>
          </li>
          <li>
            <label><input required type="checkbox" name="boolean2">Yes</label>
          </li>
          <li>
            <div class="file-input-div">
            <!-- <input type="hidden" name="MAX_FILE_SIZE" value="30000" /> -->
            <input required type="file" name="upload" id="upload_hidden"
              style="position: absolute; display: block; overflow: hidden; width: 0; height: 0; border: 0; padding: 0;"onchange="document.getElementById('upload_visible').value = $(this).val().split('\\').pop();;" />
            <input type="text" readonly="1" id="upload_visible" onclick="document.getElementById('upload_hidden').click();" />
            <button id="load-button" onclick="document.getElementById('upload_hidden').click();">File</button>
            </div>
          </li>
        <ul>
        <button>Send</button>
      </form>
    </div>
    <div class="contacts item">
      <p>Email: iliya.strelnikov@yahoo.com</p>
      <p>Phone : 88005553535</p>

    </div>
  </div>

    <?php include("assets/htmls/map.html"); ?>
    <?php include("assets/htmls/footer.html"); ?>
  </body>
</html>