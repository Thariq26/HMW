<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Reservation</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .form-container {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input, select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            width: 100%;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Bookings Form</h2>
    <form action="/bookings/save" method="post">
        <div class="form-group">
            <label for="customer_id">Customer ID</label>
            <input type="number" id="customer_id" name="customer_id" required>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="roomcategory_id">Room Category</label>
                <select class="form-control" id="roomname_id" name="roomname_id" required>
                    <?php 
                    // Ambil roomname_id yang sudah dipilih sebelumnya
                    $selectedRoomnameId = old('id', isset($pricings) ? $pricings->id : null);
                    $found = false; // Flag untuk menandai apakah roomname_id ditemukan

                    // Loop untuk menampilkan pricings berdasarkan roomname_id
                    foreach ($rooms as $rooms): 
                        if ($rooms->roomname_id == $selectedRoomnameId && !$found): // Jika roomname_id pada rooms cocok dengan id di pricings
                            $found = true; // Tandai bahwa roomname_id ditemukan
                    ?>
                        <option value="<?= esc($rooms->id); ?>" selected>
                            <?= esc($pricings->name); ?>
                        </option>
                    <?php 
                        endif; // Akhiri kondisi
                    endforeach; 

                    ?>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="roomcategory_id">Room Category</label>
                <select class="form-control" id="roomname_id" name="roomname_id" required>

                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="total_members">Total Members</label>
            <input type="number" id="total_members" name="total_members" required>
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" id="date" name="date" required>
        </div>
        <div class="form-group">
            <label for="time">Time</label>
            <input type="time" id="time" name="time" required>
        </div>
        <div class="form-group">
            <label for="arival_date">Arrival Date</label>
            <input type="date" id="arival_date" name="arival_date" required>
        </div>
        <div class="form-group">
            <label for="departure_date">Departure Date</label>
            <input type="date" id="departure_date" name="departure_date" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select id="status" name="status" required>
                <option value="confirmed">Confirmed</option>
                <option value="pending">Pending</option>
                <option value="cancelled">Cancelled</option>
            </select>
        </div>
        <button type="submit">Submit</button>
    </form>
</div>

</body>
</html>