<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Display</title>
    <style>
        
    </style>
</head>
<?= $this->extend('main-view/template'); ?>
<?= $this->section('content'); ?>
<body>
    
<div class="room-container">
    <?php if (!empty($pricings) && is_array($pricings)): ?>
        <?php foreach ($pricings as $pricings): ?>

            <div class="room-card">
                <div class="room-image" style="background-image: url('<?= base_url('uploads/' . $pricings->image) ?>');"></div>
                <div class="room-info">
                    <h3><?php echo $pricings->name ?></h3>
                    <div class="room-price">Rp. <?= number_format($pricings->price, 0, ',', '.') ?></div>
                        <a href="<?= base_url('room/view/' . $pricings->id) ?>" class="room-link">Booked Room <span>→</span></a>

                </div>
                <div class="room-details">
                    <div>
                        <strong>Tipe</strong><br>
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
                    </div>
                    <div>
                        <strong>Luas</strong><br>
                        <?php echo $pricings->area ?>m²
                    </div>
                    <div>
                        <strong>Kapasitas</strong><br>
                        <?php echo $pricings->capacity ?> Orang
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    <?php else: ?>
        <p class="text-center">No rooms found.</p>
    <?php endif; ?>
</div>
<?= $this->endsection('content'); ?>
</body>
</html>
