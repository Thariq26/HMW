<?= $this->extend('template/app') ?>

<?= $this->section('styles') ?>

<?= $this->endSection()  ?>


<?= $this->section('content') ?>

<div class="content container-fluid">
  <div class="page-header">
    <div class="row align-items-center">
      <div class="col">
        <div class="mt-5">
          <h4 class="card-title float-left mt-2">All Room Category</h4> <a href="<?= base_url()?>roomcategory/create" class="btn btn-primary float-right veiwbutton">Add Room Category</a>
          <?php if(!empty(session()->getFlashdata('number'))) : ?>

<div class="alert alert-success">
    <?php echo session()->getFlashdata('number');?>
</div>
    
<?php endif ?>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <div class="card card-table">
        <div class="card-body booking_card">
          <div class="table-responsive">
            <table class="datatable table table-stripped table table-hover table-center mb-0">
              <thead>
                <tr>
                  <th class="text-center">Nama Category</th>
                  <th class="text-center">Actions</th>
                </tr>
              </thead>
              <tbody>
              <?php if (!empty($roomcategories) && is_array($roomcategories)): ?>
              <?php $nomor=1;
                foreach ($roomcategories as $category) : ?>
                  <td class="text-center"><?= esc($category->name); ?></td>
                  <td class="text-center">
                      <a class="btn btn-sm btn-secondary" href="<?= base_url('roomcategory/edit/'.$category->id) ?>"><i class="fas fa-pencil-alt m-r-5"></i></a>
                      <a class="btn btn-sm btn-danger" href="" data-toggle="modal" data-target="#delete_asset"><i class="fas fa-trash-alt m-r-5"></i></a>
                  </td>
                  </tr>
                  <div id="delete_asset" class="modal fade delete-modal" role="dialog">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-body text-center"> <img src="<?= base_url() ?>/assets/img/sent.png" alt="" width="50" height="46">
                          <h3 class="delete_class">Are you sure want to delete this Asset?</h3>
                          <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                          <a href="<?= base_url('roomcategory/delete/'.$category->id) ?>" class="btn btn-danger">Delete</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
               <?php endforeach ?>
               <?php else: ?>
            <tr>
                <td colspan="6" class="text-center">No Room Category Available</td> <!-- Adjust colspan as needed -->
            </tr>
        <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>


<?= $this->section('scripts') ?>
<?= $this->endSection()  ?>