<?php
  // Initialize
  $ans_add = null;
  $ans_sub = null;
  $ans_multi = null;
  $ans_div = null;

  $value_a = isset($_POST['value_a']) ? $_POST['value_a'] : null;
  $value_b = isset($_POST['value_b']) ? $_POST['value_b'] : null;
  
  $calc_add = isset($_POST['add']) ? 'checked' : null;
  $calc_sub = isset($_POST['sub']) ? 'checked' : null;
  $calc_multi = isset($_POST['multi']) ? 'checked' : null;
  $calc_div = isset($_POST['div']) ? 'checked' : null;

  // if (is_null($calc_add)) {
  //   $err_msg = "オプションを選択してください。";
  // }

  if ($calc_add) {
    $ans_add = $value_a + $value_b;
  }
  if ($calc_sub) {
    $ans_sub = $value_a - $value_b;
  }
  if ($calc_multi) {
    $ans_multi = $value_a * $value_b;
  }
  if ($calc_div) {
    if ($value_b == '0') {
      $ans_div = '0で除算はできません。';
    }
    else {
      $ans_div = $value_a / $value_b;
    }
  }
?>

<html>
  <head>
    <title>イケてる電卓</title>
    <link rel="stylesheet" href="./css/bootstrap.css" />
    <link rel="stylesheet" href="./css/calc.css" />
    <script type="text/javascript" src="./js/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="./js/bootstrap.js"></script>
    <script type="text/javascript" src="./js/calc.js"></script>
  </head>
  <body>
    <div class="container">
      <h1>イケてる電卓</h1>
      <form method="POST" action="<?php print($_SERVER['PHP_SELF']) ?>">
        <div class="form-group">
          <label for="value_a">値1：</label>
          <input type="text" name="value_a" id="value_a" class="form-control" value="<?php print $value_a; ?>"/>
        </div>
        <div class="form-group">
          <label for="value_b">値2：</label>
          <input type="text" name="value_b" id="value_b" class="form-control" value="<?php print $value_b; ?>"/>
        </div>
        <div class="form-group">
          <label>オプション</label>
          <div class="row">
            <div class="col-md-2">
              <input type="checkbox" name="add" id="add" value="add" class="toggleButton" <?php print $calc_add; ?>/><label for="add">＋</label>
            </div>
            <div class="col-md-10">
              <input type="text" id="ans_add" name="ans_add" class="form-control" value="<?php print $ans_add; ?>" readonly/>
            </div>
          </div>
          <div class="row">
            <div class="col-md-2">
              <input type="checkbox" name="sub" id="sub" value="sub" class="toggleButton" <?php print $calc_sub; ?>/><label for="sub">－</label>
            </div>
            <div class="col-md-10">
              <input type="text" id="ans_sub" name="ans_sub" class="form-control" value="<?php print $ans_sub; ?>" readonly/>
            </div>
          </div>
          <div class="row">
            <div class="col-md-2">
              <input type="checkbox" name="multi" id="multi" value="multi" class="toggleButton" <?php print $calc_multi; ?>/><label for="multi">×</label>
            </div>
            <div class="col-md-10">
              <input type="text" id="ans_multi" name="ans_multi" class="form-control" value="<?php print $ans_multi ?>" readonly/>
            </div>
          </div>
          <div class="row">
            <div class="col-md-2">
              <input type="checkbox" name="div" id="div" value="div" class="toggleButton" <?php print $calc_div; ?>/><label for="div">÷</label>
            </div>
            <div class="col-md-10">
              <input type="text" id="ans_div" name="ans_div" class="form-control" value="<?php print $ans_div; ?>" readonly/>
            </div>
          </div>
        </div>
        <div class="form-group">
          <input type="submit" value="計算" class="btn btn-primary col-md-12"/>
        </div>
      </form>
    </div>
  </body>
</html>