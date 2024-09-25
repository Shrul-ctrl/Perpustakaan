// Fungsi untuk menangani pencarian
document.getElementById("searchInput").addEventListener("input", function() {
    var keyword = this.value.toLowerCase(); // Ambil teks pencarian dan ubah ke huruf kecil

    // Ambil semua kartu produk (menu)
    var cards = document.querySelectorAll(".product-table .card");

    // Loop melalui setiap kartu untuk memeriksa teks pencarian
    cards.forEach(function(card) {
        var menu = card.querySelector(".card-text").innerText.toLowerCase(); // Ambil teks menu dan ubah ke huruf kecil

        // Jika teks pencarian cocok dengan teks menu, tampilkan kartu; jika tidak, sembunyikan
        if (menu.includes(keyword)) {
            card.style.display = "block";
        } else {
            card.style.display = "none";
        }
    });
});

