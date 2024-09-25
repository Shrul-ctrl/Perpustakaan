function tampilkanMenu(kategori) {
    var cards = document.querySelectorAll(".product-table .card");

    cards.forEach(function (card) {
        var menuKategori = card
            .querySelector(".kategori")
            .innerText.toLowerCase();

        if (menuKategori.includes(kategori.toLowerCase())) {
            card.style.display = "block";
        } else {
            card.style.display = "none";
        }
    });
}

function resetKategori() {
    var cards = document.querySelectorAll(".product-table .card");
    cards.forEach(function (card) {
        card.style.display = "block"; // Tampilkan semua kartu
    });
}
