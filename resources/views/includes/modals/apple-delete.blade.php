<style>
.apple-delete-modal{
    border-radius:22px;
    background:rgba(255,255,255,.96);
    backdrop-filter:blur(14px);
    box-shadow:0 30px 80px rgba(0,0,0,.25);
}
.apple-delete-icon{
    width:64px;height:64px;border-radius:50%;
    background:rgba(239,68,68,.1);
    color:#ef4444;font-size:26px;
    display:flex;align-items:center;justify-content:center;
    margin:0 auto;
}
</style>

<div class="modal fade" id="appleDeleteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content apple-delete-modal p-4">

            <div class="text-center mb-3">
                <div class="apple-delete-icon">
                    <i class="fas fa-trash"></i>
                </div>
            </div>

            <h5 class="fw-bold text-center">Delete Item?</h5>
            <p class="text-muted text-center small mb-4">
                This action cannot be undone.
            </p>

            <form method="POST" id="appleDeleteForm">
                @csrf
                @method('DELETE')

                <div class="d-flex justify-content-center gap-3">
                    <button type="button" class="btn btn-white rounded-pill px-4" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-danger rounded-pill px-4">
                        Yes, Delete
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

<script>
document.getElementById('appleDeleteModal')
?.addEventListener('show.bs.modal', e => {
    document.getElementById('appleDeleteForm').action =
        e.relatedTarget.getAttribute('data-delete-url');
});
</script>
