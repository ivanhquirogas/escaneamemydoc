Estaba en Regiter Person

<?php
if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {
?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>ERROR!!</strong> USUARIO YA EXISTE!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php
}
?>
<div class="card-header text-center">
  Ingresar Registro Nuevo
</div>
<div class="mb-2">
  <label class="form-label" for="role-list">Rol:</label>
  <input class="form-control" list="tipos-de-rol" id="seleccion-de-rol" name="seleccion-de-rol" onchange="showDiv(this)" />
  <datalist id="tipos-de-rol">
    <?php
    foreach ($roles as $rol) {
    ?>
      <option value=<?php echo $rol->Person_Role ?>></option>
    <?php
    }
    ?>
  </datalist>
</div>