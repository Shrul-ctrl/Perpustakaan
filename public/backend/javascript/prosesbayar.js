
    function prosesBayar() {
        var totalAkhirText = document.getElementById("detailTotal").innerText.replace('Rp. ', '').replace(/\D/g, '');
        var totalAkhir = parseFloat(totalAkhirText);

        var inputBayar = document.getElementById("inputBayar").value;
        var bayar = parseFloat(inputBayar);

        var kembalian = bayar - totalAkhir;

        if (kembalian >= 0) {
            document.getElementById("kembalian").innerText = 'Rp. ' + kembalian.toLocaleString('id-ID');
        } else {
            alert('Jumlah uang yang dimasukkan kurang!');
        }
    }
