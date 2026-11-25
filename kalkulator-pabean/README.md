# Kalkulator Pabean Perbatasan

Alat kerja untuk staf PPJK (jasa kepabeanan) di pos lintas batas. Menghitung perkiraan bea masuk, PPN impor, dan PPh 22 impor, lalu memantau kelengkapan dokumen dalam satu nota.

## Fitur

- Data pengiriman: klien, nomor aju, pos lintas batas (Entikong, Aruk, Motaain, Skouw, Batam), negara asal
- Nilai FOB per barang, freight dan asuransi menjadi nilai CIF, dikali kurs NDPBM menjadi nilai pabean
- Tarif bea masuk per kode HS, dengan opsi SKA Form D (ATIGA) untuk tarif 0%
- PPN impor dan PPh 22 sesuai status API (2,5% / 7,5% / 10% / bebas)
- Jasa PPJK dan biaya lain untuk total tagihan ke klien
- Checklist dokumen: invoice, packing list, dokumen angkut, PIB (BC 2.0), NIB/API, surat kuasa, Form D, izin lartas
- Salin ringkasan nota sebagai teks

## Cara pakai

Buka `index.html` di browser (klik dua kali file-nya). Tidak perlu instalasi atau server. Data tersimpan hanya di browser yang dipakai (localStorage).

Angka yang keluar adalah perkiraan untuk persiapan dokumen. Angka final mengikuti BTKI terbaru dan hasil penetapan di sistem CEISA. Data contoh (PT Sinar Batas Niaga) fiktif, kurs dan tarif hanya ilustrasi.
