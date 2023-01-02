<footer class="text-center text-lg-start bg-dark text-muted mt-auto">
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <div class="me-5 d-none d-lg-block">
      <span class="text-danger">Cantidad de vistas en la pagina: {{ \App\Models\Log::showViews() }}</span>
    </div>
  </section>
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2021 Copyright:
    <a class="text-reset fw-bold" href="https://mdbootstrap.com/">Clinica Mendieta</a>
  </div>
</footer>
