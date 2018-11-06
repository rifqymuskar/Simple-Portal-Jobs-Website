<!DOCTYPE html>
<html>
<head>
	<title>MX 100</title>
	<?=$this->template->css('materialize.min')?>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
	<?=$this->template->css('custom')?>
</head>
<body data-url="<?=site_url()?>">

  <nav>
  	<div class="container">
	    <div class="nav-wrapper">
	      <ul id="nav-mobile" class="right hide-on-med-and-down">
	        <?=$navbar?>
	      </ul>
	    </div>
    </div>
  </nav>

  <div class="container">
	<?=$content?>
  </div>

	<?=$this->template->js('jquery-3.3.1.min')?>
	<?=$this->template->js('materialize.min')?>
	<?=$this->template->js('custom')?>
</body>
</html>