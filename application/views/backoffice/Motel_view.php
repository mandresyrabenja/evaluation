<hr>
<ul class="nav justify-content-center" id="crud_title">
  <li class="nav-item">
        <a class="nav-link h4" href="<?php echo site_url('motel');?>">Hôtels</a>
  </li>
</ul>
<hr>
<div class="container">
        <form method="post" name="createMotel" action="<?php echo base_url().'index.php/Motel/create';?>">
        <div class="row">
            <legend style="text-align: center">Inserer un hôtel</legend>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Nom</label>
                    <input type="text" name="name" value="<?php echo set_value('name');?>" class="form-control" required>
                    <?php echo form_error('name');?>
                </div>
                <div class="form-group">
                    <label>Téléphone</label>
                    <small id="num" class="text-muted">Numero sans +261</small>
                    <input type="number" name="phone" value="<?php echo set_value('phone');?>" class="form-control" aria-describedby="num" required>
                    <?php echo form_error('phone');?>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="<?php echo set_value('email');?>" class="form-control" required>
                    <?php echo form_error('email');?>                
                </div>
                <div class="form-group">
                    <label>Compte bancaire</label>
                    <input type="number" name="bank_account" value="<?php echo set_value('bank_account');?>" class="form-control" required>
                    <?php echo form_error('bank_account');?>
                </div>
                <div class="form-group">
                    <label>Mot de passe</label>
                    <input type="password" name="password" value="<?php echo set_value('password');?>" class="form-control" required>
                    <?php echo form_error('password');?>
                </div>
                <div class="form-group">
                    <label>Location</label>
                    <input type="text" name="location" value="<?php echo set_value('location');?>" class="form-control" required>
                    <?php echo form_error('location');?>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Créer</button>
                    <a href="<?php echo site_url('motel'); ?>" class="btn btn-info">Annuler</a>
                </div>
            </form>
</div>