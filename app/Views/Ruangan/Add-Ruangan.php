<?= $this->extend('template/app') ?>

<?= $this->section('styles') ?>
<style>

</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="content container-fluid">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title mt-5">Add Room</h3>
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
    <form method="post" action="<?= base_url('ruangan/store') ?>" enctype="multipart/form-data">
    <?= csrf_field(); ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="row formtype">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Room Number</label>
                            <input class="form-control" id="number" name="number" type="text" value="<?= old('number'); ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="roomcategory_id">Room Category</label>
                            <select class="form-control" id="roomname_id" name="roomname_id" required>
                                <option>Select</option>
                                <?php foreach ($pricings as $pricings): ?>
                                    <option value="<?= esc($pricings->id); ?>"><?= esc($pricings->name); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option>Select</option>
                                <option value="Unavailable" <?= old('status') == 'Unavailable' ? 'selected' : '' ?>>Unavailable</option>
                                <option value="Available" <?= old('status') == 'Available' ? 'selected' : '' ?>>Available</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="">
                            <button type="submit" class="btn btn-primary buttonedit mt-4 ml-4">Save</button>
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