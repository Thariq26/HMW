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
                <h3 class="page-title mt-5">Add Room Category</h3>
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
    <form method="post" action="<?= base_url('roomcategory/store') ?>" enctype="multipart/form-data">
    <?= csrf_field(); ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="row formtype">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Name Room Category</label>
                            <input class="form-control" id="name" name="name" type="text" value="<?= old('name'); ?>">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="float-left">
                            <a class="btn btn-primary buttonedit mt-4 ml-10" href="<?= base_url('/roomcategory') ?>">Back To Room Category</a>
                        </div>
                        <div class="">
                            <button type="submit" class="btn btn-primary buttonedit mt-4 ml-4">Save</button>
                            <button type="return" class="btn btn-secondary buttonedit mt-4">Cancel</button>
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