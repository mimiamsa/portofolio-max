<? include('../inc/back-head.php'); ?>

<div class="separator-2"></div>

<button class="btn" id="btn-formulaire1">modifier</button>
<form action="" method="post" class="hidden" id="form1">
    <input type="text"> <input type="submit" value="ok">
</form>

<div class="separator-2"></div>

<button class="btn" id="btn-formulaire2">modifier</button>
<form action="" method="post" class="hidden" id="form2" >
    <textarea name="txt" cols="40" rows="5"></textarea>
    <input type="submit" value="ok">
</form>


<div class="separator-2"></div>

<button class="btn" id="btn-formulaire3">modifier</button>
<form action="" method="post" class="hidden" id="form3" >
    <input type="file"> <input type="submit" value="ok">
</form>

<?php include("../inc/back-footer.php") ?>
