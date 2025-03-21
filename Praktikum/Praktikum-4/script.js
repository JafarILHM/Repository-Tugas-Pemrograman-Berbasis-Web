// Script written by Jafaruddin Ilham
// Original Author: https://github.com/JafarILHM

function validasiNIM() {
    let nimInput = document.getElementById("nim").value.trim();
    let errorNim = document.getElementById("error-nim");
    
    errorNim.textContent = "";

    if (nimInput === "") {
        errorNim.textContent = "NIM tidak boleh kosong!";
        return false;
    } else if (!/^\d+$/.test(nimInput)) {
        errorNim.textContent = "NIM hanya boleh berisi angka!";
        return false;
    }
    
    return true;
}

function validasiNilai(validNIM) {
    let nilaiInput = document.getElementById("nilai").value.trim();
    let errorNilaiKuliah = document.getElementById("error-nilaikuliah");
    let output = document.getElementById("output");

    errorNilaiKuliah.textContent = "";
    output.textContent = "";

    if (nilaiInput === "") {
        errorNilaiKuliah.textContent = "Nilai tidak boleh kosong!";
        return false;
    }

    nilaiInput = nilaiInput.replace(",", "."); 
    if (!/^\d+(\.\d+)?$/.test(nilaiInput)) {
        errorNilaiKuliah.textContent = "Input hanya boleh berisi angka atau desimal!";
        return false;
    }

    let nilai = parseFloat(nilaiInput);
    if (nilai < 0 || nilai > 100) {
        errorNilaiKuliah.textContent = "Nilai harus antara 0 - 100!";
        return false;
    }

    if (!validNIM) {
        return true; 
    }

    let hurufMutu, warna;
    switch (true) {
        case (nilai >= 80):
            hurufMutu = "Huruf Mutu: A";
            warna = "green";
            break;
        case (nilai >= 70):
            hurufMutu = "Huruf Mutu: B";
            warna = "blue";
            break;
        case (nilai >= 60):
            hurufMutu = "Huruf Mutu: C";
            warna = "orange";
            break;
        case (nilai >= 50):
            hurufMutu = "Huruf Mutu: D";
            warna = "purple";
            break;
        default:
            hurufMutu = "Huruf Mutu: E";
            warna = "red";
    }

    output.textContent = hurufMutu;
    output.style.color = warna;
    return true;
}

function validasiGlobal(validNIM, validNilai) {
    let errorGlobal = document.getElementById("error-global");
    
    errorGlobal.textContent = "";
    if (!validNIM && !validNilai) {
        errorGlobal.textContent = "Pastikan isi NIM dan Nilai!";
    } else if (!validNIM) {
        errorGlobal.textContent = "Pastikan isi NIM dengan benar!";
    } else if (!validNilai) {
        errorGlobal.textContent = "Pastikan isi Nilai dengan benar!";
    }

    if (errorGlobal.textContent !== "") {
        errorGlobal.style.color = "red";
    }
}

function cekNilai() {
    let validNIM = validasiNIM();
    let validNilai = validasiNilai(validNIM); 
    validasiGlobal(validNIM, validNilai);
}
