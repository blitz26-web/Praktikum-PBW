function cekNilai() {
    const nim = document.getElementById('nim').value;
    const nilaiInput = document.getElementById('nilai').value;
    const hasilDiv = document.getElementById('hasil');
    const nilai = parseFloat(nilaiInput);

    hasilDiv.innerHTML = "";
    hasilDiv.className = "result";

    if (nim === "" || nilaiInput === "") {
        hasilDiv.innerHTML = "Harap isi NIM dan Nilai!";
        hasilDiv.classList.add("error");
        return;
    }

    let hurufMutu = "";

    if (nilai < 0 || nilai > 100) {
        hasilDiv.innerHTML = "Nilai tidak valid!";
        hasilDiv.classList.add("error");
        return;
    } else if (nilai >= 80) {
        hurufMutu = "A";
    } else if (nilai >= 70) {
        hurufMutu = "B";
    } else if (nilai >= 60) {
        hurufMutu = "C";
    } else if (nilai >= 50) {
        hurufMutu = "D";
    } else {
        hurufMutu = "E";
    }

    hasilDiv.innerHTML = `Mahasiswa dengan NIM <strong>${nim}</strong> mendapatkan Huruf Mutu: <strong>${hurufMutu}</strong>`;
    hasilDiv.classList.add("success");
}