<?= $this->extend('template/app') ?>

<?= $this->section('styles') ?>

<style>
    .room-container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            font-family: Arial, sans-serif;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .room-image {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .room-description {
            margin-top: 15px;
            color: #666;
            line-height: 1.6;
            font-size: 14px;
        }

        .room-details {
            width: 370px;
            height: 420px;
            margin: 0 left;
            padding: 33px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            text-align :left;
        }

        .room-details h2 {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        .detail-item {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #eaeaea;
        }

        .detail-item:last-child {
            border-bottom: none;
        }

        .detail-label {
            font-weight: bold;
            color: #555;
        }

        .detail-value {
            color: #333;
        }
        .gallery-section {
        margin-top: 20px;
        }
        .gallery-container {
            display: flex;
            flex-wrap: wrap; /* Allows wrapping if there are many images */
            gap: 15px; /* Space between images */
            justify-content: space-between; /* Distribute images evenly across the row */
            width: 98%; /* Make the container full width */
            padding : 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .gallery-item {
            flex: 1 1 30%; /* Each item takes 30% of the row width and wraps if necessary */
            max-width: 30%; /* Limit the width for each image */
        }
        .gallery-item img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        } 
</style>

<?= $this->endSection()  ?>


<?= $this->section('content') ?>

<div class="content container-fluid">
  <div class="page-header">
    <div class="row align-items-center">
      <div class="col-mb-2">
        <div class="mt-5">
                <a href="<?= base_url()?>roompricings" class="btn btn-primary float-left veiwbutton">Back </a>
                
                <?php if (!empty(session()->getFlashdata('number'))) : ?>
                    <div class="alert alert-success">
                        <?php echo session()->getFlashdata('number'); ?>
                    </div>
                <?php endif ?>
        </div>
      </div>
    </div>
  </div>
    <div class="row">
        <div class="room-details">
            <h2><?php echo $pricings->name ?></h2>
            <div class="detail-item">
                <span class="detail-label">Tipe:</span>
                <span class="detail-value"> 
                <?php 
                    $selectedCategoryId = old('roomcategory_id', isset($pricings) ? $pricings->roomcategory_id : null);
                    $found = false; // Flag untuk menandai apakah kategori ditemukan
                                
                    foreach ($roomcategories as $category): 
                        if ($category->id == $selectedCategoryId && !$found): // Cek apakah ID kategori cocok dan belum ditemukan
                            $found = true; // Tandai bahwa kategori ditemukan
                    ?>
                        <option value="<?= esc($category->id); ?>" selected>
                            <?= esc($category->name); ?>
                        </option>
                    <?php 
                        endif; // Akhiri kondisi
                    endforeach; ?>
                </span> 
            </div>
            <div class="detail-item">
                <span class="detail-label">Harga:</span>
                <span class="detail-value">Rp. <?= number_format($pricings->price, 0, ',', '.') ?></span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Luas:</span>
                <span class="detail-value"><?php echo $pricings->area ?>m²</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Kapasitas:</span>
                <span class="detail-value"><?php echo $pricings->capacity ?> Orang</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Sarapan:</span>
                <span class="detail-value"> 
                <?php foreach ($roomfoods as $food): ?>
                    <?php if ($food->id == $pricings->roomfood_id): ?>
                        <?= esc($food->name); ?>
                        <?php break; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
                </span>
            </div>

            <div class="detail-item">
                <span class="detail-label">Cancelation Rules :</span>
                <span class="detail-value"> 
                <?php foreach ($roomcancelationcharges as $cancelcategory): ?>
                    <?php if ($cancelcategory->id == $pricings->roomcancelationcharges_id): ?>
                        <?= esc($cancelcategory->name); ?>
                        <?php break; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
                </span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Smoking:</span>
                <span class="detail-value">
                    <?php echo ($pricings->smoking); ?>
                </span>
            </div>
        </div>
        <div class="room-container">            
            <?php if (!empty($pricings->image)): ?>

                    <img src="<?= base_url('uploads/' . $pricings->image) ?>" alt="Room Image" class="room-image">
                <?php else: ?>
                    <p>No image available</p>
                <?php endif; ?>
            <div class="room-description">
                Lorem ipsum dolor sit amet consectetur adipiscing elit. Esse maiores distinctio porro fugiat similique minus, ex odio mollitia dolorem deleniti expedita dolor quod sunt temporibus exercitationem voluptatem numquam accusantium. Odio et similique accusamus, fugit nihil eveniet reiciendis nisi iste quas.
            </div>
        </div>
        <div class="gallery-section">
            <h4>Gallery</h4>
            <div class="gallery-container">
                <?php if (!empty($pricings->gallery)): ?>
                    <?php foreach (json_decode($pricings->gallery) as $image): ?>
                        <div class="gallery-item">
                            <img src="<?= base_url('uploads/gallery/' . $image) ?>" alt="Gallery Image">
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No images available</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    

<?= $this->endSection() ?>


<?= $this->section('scripts') ?>
<?= $this->endSection()  ?>