 <!-- Main content -->
 <section class="content">
     <div class="container-fluid">
         <!-- Small boxes (Stat box) -->
         <div class="callout callout-info">
             <h5><i class="fas fa-info"></i> <b>Update Data User</b></h5>
             <div class="row">
                 <div class="col-lg">
                     <?= form_open_multipart('role/editusergo/' . $user['id']); ?>

                     <div class="form-group row">
                         <label for="username" class="col-sm-2 col-form-label">Username </label>
                         <div class="col-sm-10">
                             <input type="text" class="form-control" id="username" name="username" value="<?= $user['username']; ?>" readonly>
                         </div>
                     </div>

                     <div class="form-group row">
                         <label for="name" class="col-sm-2 col-form-label">Nama </label>
                         <div class="col-sm-10">
                             <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
                         </div>
                     </div>

                     <div class="form-group row">
                         <label for="email" class="col-sm-2 col-form-label">Email </label>
                         <div class="col-sm-10">
                             <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>">
                         </div>
                     </div>

                     <div class="form-group row">
                         <label for="role_id" class="col-sm-2 col-form-label">Role </label>
                         <div class="col-sm-2">
                             <input type="text" class="form-control" id="role_id" name="role_id" value="<?= $user['role_id']; ?>">
                         </div>
                     </div>

                     <div class="form-group row">
                         <label for="is_active" class="col-sm-2 col-form-label">Status </label>
                         <div class="col-sm-2">
                             <input type="text" class="form-control" id="is_active" name="is_active" value="<?= $user['is_active']; ?>">
                         </div>
                     </div>

                     <div class="form-group row">
                         <label for="jabatan" class="col-sm-2 col-form-label">Jabatan </label>
                         <div class="col-sm-10">
                             <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= $user['jabatan']; ?>">
                         </div>
                     </div>

                     <div class="form-group row">
                         <label for="unit" class="col-sm-2 col-form-label">Unit </label>
                         <div class="col-sm-10">
                             <input type="text" class="form-control" id="unit" name="unit" value="<?= $user['unit']; ?>">
                         </div>
                     </div>

                     <div class="form-group row justify-content-end">
                         <div class="col-sm-10">
                             <button type="submit" class="btn btn-primary">Edit</button>
                         </div>
                     </div>
                     </form>
                 </div>
             </div>