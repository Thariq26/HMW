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
                <h3 class="page-title mt-5">Add Room pricing</h3>
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
    <form method="post" action="<?= base_url('roompricings/store') ?>" enctype="multipart/form-data">
    <?= csrf_field(); ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="row formtype">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Room Name</label>
                            <input class="form-control" id="name" name="name" type="text" value="<?= old('name'); ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Area</label>
                            <input class="form-control" id="area" name="area" type="text" value="<?= old('area'); ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Price</label>
                            <input class="form-control" id="price" name="price" type="text" value="<?= old('price'); ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Bed Count</label>
                            <select class="form-control" id="capacity" name="capacity">
                                <?php for ($i = 1; $i <= 10; $i++) : ?>
                                    <option value="<?= $i ?>" <?= old('bedcount') == $i ? 'selected' : '' ?>><?= $i ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="roomcategory_id">Room Category</label>
                            <select class="form-control" id="roomcategory_id" name="roomcategory_id" required>
                                <option>Select</option>
                                <?php foreach ($roomcategories as $pricings): ?>
                                    <option value="<?= esc($pricings->id); ?>"><?= esc($pricings->name); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="roomfood_id">Food Category</label>
                            <select class="form-control" id="roomfood_id" name="roomfood_id" required>
                            <option>Select</option>
                                <?php foreach ($roomfoods as $food): ?>
                                    <option value="<?= esc($food->id); ?>"><?= esc($food->name); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="roomcancelationcharges_id">Cancel Category</label>
                            <select class="form-control" id="roomcancelationcharges_id" name="roomcancelationcharges_id" required>
                            <option>Select</option>
                                <?php foreach ($roomcancelationcharges as $cancelcategory): ?>
                                    <option value="<?= esc($cancelcategory->id); ?>"><?= esc($cancelcategory->name); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="smoking">Smoking</label>
                            <select class="form-control" id="smoking" name="smoking" required>
                                <option value="">Select</option> <!-- Add a default empty option -->
                                <option value="No Smoking" <?= old('smoking') == 'No Smoking' ? 'selected' : '' ?>>No Smoking</option>
                                <option value="Smoking" <?= old('smoking') == 'Smoking' ? 'selected' : '' ?>>Smoking</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Image Room</label>
                            <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Room Gallery</label>
                            <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" id="gallery" name="gallery[]" multiple>
                                <label class="custom-file-label" for="gallery">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                            <div class="d-flex justify-content-end"> <!-- Flexbox to align buttons to the right -->
                            <a class="btn btn-secondary buttonedit ml-2" href="<?= base_url('roompricings') ?>">Cancel</a>
                            <button type="submit" class="btn btn-primary buttonedit ml-2">Save</button>
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
    document.addEventListener('DOMContentLoaded', function () {
    const fileInput = document.getElementById('gallery');
    const fileLabel = document.querySelector('label[for="gallery"]');

    fileInput.addEventListener('change', function () {
        const fileNames = Array.from(fileInput.files).map(file => file.name);
        fileLabel.textContent = fileNames.length > 0 ? fileNames.join(', ') : 'Choose files';
    });
});
</script>
<?= $this->endSection() ?>