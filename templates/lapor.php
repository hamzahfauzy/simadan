<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Laporan Pengaduan Masyarakat</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?= routeTo('assets/img/main-logo.png')?>" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="<?=routeTo('assets/js/plugin/webfont/webfont.min.js')?>"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?=routeTo('assets/css/fonts.min.css')?>']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="<?=routeTo('assets/css/bootstrap.min.css')?>">
	<link rel="stylesheet" href="<?=routeTo('assets/css/atlantis.min.css')?>">
</head>
<body style="min-height:auto;">
	<div class="container">
        <div class="row mt-4">
            <div class="col-sm-12 col-md-6 col-lg-4 mx-auto">
                <?php if($success_msg): ?>
                <div class="alert alert-success"><?=$success_msg?></div>
                <?php endif ?>

                <?php if($error_msg): ?>
                <div class="alert alert-danger"><?=$error_msg?></div>
                <?php endif ?>
                <div class="card full-height">
                    <div class="card-body">
                        <center>
                            <img src="<?=routeTo('assets/img/main-logo.png')?>" width="150px" height="100px" alt="logo" style="object-fit:contain;">
                        </center>
                        <div class="card-title text-center">Formulir Pengaduan</div>

                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <?php 
                                foreach($fields as $key => $field): 
                                    $label = $field;
                                    $type  = "text";
                                    if(is_array($field))
                                    {
                                        $field_data = $field;
                                        $field = $key;
                                        $label = $field_data['label'];
                                        if(isset($field_data['type']))
                                        $type  = $field_data['type'];
                                    }
                                    $label = _ucwords($label);
                                ?>
                                <label for=""><?=$label?></label>
                                <?php if($type == 'file'): ?>
                                <?= Form::input($type, $field, ['class'=>"form-control","placeholder"=>$label,"value"=>$old[$field]??'']) ?>
                                <?php else: ?>
                                <?= Form::input($type, "lapor[".$field."]", ['class'=>"form-control","placeholder"=>$label,"value"=>$old[$field]??'']) ?>
                                <?php endif ?>
                                <?php endforeach ?>
                                <p></p>
                                <button class="btn btn-primary btn-block btn-round">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>