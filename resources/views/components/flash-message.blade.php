<style>
    .alert {
        /* position: fixed; */
        margin: auto;
        width: 60%;
    }
</style>

@if (session()->has("message"))
    <div class="alert alert-danger fixed-top text-center d-flex align-items-center justify-content-between alert-dismissible fade show py-2 px-2" role="alert">
        {{session("message")}}
        <span data-bs-dismiss="alert" aria-label="Close">
            <i class="bi bi-x"></i>
        </span>
    </div>
@endif
