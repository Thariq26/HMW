<?= $this->extend('template/app') ?>

<?= $this->section('styles') ?>
<style>
    /* Tambahkan gaya CSS jika diperlukan */
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="content container-fluid">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title mt-5">Edit Room</h3>
            </div>
        </div>
        <?php if (!empty(session()->getFlashdata('error'))) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h4>Periksa Entrian Form</h4>
                <hr />
                <?= session()->getFlashdata('error'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
    </div>
    <form method="post" action="<?= base_url('ruangan/update/' . $rooms->id) ?>" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="row formtype">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Room Number</label>
                            <input class="form-control" id="number" name="number" type="text" value="<?= old('number', $rooms->number); ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="roomname_id">Room Category</label>
                            <select class="form-control" id="roomname_id" name="roomname_id" required>
                                <option value="" disabled>Select</option>
                                <?php foreach ($pricings as $pricing): ?>
                                    <option value="<?= esc($pricing->id); ?>" <?= (old('roomname_id', $rooms->roomname_id) == $pricing->id) ? 'selected' : ''; ?>>
                                        <?= esc($pricing->name); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="status"> Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="" disabled><?= esc($rooms->status); ?></option>
                                <option value="Unavailable" <?= (old('status', $rooms->status) == 'Unavailable') ? 'selected' : ''; ?>>Unavailable</option>
                                <option value="Available" <?= (old('status', $rooms->status) == 'Available') ? 'selected' : ''; ?>>Available</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="">
                            <button type="submit" class="btn btn-primary buttonedit mt-4 ml-4">Update</button>
                            <a class="btn btn-secondary buttonedit mt-4" href="<?= base_url('/Ruangan') ?>">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const fileInput = document.getElementById('image');
        const fileLabel = document.querySelector('label[for="image"]');

        fileInput.addEventListener('change', function () {
            const fileName = fileInput.files[0] ? fileInput.files[0].name : 'Choose file';
            fileLabel.textContent = fileName;
        });
    });

</script>
<?= $this->endSection() ?>