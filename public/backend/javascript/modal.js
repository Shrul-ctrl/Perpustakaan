// Fungsi untuk menampilkan informasi di tabel pesanan
function tampilkanInfo(menu, harga) {
    var jumlah = 1; // Default jumlah saat pertama kali menambahkan ke pesanan
    var total = harga * jumlah;

    // Periksa apakah menu sudah ada di dalam tabel pesanan
    var table = document.getElementById("orderStatusTable");
    var rows = table.getElementsByTagName("tr");
    var menuExists = false;

    // Mulai dari baris kedua karena baris pertama adalah header
    for (var i = 1; i < rows.length; i++) {
        var row = rows[i];
        var menuCell = row.cells[1]; // Kolom kedua (index 1) berisi teks menu
        var existingMenu = menuCell.innerText.trim(); // Ambil teks menu dan hapus spasi di awal dan akhir

        // Jika menu sudah ada, atur flag dan keluar dari loop
        if (existingMenu.toLowerCase() === menu.toLowerCase()) {
            menuExists = true;
            break;
        }
    }

    // Jika menu belum ada, tambahkan ke dalam tabel
    if (!menuExists) {
        var tableBody = table.getElementsByTagName("tbody")[0];
        var newRow = tableBody.insertRow();

        // Isi baris baru dengan informasi menu, harga, jumlah, dan total
        newRow.innerHTML =
            '<td><input class="form-check-input ms-0" type="checkbox"></td>' +
            "<td>" +
            menu +
            "</td>" +
            "<td>Rp. " +
            harga.toLocaleString("id-ID") +
            "</td>" +
            '<td><button class="btn btn-sm btn-outline-primary" onclick="kurangJumlah(this)">-</button> ' +
            '<span class="jumlah-item">1</span> ' +
            '<button class="btn btn-sm btn-outline-primary" onclick="tambahJumlah(this)">+</button></td>' +
            "<td>Rp. " +
            total.toLocaleString("id-ID") +
            "</td>";

        // Hitung kembali subtotal, pajak, dan total akhir
        updateTotal();
    } else {
        // Jika menu sudah ada, mungkin tampilkan pesan atau tidak melakukan apa-apa
        alert("Menu sudah ada dalam pesanan!");
    }
}

// Fungsi untuk mengurangi jumlah item
function kurangJumlah(button) {
    var row = button.parentNode.parentNode; // Dapatkan baris (row) yang mengandung tombol
    var jumlahElement = row.querySelector(".jumlah-item");
    var jumlah = parseInt(jumlahElement.textContent);

    if (jumlah > 1) {
        jumlah--;
        jumlahElement.textContent = jumlah;
        updateTotal();
    }
}

// Fungsi untuk menambah jumlah item
function tambahJumlah(button) {
    var row = button.parentNode.parentNode; // Dapatkan baris (row) yang mengandung tombol
    var jumlahElement = row.querySelector(".jumlah-item");
    var jumlah = parseInt(jumlahElement.textContent);

    jumlah++;
    jumlahElement.textContent = jumlah;
    updateTotal();
}

// Fungsi untuk menghitung kembali subtotal, pajak, dan total akhir
function updateTotal() {
    var table = document.getElementById("orderStatusTable");
    var rows = table.getElementsByTagName("tr");

    var subtotal = 0;

    // Mulai dari baris kedua karena baris pertama adalah header
    for (var i = 1; i < rows.length; i++) {
        var row = rows[i];
        var hargaText = row.cells[2].innerText
            .replace("Rp. ", "")
            .replace(/\D/g, ""); // Ambil harga dan hapus karakter non-digit
        var harga = parseFloat(hargaText);

        var jumlahElement = row.querySelector(".jumlah-item");
        var jumlah = parseInt(jumlahElement.textContent);

        var total = harga * jumlah;
        row.cells[4].innerText = "Rp. " + total.toLocaleString("id-ID"); // Update total di dalam tabel

        subtotal += total;
    }

    var pajak = subtotal * 0.1; // Misalnya pajak 10%
    var totalAkhir = subtotal + pajak;

    // Tampilkan subtotal, pajak, dan total akhir di UI
    document.getElementById("subtotal").innerText =
        "Rp. " + subtotal.toLocaleString("id-ID");
    document.getElementById("pajak").innerText =
        "Rp. " + pajak.toLocaleString("id-ID");
    document.getElementById("totalAkhir").innerText =
        "Rp. " + totalAkhir.toLocaleString("id-ID");
}

// Fungsi untuk menghitung subtotal dari pesanan saat ini
function hitungSubtotal() {
    var subtotal = 0;
    var table = document.getElementById("orderStatusTable");
    var rows = table.getElementsByTagName("tr");

    // Mulai dari baris kedua karena baris pertama adalah header
    for (var i = 1; i < rows.length; i++) {
        var row = rows[i];
        var hargaText = row.cells[2].innerText
            .replace("Rp. ", "")
            .replace(/\D/g, ""); // Ambil harga dan hapus karakter non-digit
        var harga = parseFloat(hargaText);
        subtotal += harga;
    }

    return subtotal;
}
