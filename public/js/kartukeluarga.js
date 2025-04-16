$(document).ready(function () {
    // Konfirmasi Hapus
    $(".delete").click(function (e) {
        e.preventDefault();
        let nama = $(this).data("nama_lengkap");
        let url = $(this).attr("href");

        Swal.fire({
            title: "Yakin ingin menghapus?",
            text: "Data atas nama " + nama + " akan dihapus!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Batal",
            didOpen: () => {
                const icon = document.querySelector(".swal2-icon");
                if (icon) {
                    icon.style.marginTop = "30px";
                }
            },
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    });

    // Mode Tambah
    $("#btnTambah").click(function () {
        $("#keluargaForm")[0].reset();
        $("#modalKeluargaLabel").text("Tambah Data Kepala Keluarga");
        $("#keluargaForm").attr("action", "/admin/master_kartukeluarga/masuk");
        $("#keluargaForm").find('input[name="_method"]').remove();
        $("#no_kk_lama").val("");
    });

    // Mode Edit
    $(".editButton").click(function () {
        let data = $(this).data();

        $("#modalKeluargaLabel").text("Edit Data Kepala Keluarga");

        let actionUrl = "/admin/master_kartukeluarga/" + data.no_kk;
        $("#keluargaForm").attr("action", actionUrl);

        $("#keluargaForm").find('input[name="_method"]').remove();
        $("#keluargaForm").append(
            '<input type="hidden" name="_method" value="PUT">'
        );

        $("#no_kk").val(data.no_kk);
        $("#nik").val(data.nik);
        $("#nama_lengkap").val(data.nama_lengkap);
        $("#alamat").val(data.alamat);
        $("#rt").val(data.rt);
        $("#rw").val(data.rw);
        $("#kode_pos").val(data.kode_pos);
        $("#desa").val(data.desa);
        $("#kecamatan").val(data.kecamatan);
        $("#kabupaten").val(data.kabupaten);
        $("#provinsi").val(data.provinsi);
        $("#tanggal_dibuat").val(data.tanggal_dibuat);

        $("#modalKeluarga").modal("show");
    });
});
