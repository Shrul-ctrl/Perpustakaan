
function tampilkanDetailPesanan() {
    var table = document.getElementById("orderStatusTable");
    var rows = table.getElementsByTagName("tr");

    var namaMenu = "";
    var subtotal = 0;

    // Mulai dari baris kedua karena baris pertama adalah header
    for (var i = 1; i < rows.length; i++) {
        var row = rows[i];
        var menuCell = row.cells[1];
        var jumlahElement = row.querySelector('.jumlah-item');
        var jumlah = parseInt(jumlahElement.textContent);
        var hargaText = row.cells[2].innerText.replace('Rp. ', '').replace(/\D/g, '');
        var harga = parseFloat(hargaText);
        var total = harga * jumlah;
        subtotal += total;
        namaMenu += `${menuCell.innerText} (${jumlah}), `;
    }

    var pajak = subtotal * 0.1; // Misalnya pajak 10%
    var totalAkhir = subtotal + pajak;

    // Tampilkan detail pesanan di modal
    document.getElementById("detailMenu").innerText = namaMenu;
    document.getElementById("detailSubtotal").innerText = 'Rp. ' + subtotal.toLocaleString('id-ID');
    document.getElementById("detailPajak").innerText = 'Rp. ' + pajak.toLocaleString('id-ID');
    document.getElementById("detailTotal").innerText = 'Rp. ' + totalAkhir.toLocaleString('id-ID');
}

