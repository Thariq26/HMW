<?= $this->extend('template/app') ?>

<?= $this->section('styles') ?>

<?= $this->endSection()  ?>


<?= $this->section('content') ?>

<div class="content container-fluid">
  <div class="page-header">
    <div class="row align-items-center">
      <div class="col">
        <div class="mt-5">
          <h4 class="card-title float-left mt-2">All Rooms</h4> <a href="<?= base_url()?>ruangan/create" class="btn btn-primary float-right veiwbutton">Add Room</a>
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
                  <th class="text-center">Room Number</th>
                  <th class="text-center">Room Type</th>
                  <th class="text-center">Status</th>
                  <th class="text-center">Actions</th>
                </tr>
              </thead>
              <tbody>
              <?php if (!empty($rooms) && is_array($rooms)): ?>
              <?php $nomor=1;
                foreach ($rooms as $room) : ?>

                  <td class="text-center"><?= esc($room->number); ?></td>
                  <td class="text-center"><?= esc($room->pricings_name); ?></td>
                  <td class="text-center "><?= esc($room->status); ?></td>
                  <td class="text-center">
                      <a class="btn btn-sm btn-secondary" href="<?= base_url('ruangan/edit/'.$room->id) ?>"><i class="fas fa-pencil-alt m-r-5"></i></a>
                      <a class="btn btn-sm btn-danger" href="<?= base_url('ruangan/delete/'.$room->id) ?>"><i class="fas fa-trash-alt m-r-5"></i></a>
                      <?php if ($room->status === 'Available'): ?>
                          <!-- Jika statusnya 'Available', tampilkan tombol untuk mengubah menjadi 'Unavailable' -->
                          <a href="<?= base_url('ruangan/change_status/' . $room->id . '/Unavailable') ?>" class="btn btn-sm btn-warning"><i class="fas fa fa-times m-r-5"></i>Set Unavailable</a>
                      <?php else: ?>
                          <!-- Jika statusnya bukan 'Available', tampilkan tombol untuk mengubah menjadi 'Available' -->
                          <a href="<?= base_url('ruangan/change_status/' . $room->id . '/Available') ?>" class="btn btn-sm btn-success">Set Available</a>
                      <?php endif; ?>
                  </td>
                  </tr>
               <?php endforeach ?>
               <?php else: ?>
            <tr>
                <td colspan="6" class="text-center">No rooms found.</td> <!-- Adjust colspan as needed -->
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
<script>
$(document).ready(function() {
    $('#status-button').click(function() {
        var kamarId = $(this).data('id');
        var currentStatus = $(this).text().trim();

        $.ajax({
            url: '<?= base_url('kamar/updateStatus') ?>',
            type: 'POST',
            data: { id_kamar: kamarId, status: currentStatus },
            success: function(response) {
                if (response.success) {
                    // Update tampilan tombol
                    var button = $('#status-button');
                    if (currentStatus === 'Available') {
                        button.html('<i class="fas fa-times"></i> Unavailable');
                    } else {
                        button.html('<i class="fas fa-check"></i> Available');
                    }
                } else {
                    alert('Terjadi kesalahan: ' + response.message);
                }
            }
        });
    });
});

</script>


<?= $this->section('scripts') ?>
<?= $this->endSection()  ?>