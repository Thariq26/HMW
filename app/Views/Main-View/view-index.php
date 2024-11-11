<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


</head>
<body>
<?= $this->extend('main-view/template'); ?>
<?= $this->section('content'); ?>

    <div class="container">
        <div class="background" style="background-image: url('<?= base_url('uploads/gallery/product-04.jpg') ?>');"></div>
        <div class="content">
            <h1 class="title">Welcome to 5 <i class="fa fa-star"></i> Hotel</h1>
            <p>A Best Place to Stay</p>
            <div class="form-container">
                <form style="display: flex; align-items: center;">
                    <div>
                        <label for="room-type">Tipe Kamar</label>
                        <input type="text" id="room-type" placeholder="Tipe Kamar">
                    </div>
                    <div>
                        <label for="check-in">Check In</label>
                        <input type="date" id="check-in">
                    </div>
                    <div>
                        <label for="check-out">Check Out</label>
                        <input type="date" id="check-out">
                    </div>
                    <button type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>

    <div class="section-title">
        <h2>Rooms & Suites</h2>
        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
    </div>

    <div class="rooms-container">
        <div class="room-card">
            <img src="<?= base_url('uploads/gallery/8183878_2.jpg') ?>" alt="Single Room">
            <div class="room-info">
                <h3>Single Room</h3>
                <p>Rp. 250.000 /  Night</p>
            </div>
        </div>
        
        <div class="room-card">
            <img src="<?= base_url('uploads/gallery/8183873.jpg') ?>" alt="Family Room">
            <div class="room-info">
                <h3>Double Room</h3>
                <p>Rp. 575.000 /  Night</p>
            </div>
        </div>
        
        <div class="room-card">
            <img src="<?= base_url('uploads/gallery/8183871.jpg') ?>" alt="Presidential Room">
            <div class="room-info">
                <h3>Quad Room</h3>
                <p>Rp. 825.000 /  Night</p>
            </div>
        </div>
        <div class="room-card">
            <img src="<?= base_url('uploads/gallery/2690978.jpg') ?>" alt="Presidential Room">
            <div class="room-info">
                <h3>King Room</h3>
                <p>Rp. 1.500.000 /  Night</p>
            </div>
        </div>
        <div class="room-card">
            <img src="<?= base_url('uploads/gallery/6352036.jpg') ?>" alt="Presidential Room">
            <div class="room-info">
                <h3>Presidential Room</h3>
                <p>Rp. 4.500.000 /  Night</p>
            </div>
        </div>
        <div class="room-card">
            <img src="<?= base_url('uploads/gallery/5655394.jpg') ?>" alt="Presidential Room">
            <div class="room-info">
                <h3>Villa Room</h3>
                <p>Rp. 12.300.000 /  Night</p>
            </div>
        </div>

    </div>
    

<?= $this->endsection('content'); ?>

</body>
</html>
