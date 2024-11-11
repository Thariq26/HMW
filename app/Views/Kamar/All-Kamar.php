<?= $this->extend('template/app') ?>

<?= $this->section('styles') ?>
<style>

</style>
<?= $this->endSection()  ?>


<?= $this->section('content') ?>
<div class="content container-fluid">
  <div class="page-header">
    <div class="row align-items-center">
      <div class="col">
        <div class="mt-5">
          <h4 class="card-title float-left mt-2">Rooms Pricing</h4>
          <?php if(!empty(session()->getFlashdata('number'))) : ?>

            <div class="alert alert-success">
                <?php echo session()->getFlashdata('number');?>
            </div>
                      
            <?php endif ?>
          <a href="<?= base_url() ?>roompricings/create" class="btn btn-primary float-right veiwbutton">Add Rooms Pricing</a>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <section class="pricing py-5">
        <div class="container">
          <div class="row mt-5">
          <?php if (!empty($pricings) && is_array($pricings)): ?>
              <?php $nomor=1;
                foreach ($pricings as $pricings) : ?>
            <div class="col-lg-3">
              <div class="card mb-5 mb-lg-5">
                <div class="card-body">
                  <h5 class="card-title text-muted text-uppercase text-center"><?php echo $pricings->name ?></h5>
                  <p class="text-muted text-uppercase text-center"><?php echo $pricings->category_name ?></p>
                  <h6 class="card-price text-center mt-3">Rp. <?= number_format($pricings->price, 0, ',', '.') ?><span class="period"></span></h6>
                  <hr />
                  <a href="<?= base_url('roompricings/view/'.$pricings->id)?>" class="btn btn-secondary btn-block text-uppercase"><i class="fas fa fa-eye m-r-5"></i>View</a>
                  <a href="<?= base_url('roompricings/edit/'.$pricings->id)?>" class="btn btn-primary btn-block text-uppercase"><i class="fas fa-pencil-alt m-r-5"></i>Edit</a>
                  <a href="<?= base_url('roompricings/delete/'.$pricings->id)?>" class="btn btn-danger btn-block text-uppercase"><i class="fas fa-trash-alt m-r-5"></i>Delete</a>
                </div>
              </div>
            </div>
            <?php endforeach ?>
               <?php else: ?>
            <tr>
                <td colspan="6" class="text-center">No rooms found.</td> <!-- Adjust colspan as needed -->
            </tr>
        <?php endif; ?>
      </section>
    </div>
  </div>
</div>
<?= $this->endSection() ?>


<?= $this->section('scripts') ?>
<script>
  console.log("testing");
</script>
<?= $this->endSection()  ?>