function bukaModalPenolakan(idPengajuan) {
    // Tutup semua modal yang masih kebuka (termasuk modal detail)
    var modalDetail = document.getElementById("modalDetail-" + idPengajuan);
    var bootstrapModal = bootstrap.Modal.getInstance(modalDetail);
    if (bootstrapModal) {
        bootstrapModal.hide();
    }

    // Atur action form-nya sesuai ID pengajuan
    const form = document.getElementById("formPenolakan");
    form.action = "{{ route('pengajuan.masuk') }}/" + idPengajuan + "/tolak";

    // Reset input alasan
    document.getElementById("inputAlasan").value = "";

    // Tampilkan modal penolakan
    var modalPenolakan = new bootstrap.Modal(
        document.getElementById("modalPenolakan")
    );
    modalPenolakan.show();
}

function setujuiPengajuan(idPengajuan) {
    // Buat form sementara
    const form = document.createElement("form");
    form.method = "POST";
    form.action = "{{ route('pengajuan.masuk') }}/" + idPengajuan + "/setuju"; // <-- pastikan route ini ada!

    // Tambahkan CSRF token
    const csrf = document.createElement("input");
    csrf.type = "hidden";
    csrf.name = "_token";
    csrf.value = "{{ csrf_token() }}";
    form.appendChild(csrf);

    document.body.appendChild(form);
    form.submit();
}

function confirmDelete(id) {
    Swal.fire({
        title: "Yakin ingin menghapus?",
        text: "Data yang dihapus tidak dapat dikembalikan!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Hapus",
        cancelButtonText: "Batal",
    }).then((result) => {
        if (result.isConfirmed || result.dismiss === Swal.DismissReason.timer) {
            // Jika klik "Hapus" atau timer habis, kirim form untuk delete
            document.getElementById("deleteForm-" + id).submit();
        }
    });
}

