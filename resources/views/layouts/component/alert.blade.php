<!-- Begin Alert Session -->
@if(session('alertStore'))
    <script>
        toastr.success("{{ session('alertStore') }}", "Berhasil Menambahkan Data!", {
            progressBar: !0,
            positionClass: "toast-bottom-right",
            closeButton: !0
        })
    </script>

@elseif(session('alertDestroy'))
    <script>
        toastr.success("{{ session('alertDestroy') }}", "Berhasil Menghapus Data!", {
            progressBar: !0,
            positionClass: "toast-bottom-right",
            closeButton: !0
        })
    </script>

@elseif(session('alertUpdate'))
    <script>
        toastr.success("{{ session('alertUpdate') }}", "Berhasil Mengubah Data!", {
            progressBar: !0,
            positionClass: "toast-bottom-right",
            closeButton: !0
        })
    </script>
@elseif(session('alertUpdateKS'))
    <script>
        toastr.success("Kata sandi telah diubah", "Berhasil Mengubah Data!", {
            progressBar: !0,
            positionClass: "toast-bottom-right",
            closeButton: !0
        })
    </script>
@elseif(session('alertVerifikasi'))
    <script>
        toastr.success("Data sudah terverifikasi", "Berhasil Verifikasi Data!", {
            progressBar: !0,
            positionClass: "toast-bottom-right",
            closeButton: !0
        })
    </script>
@endif
<!-- End Alert Session -->

<!-- Begin Alert Error -->
@error('password')
<script>
    toastr.error("{{ $message }}", "Gagal", {
        progressBar: !0,
        positionClass: "toast-top-right",
        closeButton: !0
    })
</script>
@enderror

@error('email')
<script>
    toastr.error("{{ $message }}", "Gagal", {
        progressBar: !0,
        positionClass: "toast-top-right",
        closeButton: !0
    })
</script>
@enderror

@error('name')
<script>
    toastr.error("{{ $message }}", "Gagal", {
        progressBar: !0,
        positionClass: "toast-top-right",
        closeButton: !0
    })
</script>
@enderror
<!-- End Alert Error -->
